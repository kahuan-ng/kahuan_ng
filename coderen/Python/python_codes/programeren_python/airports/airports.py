import requests
import sqlite3
import json


url = "https://raw.githubusercontent.com/jpatokal/openflights/master/data/airports.dat"
response = requests.get(url)
data = response.text.splitlines()

conn = sqlite3.connect('airports.db')
conn.row_factory = sqlite3.Row
c = conn.cursor()
c.execute('DROP TABLE IF EXISTS airports')
c.execute('''
    CREATE TABLE IF NOT EXISTS airports (
        id INTEGER PRIMARY KEY,
        name TEXT,
        city TEXT,
        country TEXT,
        iata TEXT,
        icao TEXT,
        latitude REAL,
        longitude REAL,
        altitude INTEGER,
        timezone TEXT,
        dst TEXT
    )
''')
for line in data:
    line = line.replace('t,','t;').replace(', ','; ')
    fields = line.split(',')
    if len(fields) >= 13:
        id = int(fields[0])
        name = fields[1].strip('"')
        #print(name)
        city = fields[2].strip('"')
        country = fields[3].strip('"')
        iata = fields[4].strip('"')
        icao = fields[5].strip('"')
        latitude = float(fields[6])
        longitude = float(fields[7])
        altitude = int(fields[8])
        timezone = fields[9]
        dst = fields[10].strip('"')

        c.execute('''
            INSERT OR IGNORE INTO airports (id, name, city, country, iata, icao, latitude, longitude, altitude, timezone, dst)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ''', (id, name, city, country, iata, icao, latitude, longitude, altitude, timezone, dst))
conn.commit()

airports = c.execute('SELECT * FROM airports WHERE country = "Belgium" ORDER BY name').fetchall()

with open("airports.json", "w") as f:
  f.write(json.dumps( [dict(row) for row in airports], indent=4))

""" with open("airports2.json", "w") as f2:
    f2.write("[\n")
    for airport in airports:
        f2.write(json.dumps(dict(airport), indent=4))
        if airport != airports.last():
            f2.write(",\n")
    f2.write("]\n")
 """