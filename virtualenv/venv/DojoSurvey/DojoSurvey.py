from flask import Flask, render_template, request, redirect, session, flash
app = Flask(__name__)
app.secret_key = 'very secret'

@app.route('/')
def index():
    return render_template("DojoSurvey.html")

@app.route('/process', methods=['POST'])
def process():
    if len(request.form['Name']) < 1 or len(request.form['comments']) < 1:
        flash("Input field(s) below cannot be empty!")
        if len(request.form['comments']) > 120:
            flash("Comment field exceeded maximum characters!")
        return redirect('/')
    return render_template('users.html', data = request.form)

#@app.route('/users', methods=['POST'])
#def create_user():
        #data = request.form
        #print data
        #return render_template("users.html", data = data)

if __name__ == '__main__':
    app.run(debug = True)
