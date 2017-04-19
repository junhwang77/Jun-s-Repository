from flask import Flask, render_template,request, redirect, session
app = Flask(__name__)
app.secret_key = 'ThisIsSecret'

@app.route('/')
def random():
    import random
    session['numb'] = random.randrange(0, 101)
    return render_template('GreatNumberGame.html', numb = session['numb'], route = '/submit', submit = 'Submit', text = 'text')

@app.route('/submit', methods=['POST'])
def compare():
    if  request.form['number'] == request.form['numguess']:
        return render_template('GreatNumberGame.html', css='equal', result='Correct!', route = '/reset', text = 'hidden', button = 'button', submit = 'Play Again!')
    elif request.form['number'] > request.form['numguess']:
        import random
        session['numb'] = random.randrange(0, 101)
        return render_template('GreatNumberGame.html', css='low', numb = session['numb'], route = '/reset', submit = 'Try Again?', text = 'hidden', button = 'button', result='Too Low~')
    elif request.form['number'] < request.form['numguess']:
        import random
        session['numb'] = random.randrange(0, 101)
        return render_template('GreatNumberGame.html', css='high', numb = session['numb'], route = '/reset', button = 'button', submit = 'Try Again?', text = 'hidden', result='Too High~')

@app.route('/reset', methods=['POST'])
def reset():
    session.pop('numb')
    return redirect('/')


if __name__ == '__main__':
    app.run(debug=True)
