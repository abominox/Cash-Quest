import json

db_host = input("Enter the name of your database host: ")
db_username = input("Enter the username for your database account: ")
db_password = input("Enter the database password: ")

data = {}
data['host'] = db_host
data['username'] = db_username
data['password'] = db_password
json_data = json.dumps(data, )

with open('config.json', 'w') as outputfile:
    json.dump(data, outputfile)

    import tkinter as tk
    from tkinter import filedialog

    root = tk.Tk()
    root.withdraw()
    file_path = filedialog.askopenfilename()