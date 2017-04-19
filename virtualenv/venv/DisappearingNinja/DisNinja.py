from flask import Flask, render_template, redirect, request, session
import re

app = Flask(__name__)

@app.route('/')
def index():
    return render_template('ninja.html', red = 'hide', blue = 'hide', orange = 'hide', purple = 'hide')

@app.route('/ninja')
def ninja():
    return render_template('ninja.html', red = 'show', blue = 'show', orange = 'show', purple = 'show')

@app.route('/ninja/<color>')
def ninja_color(color):
    if color == 'red':
        color = "/static/img/red.jpg"
    elif color == 'blue':
        color = "/static/img/blue.jpg"
    elif color == 'orange':
        color = "/static/img/orange.jpg"
    elif color == 'purple':
        color = "/static/img/purple.jpg"
    else:
        color = "/static/img/nota.jpg"
    return render_template('ninja.html', color = color, )

app.run(debug=True)
