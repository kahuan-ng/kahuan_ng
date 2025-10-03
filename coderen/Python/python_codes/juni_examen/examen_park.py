import sqlite3
import requests
import csv
import json
import time
import matplotlib.pyplot as plt
from io import StringIO

csv_url = "https://jurgenbert.com/school2425/parks.csv"
response = requests.get(csv_url)
csv_decoded = response.content.decode("utf-8-sig")
csv_reader = csv.DictReader(StringIO(csv_decoded))
rows = list(csv_reader)

conn = sqlite3.connect("park.db")
c = conn.cursor()

c.execute("DROP TABLE IF EXISTS park")
c.execute("""
    CREATE TABLE park (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        naam TEXT,
        continent TEXT,
        land TEXT,
        stad TEXT,
        latitude REAL,
        longitude REAL,
        foto_url TEXT,
        beschrijving TEXT
    )
""")

def get_coordinates(name, city, country):
    query = f"{name}, {city}, {country}"
    url = "https://nominatim.openstreetmap.org/search"
    params = {
        "q": query,
        "format": "json",
        "limit": 1
    }
    headers = {"User-Agent": "school-project/1.0"}

    try:
        response = requests.get(url, params=params, headers=headers)
        data = response.json()
        if data:
            return float(data[0]["lat"]), float(data[0]["lon"])
    except:
        pass
    return None, None

for row in rows:
    name = row.get("naam", "")
    continent = row.get("continent", "")
    country = row.get("land", "")
    city = row.get("stad", "")
    foto_url = row.get("foto_url", "")
    beschrijving = row.get("beschrijving", "")

    try:
        latitude = float(row["latitude"]) if row.get("latitude") else None
    except ValueError:
        latitude = None
    try:
        longitude = float(row["longitude"]) if row.get("longitude") else None
    except ValueError:
        longitude = None

    if latitude is None or longitude is None:
        if any([name.strip(), city.strip(), country.strip()]):
            latitude, longitude = get_coordinates(name, city, country)
            time.sleep(1)

    c.execute("""
        INSERT INTO park (naam, continent, land, stad, latitude, longitude, foto_url, beschrijving)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)
    """, (
        name,
        continent,
        country,
        city,
        latitude,
        longitude,
        foto_url,
        beschrijving
    ))

conn.commit()

c.execute("SELECT naam, continent, land, stad, latitude, longitude, foto_url, beschrijving FROM park")
rows = c.fetchall()
kolomnamen = ["naam", "continent", "land", "stad", "latitude", "longitude", "foto_url", "beschrijving"]
data = [dict(zip(kolomnamen, row)) for row in rows]

with open("park.json", "w", encoding="utf-8") as f_json:
    json.dump(data, f_json, ensure_ascii=False, indent=4)

with open("park.csv", "w", newline='', encoding="utf-8") as f_csv:
    writer = csv.DictWriter(f_csv, fieldnames=kolomnamen)
    writer.writeheader()
    writer.writerows(data)

c.execute("SELECT continent, COUNT(*) FROM park GROUP BY continent")
result = c.fetchall()

continents = [row[0] if row[0] else "Onbekend" for row in result]
counts = [row[1] for row in result]

plt.figure(figsize=(10, 6))
plt.bar(continents, counts, color='skyblue')
plt.xlabel('Continent')
plt.ylabel('Aantal parken')
plt.title('Aantal parken per continent')
plt.xticks(rotation=45)
plt.tight_layout()
plt.show()

conn.close()