import pickle

allwords = open("C:\\Users\\Sachin-Gosavi\\Desktop\\New Work\\Dictionaries\\allwords.txt","r")
                

path="C:\\Users\\Sachin-Gosavi\\Desktop\\New Work\\Dictionaries\\WordPickels\\"

letters="abcdefghijklmnopqrstuvwxyz"
words=[]  
i=0
word='a'
while word!='':

     word=allwords.readline()
     if word=='':break
     if word[0]==letters[i]:
         words.append(word[:len(word)-1])
     else:
         save_words = open(path+letters[i]+".pickle","wb")
         pickle.dump(words, save_words)
         save_words.close()
         words=[]

         i+=1
         
