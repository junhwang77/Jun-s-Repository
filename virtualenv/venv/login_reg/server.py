from flask import Flask, request, redirect, render_template, session, flash
import re
from mysqlconnection import MySQLConnector
from flask_bcrypt import Bcrypt

EMAIL_REGEX = re.compile(r'^[a-zA-Z0-9\.\+_-]+@[a-zA-Z0-9\._-]+\.[a-zA-Z]*$')
app = Flask(__name__)
app.secret_key = "ThisIsSecret!"
bcrypt = Bcrypt(app)
mysql = MySQLConnector(app,'login_regdb')

@app.route('/', methods=['GET'])
def index():
    query = "SELECT * FROM users"
    friends = mysql.query_db(query)
    return render_template('login.html')

@app.route('/login', methods=['POST'])
def login():
    email = request.form['email']
    password = request.form['password']
    query = "SELECT * FROM users WHERE email = :email LIMIT 1"
    data = { 'email': email }
    user = mysql.query_db(query, data)
    print bool(user)
    if bool(user)==True:
        if bcrypt.check_password_hash(user[0]['pw_hash'], password):
            return render_template('success.html', user_name = user[0]['first_name'])
        else:
            flash('Incorrect Email and/or Password')
    else:
        flash('That account does not exist')
    return redirect('/')

@app.route('/register', methods=['GET'])
def new():
    query = "SELECT * FROM users"
    friends = mysql.query_db(query)
    return render_template('register.html')

@app.route('/register/process', methods=['POST'])
def create():
    if len(request.form['email']) < 1 or len(request.form['first_name']) < 2 or len(request.form['last_name']) < 2 or len(request.form['password']) < 1 or len(request.form['confp']) < 1:
        flash("All fields are required and must not be blank.", "error")
    elif str.isalpha(str(request.form['first_name'])) == False and str.isalpha(str(request.form['last_name'])) == False:
        flash("Name fields must contain all alphabetical characters.", "error")
    elif len(request.form['password']) < 9:
        flash("Password should contain more than 8 characters.", "error")
    elif re.search('\d.*[A-Z]|[A-Z].*\d', request.form['password']) == None:
        flash("Password should contain at least 1 uppercase letter and 1 number.")
    elif not EMAIL_REGEX.match(request.form['email']):
        flash("Invalid Email Address.", "error")
    elif request.form['password'] != request.form['confp']:
        flash("Passwords do not match")
    else:
        password = request.form['password']
        pw_hash = bcrypt.generate_password_hash(password, 14)
        query = "INSERT INTO users (first_name, last_name, email, pw_hash, created_at, updated_at) VALUES (:first_name, :last_name, :email, :pw_hash, NOW(), NOW())"
        data = {
                 'first_name': request.form['first_name'],
                 'last_name':  request.form['last_name'],
                 'email': request.form['email'],
                 'pw_hash': pw_hash
               }
        mysql.query_db(query, data)
        return render_template("Registered.html")
    return render_template('register.html')

if __name__ == "__main__":
    app.run(debug=True)
