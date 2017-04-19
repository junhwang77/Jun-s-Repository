from flask import Flask, render_template, redirect, request, session, flash
import re

EMAIL_REGEX = re.compile(r'^[a-zA-Z0-9\.\+_-]+@[a-zA-Z0-9\._-]+\.[a-zA-Z]*$')
app = Flask(__name__)
app.secret_key = "ThisIsSecret"

@app.route('/', methods=['GET'])
def index():
    return render_template("RegForm.html")

@app.route('/process', methods=['POST'])
def create():
    if len(request.form['email']) < 1 or len(request.form['fname']) < 2 or len(request.form['lname']) < 2 or len(request.form['pass']) < 1 or len(request.form['confp']) < 1:
        flash("All fields are required and must not be blank.", "error")
    elif str.isalpha(str(request.form['fname'])) == False and str.isalpha(str(request.form['lname'])) == False:
        flash("Name fields must contain all alphabetical characters.", "error")
    elif len(request.form['pass']) < 9:
        flash("Password should contain more than 8 characters.", "error")
    elif re.search('\d.*[A-Z]|[A-Z].*\d', request.form['pass']) == None:
        flash("Password should contain at least 1 uppercase letter and 1 number.")
    elif not EMAIL_REGEX.match(request.form['email']):
        flash("Invalid Email Address.", "error")
    elif request.form['pass'] != request.form['confp']:
        flash("Passwords do not match")
    else:
        return render_template("Registered.html")
    return redirect('/')

app.run(debug=True)
