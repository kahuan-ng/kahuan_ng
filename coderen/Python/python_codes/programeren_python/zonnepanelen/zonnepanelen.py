import os
import requests
import sqlite3
import json
import matplotlib.pyplot as plt
import matplotlib.ticker as mticker # Zelf toegevoegd voor formattering bij de opbrengst per jaar

os.makedirs('grafieken', exist_ok=True)

API_KEY = "A2MXNTM7OP7R2Q93PM3E0AJCKXEZKRFJ"
SITE_ID = "547727"
BASE_URL = "https://monitoringapi.solaredge.com/site/{site_id}/energy.json?timeUnit=DAY&endDate={end}&startDate={start}&api_key={api_key}"

# Data ophalen en opslaan in JSON
all_data = []
for jaar in range(2018, 2025):
    start = f"{jaar}-01-01"
    end = f"{jaar}-12-31"
    url = BASE_URL.format(site_id=SITE_ID, start=start, end=end, api_key=API_KEY)
    response = requests.get(url)
    data = response.json()
    # Sla de ruwe data per jaar op
    with open(f"opbrengst_{jaar}.json", "w") as f:
        json.dump(data, f, indent=4)
    # Voeg toe aan all_data voor verwerking
    all_data.append((jaar, data))

# Zet alles in één JSON-bestand
with open("opbrengst_alle_jaren.json", "w") as f:
    json.dump(all_data, f, indent=4)

# Zet data in SQLite
conn = sqlite3.connect('opbrengst.db')
c = conn.cursor()
c.execute('DROP TABLE IF EXISTS opbrengst')
c.execute('''
    CREATE TABLE opbrengst (
        datum TEXT PRIMARY KEY,
        opbrengst INTEGER
    )
''')

for jaar, data in all_data:
    for entry in data['energy']['values']:
        datum = entry['date']
        opbrengst = entry['value'] or 0
        c.execute('INSERT OR REPLACE INTO opbrengst (datum, opbrengst) VALUES (?, ?)', (datum, opbrengst))
conn.commit()

# 1. Staafgrafiek per jaar met per maand opbrengst
for jaar in range(2018, 2025):
    c.execute('''
        SELECT strftime('%m', datum) AS maand, SUM(opbrengst)
        FROM opbrengst
        WHERE strftime('%Y', datum) = ?
        GROUP BY maand
        ORDER BY maand
    ''', (str(jaar),))
    rows = c.fetchall()
    maanden = [row[0] for row in rows]
    waarden = [row[1] for row in rows]
    plt.figure()
    plt.bar(maanden, waarden)
    plt.title(f"Opbrengst per maand in {jaar}")
    plt.xlabel("Maand")
    plt.ylabel("Opbrengst (Wh)")
    plt.savefig(f"grafieken/opbrengst_per_maand_{jaar}.png")

# 2. Lijngrafiek over opbrengst per jaar
c.execute('''
    SELECT strftime('%Y', datum) AS jaar, SUM(opbrengst)
    FROM opbrengst
    GROUP BY jaar
    ORDER BY jaar
''')
rows = c.fetchall()
jaren = [row[0] for row in rows]
totalen = [row[1] for row in rows]
plt.figure()
plt.plot(jaren, totalen, marker='o')
plt.title("Totale opbrengst per jaar")
plt.xlabel("Jaar")
plt.ylabel("Opbrengst (Wh)")
plt.ylim(top=max(totalen) * 1.1)
plt.ylim(bottom=min(totalen) * 0.9)
plt.gca().yaxis.set_major_formatter(mticker.StrMethodFormatter('{x:,.0f}'))
plt.savefig("grafieken/opbrengst_per_jaar.png")

# 3. Combinatiegrafiek per maand per jaar opbrengst
plt.figure()
for jaar in range(2018, 2025):
    c.execute('''
        SELECT strftime('%m', datum) AS maand, SUM(opbrengst)
        FROM opbrengst
        WHERE strftime('%Y', datum) = ?
        GROUP BY maand
        ORDER BY maand
    ''', (str(jaar),))
    rows = c.fetchall()
    maanden = [row[0] for row in rows]
    waarden = [row[1] for row in rows]
    plt.plot(maanden, waarden, label=str(jaar))
plt.title("Opbrengst per maand voor elk jaar")
plt.xlabel("Maand")
plt.ylabel("Opbrengst (Wh)")
plt.legend()
plt.savefig("grafieken/opbrengst_per_maand_alle_jaren.png")

# 4. Taartdiagram per jaar
for jaar in range(2018, 2025):
    c.execute('''
        SELECT strftime('%m', datum) AS maand, SUM(opbrengst)
        FROM opbrengst
        WHERE strftime('%Y', datum) = ?
        GROUP BY maand
        ORDER BY maand
    ''', (str(jaar),))
    rows = c.fetchall()
    labels = [row[0] for row in rows]
    values = [row[1] for row in rows]
    plt.figure()
    plt.pie(values, labels=labels, autopct='%1.1f%%')
    plt.title(f"Maandelijkse verdeling in {jaar}")
    plt.savefig(f"grafieken/taart_{jaar}.png")

conn.close()