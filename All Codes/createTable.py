import pymysql


conn = pymysql.connect(host='192.168.0.8',user='admin',password='password',db='project')
a=conn.cursor()

#a.execute("create table laptopinfo (name varchar(100),price int,rating float,link varchar(300),pos int,neg int,mix int,graphics float,processor float,ram float,drive float,battery float,image longblob)")
#a.execute("create table allproduct (productname varchar(100),tablename varchar(100),feature1 varchar(100),feature2 varchar(100),feature3 varchar(100),feature4 varchar(100),feature5 varchar(100))")

#a.execute("create table pdinfo_f (name varchar(100),price int,rating float,link varchar(300),pos int,neg int,mix int,speed float,body float, usb float,size float,quality float,image longblob)")
#a.execute("drop table pdinfo_f")

#a.execute("create table watchinfo_f (name varchar(100),price int,rating float,link varchar(300),pos int,neg int,mix int,color float,dial float, weight float,warranty float,strap float,image longblob)")

'''
specarray=["pos"]
aa=500
pname="motog5"
a.execute ("""
UPDATE count
SET pos=%s
WHERE name=%s
""", (aa,pname))

'''
