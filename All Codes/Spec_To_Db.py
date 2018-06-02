import xlrd
from xlwt import Workbook
#import pandas as pd
import Transformation_Module as s
import specification as sp
from nltk.tokenize import word_tokenize
from nltk.tokenize import sent_tokenize
import pymysql

#file_location = "C:\\Users\\Sachin-Gosavi\\Desktop\\FINAL_PROJECT\\Semi-Final Project\\Mob_rev.xls"
#file_location1= open("C:\\Users\\Sonali\\Desktop\\Project\\New Work\\AllMobile_result.xlsx").read()
#file_location = "F:\\Pratik Project\\Semi-Final Project\\TV.xls"
#file_location = "F:\\Pratik Project\\Semi-Final Project\\Flipkart data\\AllLapiflip.xlsx"
file_location = "C:\\Users\\Sonali\Desktop\\Semi-Final Project\\FlipkartData\\AllHPflip.xlsx"

#file_location = "C:\\Users\\Sonali\\Desktop\\Project\\nltk code\\rev.xlsx"



conn = pymysql.connect(host='192.168.0.22',user='admin',password='password',db='project')
a=conn.cursor()


#sarray=open("C:\\Users\\Sachin-Gosavi\\Desktop\\FINAL_PROJECT\\Semi-Final Project\\Mob_specs.txt").read()
#sarray=open("F:\\Pratik Project\\Semi-Final Project\\tv_specs.txt").read()
#sarray=open("F:\\Pratik Project\\Semi-Final Project\\Laptop_specs.txt").read()
sarray=open("C:\\Users\\Sonali\\Desktop\\Semi-Final Project\\All_Spec_Files\\pd_specs.txt").read()

workbook = xlrd.open_workbook(file_location)
sheetread = workbook.sheet_by_index(0)
sarray1=[]

sarray1=word_tokenize(sarray)


wb=Workbook()


def read(sheetread,k):
    specarray=[1,1,1,1,1,1,1,1,1,1]
    for i in range (sheetread.nrows):
        if(i>0):
            
            #res=s.sentiment(sheetread.cell_value(i,0))
            sent = sent_tokenize(sheetread.cell_value(i,0).lower())
            #sent = sent_tokenize("")
            #print(sent)
            sents = []
            #for v in sent:
                #sents.extend(v.split('.'))
               
            #print(sents)
            
            sp.specsfun(sents,specarray)
    print("FINAL PRODUCT SPECIFICATION:")
    print(specarray)
    '''
    spec1=(specarray[0]/(specarray[0]+specarray[5]) )*100
    spec2=(specarray[1]/(specarray[1]+specarray[6]) )*100
    spec3=(specarray[2]/(specarray[2]+specarray[7]) )*100
    spec4=(specarray[3]/(specarray[3]+specarray[8]) )*100
    spec5=(specarray[4]/(specarray[4]+specarray[9]) )*100

    result = [0,0,0,0,0]    
    
    result[0]=spec1
    result[1]=spec2
    result[2]=spec3
    result[3]=spec4
    result[4]=spec5
    '''
    result = [0,0,0,0,0]    
    pname = sheetread.cell_value(0,0).split('(')[0]
    a.execute ("""
    UPDATE pdinfo_f
    SET graphics=%s, processor=%s, ram=%s, drive=%s, battery=%s
    WHERE name=%s
    """, (result[0], result[1], result[2], result[3], result[4], pname))

    tname="pdinfo_f"
    a.execute("insert into allproduct (productname,tablename,feature1,feature2,feature3,feature4,feature5) values (%s,%s,%s,%s,%s,%s,%s)",(pname,tname,sarray1[0],sarray1[1],sarray1[2],sarray1[3],sarray1[4]))

    conn.commit()
    

for i in range(workbook.nsheets):
    
    sheetread = workbook.sheet_by_index(i)
    print("hi")
    read(sheetread,i)
    print(i)



conn.close()


''' a.execute ("""
    UPDATE tvinfo
    SET display=%s, resolution=%s, screen=%s, sound=%s, installation=%s
    WHERE name=%s
     """, (result[0], result[1], result[2], result[3], result[4], pname))





a.execute ("""
UPDATE mobileinfo
SET camera=%s, battery=%s, processor=%s, ram=%s, memory=%s
WHERE name=%s
""", (result[0], result[1], result[2], result[3], result[4], pname))


a.execute ("""
UPDATE laptopinfo
SET graphics=%s, processor=%s, ram=%s, drive=%s, battery=%s
WHERE name=%s
""", (result[0], result[1], result[2], result[3], result[4], pname))
tname="info"
'''
