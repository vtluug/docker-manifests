#!/usr/bin/env python3
from flask import Flask, json, render_template
from flask_cors import CORS

app = Flask(__name__)
CORS(app)
distro_list = {}
try:
    f = open("semester.txt", "r")
    sem = "the " + f.read() + " "
    f.close()
except:
    sem = ""


def load():
    global distro_list
    try:
        file = open('saved.json', 'r')
        distro_list = json.loads(file.read())
        print('loaded: '+str(distro_list))
    except: 
        print('No saved distro list detected; a new one will be created on insert.')
    return 'data loaded';

def save():
    global distro_list
    tosave = json.dumps(distro_list);
    file = open('saved.json', 'w')
    file.write(tosave)
    file.close()
    return 'data saved';

@app.route('/api/v1/add/<distro>', methods=['POST', 'GET'])
def add_distro(distro):
    global distro_list
    # add distro to distro_list
    if distro in distro_list:
        distro_list[distro] = distro_list[distro]+1;
    else:
        distro_list[distro] = 1;
    #socketio.emit('remote_distro_change', {distro: distro_list[distro]}, namespace='/distroupdates')
    save()
    return ''

@app.route("/")
def index():
   return render_template("index.html")

@app.route('/api/v1/term')
def term():
    global sem
    return sem

@app.route('/api/v1/distrolist')
def getDistrolist():
    global distro_list
    print('distrolist request: '+str(distro_list))
    distros = DistroList(distro_list);
    return json.dumps(distros.__dict__);

class DistroList:
    def __init__(self, distdict):
        self.distros = distdict

load()
print('script started')


if __name__ == '__main__':
    Flask.run(app)
