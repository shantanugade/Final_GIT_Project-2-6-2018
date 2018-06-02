from textblob import TextBlob
import sys
import csv
import xlrd
from xlwt import Workbook
from nltk.corpus import wordnet


sents = []

file_location ="C:\\Users\\Sachin-Gosavi\\Desktop\\FINAL_PROJECT\\Semi-Final Project\\testing\\FinalTesting\\Result2.xls"
workbook = xlrd.open_workbook(file_location)
sheetread = workbook.sheet_by_index(0)

k=0

wb=Workbook()
sheet1= wb.add_sheet("sheet1")

#ID = int(input('Enter product ID: '))
#print(ID)
for i in range (sheetread.nrows):
        if(i>0):
            sents.append(sheetread.cell_value(i,0))
            #sheet1.write(k,1,s.sentiment(sheetread.cell_value(i,0)))
            #k=k+1  

#wb.save("mix_new_result.xls")
i=0

#print(sents)


for s in sents:
    text = s
		
    #cleanedtext = ' '.join([word for word in text.split(' ') if len(word) > 0 and word[0] != '@' and word[0] == '.' and word[0] != '#' and 'http' not in word and word != 'RT'])
    print(s)
    #print("clean text :")
    #print(s)		
    analysis = TextBlob(s)
    print("Ana :")
    print(analysis)
    sentiment = analysis.sentiment.polarity
    print(sentiment)
    if sentiment > 0:
        polarity = 'Positive'
    elif(sentiment<0):
        polarity = 'Negative'
    else :
        polarity= 'Mixed'   

    sheet1.write(k,0,sheetread.cell_value(i,0))
    sheet1.write(k,1,sheetread.cell_value(i,1))
    sheet1.write(k,2,sheetread.cell_value(i,2))
    sheet1.write(k,3,polarity)
                	
    #sheet1.write(k,0,sheetread.cell_value(i,0))
    
    #sheet1.write(k,1,polarity)
    k=k+1
    i=i+1

wb.save("C:\\Users\\Sachin-Gosavi\\Desktop\\FINAL_PROJECT\\Semi-Final Project\\testing\\FinalTesting\\Result3.xls")


