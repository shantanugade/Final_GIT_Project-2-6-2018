from nltk.tokenize import word_tokenize
from nltk.tokenize import sent_tokenize
import Transformation_Module as s
import xlrd
from xlwt import Workbook
#from nltk.corpus import wordnet





def specsfun(sents,posspecs):

    specs =[]
    #stopwords = open("C:\\Users\\Pratik\\Desktop\\New Work\\aaa.txt","r").read()
    #specs = word_tokenize(open("F:\\Pratik Project\\Semi-Final Project\\Mob_specs.txt","r").read())
    pecs = word_tokenize(open("F:\\Pratik Project\\Semi-Final Project\\Mob_specs.txt","r").read())

    for w in sents:
       # print(w)    
        words = word_tokenize(w)

        #print(words)
        wordlen=len(words)

        for i in range(0,wordlen):
            if(words[i] in specs):
                sentiment=s.sentiment(w)
               # print(words[i])
            else:
                continue

            #print(words)

            len1 = len(words)

            for i in range(0,len1):
                if(words[i] in specs):
                  # print("lower :")
                   #print(words[i])
                   if(sentiment == "Positive"):
                       if(specs[0] == words[i]):
                           print("ka nahi jat") 
                           posspecs[0]=posspecs[0]+1
                       if(words[i]==specs[1]):
                           posspecs[1]=posspecs[1]+1
                       if(words[i]=="processor" ):
                           posspecs[2]=posspecs[2]+1
                       if(words[i]=="ram"):
                           posspecs[3]=posspecs[3]+1   
                       if(words[i]=="memory" ):
                           posspecs[4]=posspecs[4]+1

                   if(sentiment == "Negative"):
                       if(words[i]=="camera"):
                           posspecs[5]=posspecs[5]+1
                       if(words[i]=="battery" ):
                           posspecs[6]=posspecs[6]+1
                       if(words[i]=="processor" ):
                           posspecs[7]=posspecs[7]+1
                       if(words[i]=="ram" ):
                           posspecs[8]=posspecs[8]+1
                       if(words[i]=="memory" ):
                           posspecs[9]=posspecs[9]+1
                       print("camera battery processor ram memory")       
                       print(posspecs)
                       
                       #print(posspecs)
   

'''
k=0
for i in range (sheetread.nrows):
        print(i)
        if(i>0):
               #sheet1.write(k,0,sheetread.cell_value(i,0))
               sent = sent_tokenize(sheetread.cell_value(i,0).lower())
               print(sent)
               sents = []
               for v in sent:
                   sents.extend(v.split('.'))
               
               print(sents)
               specsfun(sents)
               #sheet1.write(k,1,res)
               #k+=1
               #wb.save("single_check1.xls")


'''

#print("camera battery processor ram memory")       
#print(posspecs)
#print(posspecs)
