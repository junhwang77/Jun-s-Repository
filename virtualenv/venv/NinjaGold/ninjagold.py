from flask import Flask, render_template, request, redirect, session
import random
import datetime

now = datetime.datetime.now()

app = Flask(__name__)
app.secret_key = 'very secret'

@app.route('/')
def index():
    try:
        session['goldcount']
    except:
        session['goldcount'] = 0

    session['farmgold'] = random.randrange(9,21)
    session['cavegold'] = random.randrange(4,11)
    session['housegold'] = random.randrange(1,6)
    session['casinogold'] = random.randrange(-51,51)
    return render_template('ninjagold.html')

@app.route('/process_money', methods=['POST'])
def process_money():
    if request.form['building'] == 'farm':
        session['goldcount'] += session['farmgold']
        temp = session['farmgold']
    elif request.form['building'] == 'cave':
        sesion['goldcount'] += session['cavegold']
        temp = session['cavegold']
    elif request.form['building'] == 'house':
        session['goldcount'] += session['housegold']
        temp = session['housegold']
    elif request.form['building'] == 'casino':
        if session['goldcount'] + session['casinogold'] != False:
            session['goldcount'] += session['casinogold']
        temp = session['casinogold']
    else:
        session['goldcount'] = 0
        session['activities'] = ""
        return redirect('/')
    session['activities'] += '\n'+'Earned ' + str(temp) + ' gold(s) from the ' + str(request.form['building']) + now.strftime("%Y/%m/%d %I:%M %p")
    return redirect('/')

if __name__ == "__main__":
    app.run(debug=True)
