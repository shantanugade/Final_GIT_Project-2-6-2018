import xlrd 
from xlwt import Workbook
import pymysql
import Transformation_Module as s


#file_location = "C:\\Users\\Sachin-Gosavi\\Desktop\\FINAL_PROJECT\\Semi-Final Project\\Mob_rev.xls"
#file_location = "C:\\Users\\Sachin-Gosavi\\Desktop\\FINAL_PROJECT\\Semi-Final Project\\lapi_res.xls"
#file_location = "C:\\Users\\Sachin-Gosavi\\Desktop\\FINAL_PROJECT\\Semi-Final Project\\Watches.xls"
#file_location = "C:\\Users\\Sachin-Gosavi\\Desktop\\FINAL_PROJECT\\Semi-Final Project\\pd_res.xls"
#file_location = "C:\\Users\\Sachin-Gosavi\\Desktop\\FINAL_PROJECT\\Semi-Final Project\\Flipkart data\\AllHPflip.xlsx"
file_location = "C:\\Users\\Sachin-Gosavi\\Desktop\\FINAL_PROJECT\\Semi-Final Project\\Flipkart data\\AllTVflip.xlsx"

workbook = xlrd.open_workbook(file_location)
wb=Workbook()

conn = pymysql.connect(host='192.168.0.4',user='admin',password='password',db='project')
a=conn.cursor()

def read(sheetread):

    k=0
    pos=0
    neg=0
    mix=0
    
    
   # name=sheetread.cell_value(0,0).split('(')[0]
    name=sheetread.cell_value(0,0)
    
    #oldprice=sheetread.cell_value(0,2).split('.')[0]
    #newprice=oldprice.split(',')
    #price=str(newprice[0])+str(newprice[1])
    price=sheetread.cell_value(0,2)
    rating=sheetread.cell_value(0,3)
    link=sheetread.cell_value(0,4)

    
    for i in range (sheetread.nrows):
        if(i>0):
            
            print(i)
            res=s.sentiment(sheetread.cell_value(i,0))
            if(res=='Positive'):
               pos+=1
            elif(res=='Negative'):
               neg+=1
            else:
               mix+=1
                     
    a.execute("insert into tvinfo_f (name,price,rating,link,pos,neg,mix,display,resolution,screen,sound,installation,image) values (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)",(name,price,rating,link,pos,neg,mix,0,0,0,0,0,0))

    conn.commit()

    print(name,price,pos,neg,mix)

for i in range(workbook.nsheets):
    sheetread = workbook.sheet_by_index(i+4)
    read(sheetread)
    print(i)

conn.close()


'''
    a.execute("insert into mobileinfo (name,price,rating,link,pos,neg,mix,camera,battery,processor,ram,memory,image) values (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)",(name,price,rating,link,pos,neg,mix,0,0,0,0,0,0))

    a.execute("insert into laptopinfo (name,price,rating,link,pos,neg,mix,graphics,processor,ram,drive,battery,image) values (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)",(name,price,rating,link,pos,neg,mix,0,0,0,0,0,0))

'''
