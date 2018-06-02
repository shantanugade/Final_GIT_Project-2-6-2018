import csv
import numpy as np
from sklearn.svm import SVR
import matplotlib.pyplot as plt
import xlrd
from xlwt import Workbook
import pymysql


#file_location = "C:\\Users\\Sachin-Gosavi\\Desktop\\FINAL_PROJECT\\Semi-Final Project\\Price Prediction\\All_Laptop_Prices.xlsx"
file_location = "C:\\Users\\Sachin-Gosavi\\Desktop\\FINAL_PROJECT\\Semi-Final Project\\Price Prediction\\TV\\All_TV_Prices.xlsx"


conn = pymysql.connect(host='192.168.2.120',user='pratik',password='sachin',db='project')
a=conn.cursor()


workbook = xlrd.open_workbook(file_location)
sheetread = workbook.sheet_by_index(0)
wb=Workbook()


#dates = []
#prices = []

res =[]
k=0
#file_location = "C:\\Users\\Sachin-Gosavi\\Desktop\\New Work\\priceprediction3.xlsx"
#workbook = xlrd.open_workbook(file_location)
#sheetread = workbook.sheet_by_index(0)


def read(sheetread,k,dates,prices):
        #dates=[]
        #prices=[]
        for i in range (sheetread.nrows):
                if(i>0):
                    #print("hiiiiii")
                    temp1 = str(sheetread.cell_value(i,0)).split('.')[0]
                    #print(temp1)
                    dates.append(int(temp1))
                   # print(dates)
                    prices.append(float(sheetread.cell_value(i,1)))
                    #print("byee")
                    if(i>5):
                            res.append(str(sheetread.cell_value(i,0)) +"."+ str(int(sheetread.cell_value(i,1))))
                        
                            lastm = str(sheetread.cell_value(i,0)).split('.')[1]  
                          
            

'''
def get_data(filename):
    with open(filename , 'r' ) as csvfile :
        csvFilereader = csv.reader(csvfile)
        next(csvFileReader)
        for row in csvFileReader :
            dates.append(int(row[0].split('/')[1]))
            prices.append(float(row[1]))

    return
'''



name=''
def predict(dates,prices,x):
    dates = np.reshape(dates,(len(dates),1))
    
   # print(prices)
    #print(dates)
    svr_lin = SVR(kernel = 'linear' , C=1e3)
    #svr_poly = SVR(kernel = 'poly' , C=1e3 , degree = 2)
    #svr_rbf = SVR(kernel = 'rbf' , C=1e3 , gamma = 0.1)
    svr_lin.fit(dates,prices)
    #svr_poly.fit(dates,prices)
    #svr_rbf.fit(dates,prices)

    '''
    plt.scatter(dates , prices , color='red' , lable = 'Data')
    plt.plot(dates, svr_rbf.predict(dates) , color='red' ,label='RBF model')
    plt.plot(dates, svr_lin.predict(dates) , color='green' ,label='Linear model')
    plt.plot(dates, svr_poly.predict(dates) , color='blue' ,label='Polynomial model')
    plt.xlabel('Date')
    plt.ylabel('Price')
    plt.tittle('Support Vector Regression')
    plt.legend()
    plt.show()
    '''

    #return svr_rbf.predict(x)[0] , svr_lin.predict(x)[0] ,svr_poly.predict(x)[0]
    
    return svr_lin.predict(x)[0] 
    

#get_data('priceprediction1.csv')



#print(res)    




for i in range(workbook.nsheets):
   
    sheetread = workbook.sheet_by_index(i)
    name=sheetread.cell_value(0,2)
    print(name)
    dates1=[]
    prices1=[]
    for l in range (sheetread.nrows):
            if(l>0):
                    lastm=str(sheetread.cell_value(l,0)).split('.')[1] 
    read(sheetread,i,dates1,prices1)
    for j in range(12,18):
        #print(dates1)
        #print(j)
        predicted_price = predict(dates1,prices1,j)
        #print("lastm :")
        #print(lastm)
        #print(predicted_price)
        res.append(str(j)+"."+lastm+"."+str(int(predicted_price)))
        k=k+1
    a.execute("insert into price_prediction (name,d1,d2,d3,d4,d5,d6,d7,d8,d9,d10,d11,d12) values (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)",(name,res[0],res[1],res[2],res[3],res[4],res[5],res[6],res[7],res[8],res[9],res[10],res[10]))
    conn.commit()
    print(res)
    res=[]



    
