from nltk.corpus import wordnet
from nltk.tokenize import word_tokenize

new_word = open("C:\\Users\\Sonali\\Desktop\\Semi-Final Project\\Dictionaries\\newword.txt","r").read()
#short_pos = open("C:\\Users\\Sonali\\Desktop\\Semi-Final Project\\Dictionaries\\test_pos.txt","r").read()
#short_neg = open("C:\\Users\\Sonali\\Desktop\\Semi-Final Project\\Dictionaries\\test_neg.txt","r").read()

print(new_word)

#synsarray = wordnet.synsets("worst")
#print(synsarray)
'''
print(syns)
print(syns.length())
print(syns[0].name())
print(syns[0].lemmas()[0].name())

'''

s=[]
s =word_tokenize(new_word)

print(s)
synonymslist = []

for a in s:
    synonymslist = []
    
    for synarray in wordnet.synsets(a):
        for l in synarray.lemmas():
           # print("similar words  : ", l)
            synonymslist.append(l.name())

  
    print("list : ")
    print(synonymslist)

    flag=0
    for i in range(0,len(synonymslist)):
        if(synonymslist[i] in short_pos):
            flag=1
            break
        elif(synonymslist[i] in short_neg):
            flag=2
            break



    if(flag==1):
        file1=open("C:\\Users\\Sonali\\Desktop\\Semi-Final Project\\Dictionaries\\newpos.txt","a")
        file1.write(a+" ")
        file1.close()

    if(flag==2):
        file1=open("C:\\Users\\Sonali\\Desktop\\Semi-Final Project\\Dictionaries\\newneg.txt","a")
        file1.write(a+" ")
        file1.close()








