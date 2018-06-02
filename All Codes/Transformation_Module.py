import nltk
import difflib 
import random
import pickle
from nltk.tokenize import word_tokenize
from collections import Counter
from nltk.corpus import stopwords
from nltk.stem import PorterStemmer


'''
short_pos = open("F:\\Pratik Project\\Semi-Final Project\\Dictionaries\\newpos.txt","r").read()
short_neg = open("F:\\Pratik Project\\Semi-Final Project\\Dictionaries\\newneg.txt","r").read()
negation  = open("F:\\Pratik Project\\Semi-Final Project\\Dictionaries\\negationwords.txt","r").read()
stopwords = open("F:\\Pratik Project\\Semi-Final Project\\Dictionaries\\stopwords.txt","r").read()

short_pos = open("C:\\Users\\Sonali\\Desktop\\Semi-Final Project\\Dictionaries\\newpos.txt","r").read()
short_neg = open("C:\\Users\\Sonali\\Desktop\\Semi-Final Project\\Dictionaries\\newneg.txt","r").read()
negation  = open("C:\\Users\\Sonali\\Desktop\\Semi-Final Project\\Dictionaries\\negationwords.txt","r").read()
stopwords = open("C:\\Users\\Sonali\\Desktop\\Semi-Final Project\\Dictionaries\\stopwords.txt","r").read()
new_word = open("C:\\Users\\Sonali\\Desktop\\Semi-Final Project\\Dictionaries\\newword.txt","a")
'''

short_pos = open("C:\\Users\\Sachin-Gosavi\\Desktop\\FINAL_PROJECT\\Semi-Final Project\\Dictionaries\\newpos.txt","r").read()
short_neg = open("C:\\Users\\Sachin-Gosavi\\Desktop\\FINAL_PROJECT\\Semi-Final Project\\Dictionaries\\newneg.txt","r").read()
negation  = open("C:\\Users\\Sachin-Gosavi\\Desktop\\FINAL_PROJECT\\Semi-Final Project\\Dictionaries\\negationwords.txt","r").read()
stopwords = open("C:\\Users\\Sachin-Gosavi\\Desktop\\FINAL_PROJECT\\Semi-Final Project\\Dictionaries\\stopwords.txt","r").read()
new_word = open("C:\\Users\\Sachin-Gosavi\\Desktop\\FINAL_PROJECT\\Semi-Final Project\\Dictionaries\\newword.txt","a")




# move this up here
all_words = []
all_pwords = []
all_nwords = []
documents = []


#  j is adject, r is adverb, and v is verb
#allowed_word_types = ["J","R","V"]
allowed_word_types = ["J"]

for p in short_pos.split('\n'):
    #documents.append( (p, "pos") )
    pwords = word_tokenize(p)
    ppos = nltk.pos_tag(pwords)
   # print(pos)
    for w in ppos:
        #if w[1][0] in allowed_word_types:
            all_pwords.append(w[0].lower())

    
for p in short_neg.split('\n'):
    #documents.append( (p, "neg") )
    nwords = word_tokenize(p)
    npos = nltk.pos_tag(nwords)
   # print(pos)
    for w in npos:
        #if w[1][0] in allowed_word_types:
            all_nwords.append(w[0].lower())

#print(all_pwords)
#print(all_nwords)

#############################################################

#Check Word In POsitive Or Negative Words            

def check_word(w):
    if(w in all_pwords):
        return 2
    
    elif(w in all_nwords):
        return 3
    else:
        return 0


####################################################################


#Autocorrection Of Words




def autocorrection(w):
    j=97
    dflag=0
    max=0
    bflag=0
    path="C:\\Users\\Sachin-Gosavi\\Desktop\\FINAL_PROJECT\\Semi-Final Project\\Dictionaries\\WordPickels\\"

  
  
    #print(chr(j))
    while(j<123):
        if(w[0]==chr(j)):
            #print(path+chr(j)+".pickle")
            fpickled_words = open(path+chr(j)+".pickle","rb")
            pickled_words=pickle.load(fpickled_words)
            fpickled_words.close()
            bflag=1
            
        j=j+1        
                    
    if(bflag==0):
        return w
    
    
    for w2 in pickled_words:
        sequence = difflib.SequenceMatcher(isjunk=None , a=w2 , b=w)
        difference = sequence.ratio()*100
        difference = round(difference,2)

        
        if(difference==100):
            dflag=1
            temp=w2
            #print(difference)
            break
            
        if(difference > 88 and max <= difference):
            dflag=1
            temp=w2
            max=difference
            #print(difference)
            #print(temp)
            

    
    if(dflag==1):
        w=temp
        #print(w)
        return w
    else:
        #print(w)
        return w
        
        #print(w)

############################################################################################3












def sentiment(text):
    res=0
    flag=0
    temp = ""
    dflag=0
    check_word_flag=0
    unknown_flag=0
    text_words=word_tokenize(text)
    for w in text_words:
        w=w.lower()
        if(w in stopwords or len(w)<2): #stop words removal
            continue

        count=[]*26
      #  w=stemmer.stem(w)    #Stemming

       

        #count=fastsearch(allwords)
        #print(count)
            
        #print(w)
        max=0
        dflag=0

        check_word_flag=check_word(w)

        
        if(check_word_flag==0):
            w=autocorrection(w)



        if(w in negation):
            flag=1
            
        if(check_word_flag==0):
            if(w in all_pwords):
                if(flag==1):
                    res=res-1
                     
                else:
                    res=res+1
                    
                flag=0
                
            elif(w in all_nwords):
                if(flag==1):
                    res=res+1
                else:
                    res=res-1
                    
                flag=0
            else:
                unknown_flag=1
        else:
            if(check_word_flag==2):
                if(flag==1):
                    res=res-1
                     
                else:
                    res=res+1
                flag=0
                
            elif(check_word_flag==3):
                if(flag==1):
                    res=res+1
                else:
                    res=res-1
                flag=0
            else:
                unknown_flag=1

        if(unknown_flag==1):
            new_word.write(w+" ")
             
                
     
        #print(res)
   # new_word.close()

    if(res> 0):
        return "Positive"
    elif(res<0):
        return "Negative"
    elif(res==0):
        return "Mixed"
        

            
            


