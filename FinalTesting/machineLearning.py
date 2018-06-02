import test2 as s
import xlrd
from xlwt import Workbook
from nltk.corpus import wordnet


file_location = "C:\\Users\\Sachin-Gosavi\\Desktop\\FINAL_PROJECT\\Semi-Final Project\\testing\\FinalTesting\\Result1.xls"
workbook = xlrd.open_workbook(file_location)
sheetread = workbook.sheet_by_index(0)

k=0
s
wb=Workbook()
sheet1= wb.add_sheet("sheet1")

#ID = int(input('Enter product ID: '))
#print(ID)

for i in range (sheetread.nrows):
        if(i>=0):
            sheet1.write(k,0,sheetread.cell_value(i,0))
            sheet1.write(k,1,sheetread.cell_value(i,1))
            res=s.sentiment(sheetread.cell_value(i,0))
            if(res=='pos'):    
                    sheet1.write(k,2,'Positive')
            if(res=='neg'):    
                    sheet1.write(k,2,'Negative')
            k=k+1  

wb.save("C:\\Users\\Sachin-Gosavi\\Desktop\\FINAL_PROJECT\\Semi-Final Project\\testing\\FinalTesting\\Result2.xls")
