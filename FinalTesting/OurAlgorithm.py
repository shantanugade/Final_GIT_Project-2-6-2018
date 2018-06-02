import Transformation_Module as s
import xlrd
from xlwt import Workbook
from nltk.corpus import wordnet


file_location = "C:\\Users\\Sonali\\Desktop\\Semi-Final Project\\testing\\FinalTesting\\test.xlsx"
workbook = xlrd.open_workbook(file_location)
sheetread = workbook.sheet_by_index(0)


wb=Workbook()
sheet1= wb.add_sheet("sheet1")

k=0
for i in range (sheetread.nrows):
        print(i)
        if(i>0):
               sheet1.write(k,0,sheetread.cell_value(i,0))
               #sheet1.write(k,1,sheetread.cell_value(i,1))
                
               res=s.sentiment(sheetread.cell_value(i,0))
               sheet1.write(k,1,res)
               k+=1
               wb.save("C:\\Users\\Sonali\\Desktop\\Semi-Final Project\\testing\\FinalTesting\\Result1.xls")





'''
k=0
pos=0
neg=0
mix=0
res=''
#i=0
wb=Workbook()
redmi_4= wb.add_sheet("redmi_4")

redmi_4.write(0,0,sheetread.cell_value(0,0))
redmi_4.write(0,1,sheetread.cell_value(0,1))
redmi_4.write(0,2,sheetread.cell_value(0,2))
redmi_4.write(0,3,sheetread.cell_value(0,3))

for i in range (sheetread.nrows):
        if(i>0):
                res=s.sentiment(sheetread.cell_value(i,0))
                if(res=='Positive'):
                        pos+=1
                elif(res=='Negative'):
                        neg+=1
                else:
                        mix+=1
                        

k=1
redmi_4.write(k,0,'Positive')
redmi_4.write(k,1,pos)

k=k+1
redmi_4.write(k,0,'Negative')
redmi_4.write(k,1,neg)

k=k+1
redmi_4.write(k,0,'Mixed')
redmi_4.write(k,1,mix)

wb.save("moto_result.xlsx")

'''


'''

                    if(res=='Positive'):
                            pos+=1
                    elif(res=='Negative'):
                            neg+=1
                    else:
                            mix+=1
                    sheet1.write(k,3,res)
                    k=k+1  


k=k+1
sheet1.write(k,0,'Positive')
sheet1.write(k,1,pos)

k=k+1
sheet1.write(k,0,'Negative')
sheet1.write(k,1,neg)

k=k+1
sheet1.write(k,0,'Mixed')
sheet1.write(k,1,mix)


        print(int(sheetread.cell_value(i,0)))
        if(2==sheetread.cell_value(i,0)):

'''
