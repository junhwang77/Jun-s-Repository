from flask import Flask, render_template, redirect, request, session, flash
import re
from mysqlconnection import MySQLConnector

EMAIL_REGEX = re.compile(r'^[a-zA-Z0-9\.\+_-]+@[a-zA-Z0-9\._-]+\.[a-zA-Z]*$')
app = Flask(__name__)
app.secret_key = "ThisIsSecret!"
mysql = MySQLConnector(app, 'emaildb')

queries = {
    'delete' : "DELETE FROM email_addresses WHERE id = :id"
}

@app.route('/', methods=['GET'])
def index():
    query = "SELECT * FROM email_addresses"
    email = mysql.query_db(query)
    return render_template('index.html', input = 'show', list = 'hide', all_emails=email)

@app.route('/success', methods=['POST'])
def submit():
    if len(request.form['email']) < 1:
        flash("Email cannot be blank!")
    elif not EMAIL_REGEX.match(request.form['email']):
        flash("Invalid Email Address!")
    else:
        flash("Success fully added!")
        query = "INSERT INTO email_addresses (email, created_at, updated_at) VALUES (:email, NOW(), NOW())"
        data = { 'email': request.form['email'] }
        mysql.query_db(query, data)
        query = "SELECT * FROM email_addresses"
        email = mysql.query_db(query)
        return render_template("index.html", list = 'show', input = 'hide', all_emails=email)
    return redirect('/')

@app.route('/<id>', methods=["POST"])
def destroy(id):
    query = queries['delete']
    data = {
            'id' : id
            }
    flash('Successfully deleted email!')
    mysql.query_db(query, data)
    return redirect('/')

app.run(debug=True)
