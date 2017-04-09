import json

data = {}
data['jobDesc'] = "Mow Lawn"
data['pay'] = "15.00"
data['time'] = "ASAP"
json_data_1 = json.dumps(data)

with open('config.json', 'w') as outputfile:
    json.dump(data, outputfile)

data = {}
data['jobDesc'] = "Painting Fence"
data['pay'] = "30.00"
data['time'] = "4/9/2017, 12:00"
json_data_2 = json.dumps(data)

with open('config.json', 'a') as outputfile:
    json.dump(data, outputfile)

data = {}
data['jobDesc'] = "Weedwhacking"
data['pay'] = "12.00"
data['time'] = "4/20/2017, 16:20"
json_data_3 = json.dumps(data)

with open('config.json', 'a') as outputfile:
    json.dump(data, outputfile)

data = {}
data['jobDesc'] = "Car Wash + Wax"
data['pay'] = "20.00"
data['time'] = "4/20/2017,  17:30"
json_data_4 = json.dumps(data)

with open('config.json', 'a') as outputfile:
    json.dump(data, outputfile)

data = {}
data['jobDesc'] = "Move Furniture"
data['pay'] = "75.00"
data['time'] = "4/9/2017, 7:00"
json_data_5 = json.dumps(data)

with open('config.json', 'a') as outputfile:
    json.dump(data, outputfile)

data = {}
data['jobDesc'] = "Tech Support"
data['pay'] = "20.00"
data['time'] = "ASAP"
json_data_6 = json.dumps(data)

with open('config.json', 'a') as outputfile:
    json.dump(data, outputfile)

#jsonParentDump = json.dump(json_data_1, json_data_2, json_data_3, json_data_4, json_data_5, json_data_6);