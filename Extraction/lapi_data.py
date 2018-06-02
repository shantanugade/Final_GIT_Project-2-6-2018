import bs4 as bs 
import urllib.request
import requests
from bs4 import BeautifulSoup
import xlwt
from string import ascii_lowercase



#################################AMAZON###################################################################

def get_review(url,sheet,wb):
    
    sheet = wb.add_sheet(sheet)
    web = requests.get(url).text
    ws=BeautifulSoup(web,'lxml')
    
    while True:
        web = requests.get(url).text
        ws=BeautifulSoup(web,'lxml')            
        x=ws.findAll('a',class_='a-size-base a-link-normal')
        if(x!=None):
            if(len(x)>0):
                break
    prod_name=x[0].text
    print(prod_name)
    sheet.write(0,0,prod_name)

    '''
    while True:
        web = requests.get(url).text
        ws=BeautifulSoup(web,'lxml')            
        x=ws.findAll('span',class_='a-size-base a-color-secondary')
        if(x!=None):
            if(len(x)>0):
                break
    prod_size=(((x[0].text).split(':'))[1]).split('|')[0]
    print(prod_size)
    sheet.write(0,1,prod_size)

    '''    
    while True:
        web = requests.get(url).text
        ws=BeautifulSoup(web,'lxml')            
        x=ws.findAll('span',class_='a-color-price arp-price')
        if(x!=None):
            if(len(x)>0):
                break
    prod_price=x[0].text.split(' ')[0].split('₹\xa0')[1]
    print(prod_price)
    sheet.write(0,2,prod_price)


    while True:
        web = requests.get(url).text
        ws=BeautifulSoup(web,'lxml')            
        x=ws.findAll('span',class_='a-icon-alt')
        if(x!=None):
            if(len(x)>0):
                break
    prod_star=(x[0]).text.split(' ')
    prod_star=prod_star[0]
    
    print(prod_star)
    sheet.write(0,3,prod_star)
    
    while True:
        web = requests.get(url).text
        ws=BeautifulSoup(web,'lxml')            
        x=ws.findAll('a',class_='a-link-normal')
        if(x!=None):
            if(len(x)>0):
                break
    prod_link="https://www.amazon.in"+x.get('href')
    print(prod_link)
    sheet.write(0,4,prod_link)




        #####################################################################################
    
    res1=ws.findAll('div',class_='a-section a-spacing-none review-views celwidget')
    while True:
        web = requests.get(url).text
        ws=BeautifulSoup(web,'lxml')            
        res1=ws.findAll('div',class_='a-section a-spacing-none review-views celwidget')
        if(res1!=None):
            if(len(res1)>0):
                break
    res1=res1[0]

        #rev_src=res1.find('div',class_='a-row review-data').find('a',class_='a-link-emphasis a-text-bold')
        #print(rev_src.get('href'))

    i=1
    j=0
    while(j<10):
        reviews=list(map(lambda x:x.text,res1.find_all('div',class_='a-row review-data')))
        for t1 in reviews:
            
            if(len(t1)<1000):
            
                sheet.write(i,0,t1)
                
            else:
                print("Error")
                continue
            
            #sheet.write(i,0,t1)
                
            i+=1


        for l1 in ws.find_all('li',class_='a-last'):
            flag=False
            for l2 in l1.find_all('a'):
                print(l2.get('href'))
                url="https://www.amazon.in"+l2.get('href')
                web = requests.get(url).text
                ws=BeautifulSoup(web,'lxml')
                flag=True
                break
            if flag==True:
                break
                  
        res1=ws.findAll('div',class_='a-section a-spacing-none review-views celwidget')
        while True:
            web = requests.get(url).text
            ws=BeautifulSoup(web,'lxml')            
            res1=ws.findAll('div',class_='a-section a-spacing-none review-views celwidget')
            if(res1!=None):
                if(len(res1)>0):
                    break
        print(len(res1))
        res1=res1[0]
        j+=1
        wb.save('newrev.xls')


wb=xlwt.Workbook()

path=["https://www.amazon.in/Lenovo-80XH01FHIN-15-6-inch-i3-6006U-Integrated/product-reviews/B074DZPL6M/ref=cm_cr_dp_d_show_all_btm?ie=UTF8&reviewerType=all_reviews",
      "https://www.amazon.in/Dell-Inspiron-15-6-inch-Integrated-Graphics/product-reviews/B06XFHYSW2/ref=cm_cr_dp_d_show_all_btm?ie=UTF8&reviewerType=all_reviews",
      "https://www.amazon.in/HP-15q-BU004TU-15-6-inch-i3-6006U-Integrated/product-reviews/B0751LYPY3/ref=cm_cr_dp_d_show_all_btm?ie=UTF8&reviewerType=all_reviews",
      "https://www.amazon.in/Micromax-L1160-11-6-inch-Integrated-Graphics/product-reviews/B01ERHNUY4/ref=cm_cr_dp_d_show_all_btm?ie=UTF8&reviewerType=all_reviews",
      "https://www.amazon.in/Apple-MacBook-Air-13-3-inch-Integrated/product-reviews/B073Q5R6VR/ref=cm_cr_dp_d_show_all_btm?ie=UTF8&reviewerType=all_reviews"]

mysheets=['Lenovo','Dell','HP','Micromax','Apple']
#,'Redmi4','One plus 5t','Samsung-Galaxy-J7','Lenovo k8']

for p in range(0,len(path)):
    print(path[p])
    get_review(path[p],mysheets[p],wb)




#######################################################################################################################################
#####################################################FLIPCART#########################################################################






'''
print(web_soup.findAll("p"))
for p in ws.find_all('p'):
    print(p.text)
'''
#for div in ws.find_all('div',class_='a-expander-content a-expander-partial-collapse-content'):
#    print(div.text)

