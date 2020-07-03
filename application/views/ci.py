import mysql.connector
mydb = mysql.connector.connect(host='localhost',user='shivam',passwd='test123',database='patientmanagementsystem')
mycursor=mydb.cursor()
mycursor.execute("select * from patient")
for i in mycursor:
          print(i)