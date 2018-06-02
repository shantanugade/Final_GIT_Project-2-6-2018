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
    mob_name=x[0].text
    print(mob_name)
    sheet.write(0,0,mob_name)

    '''
    while True:
        web = requests.get(url).text
        ws=BeautifulSoup(web,'lxml')            
        x=ws.findAll('span',class_='a-size-base a-color-secondary')
        if(x!=None):
            if(len(x)>0):
                break
    mob_size=(((x[0].text).split(':'))[1]).split('|')[0]
    print(mob_size)
    sheet.write(0,1,mob_size)
    '''
       
    while True:
        web = requests.get(url).text
        ws=BeautifulSoup(web,'lxml')            
        x=ws.findAll('span',class_='a-color-price arp-price')
        if(x!=None):
            if(len(x)>0):
                break
    mob_price=x[0].text.split(' ')[0].split('₹\xa0')[1]
    print(mob_price)
    sheet.write(0,2,mob_price)


    while True:
        web = requests.get(url).text
        ws=BeautifulSoup(web,'lxml')            
        x=ws.findAll('span',class_='a-icon-alt')
        if(x!=None):
            if(len(x)>0):
                break
    mob_star=(x[0]).text.split(' ')
    mob_star=mob_star[0]
    
    print(mob_star)
    sheet.write(0,3,mob_star)
    
    while True:
        web = requests.get(url).text
        ws=BeautifulSoup(web,'lxml')            
        mob_link=ws.find('a',class_='a-link-normal')
        if(x!=None):
            if(len(x)>0):
                break
    prod_link="https://www.amazon.in"+mob_link.get('href')
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
        wb.save('pd_res.xls')


wb=xlwt.Workbook()

path=["https://www.amazon.in/SanDisk-Cruzer-Blade-SDCZ50-016G-135-Drive/product-reviews/B002U1ZBG0/ref=cm_cr_dp_d_show_all_btm?ie=UTF8&reviewerType=all_reviews",
      "https://www.amazon.in/Sony-16GB-Microvault-Flash-Drive/product-reviews/B0073C7IIK/ref=cm_cr_dp_d_show_all_btm?ie=UTF8&reviewerType=all_reviews",
      "https://www.amazon.in/HP-v236w-16GB-USB-Drive/product-reviews/B01L8ZI7U0/ref=cm_cr_dp_d_show_all_btm?ie=UTF8&reviewerType=all_reviews",
      "https://www.amazon.in/iBall-Hybrid-Dual-32GB-Pendrive/product-reviews/B00HVT9CDE/ref=cm_cr_dp_d_show_all_btm?ie=UTF8&reviewerType=all_reviews",
      "https://www.amazon.in/PNY-Attache-16GB-Flash-Drive/product-reviews/B00CDNX3EW/ref=cm_cr_dp_d_show_all_btm?ie=UTF8&reviewerType=all_reviews"]

mysheets=['SanDisk','Sony','HP','iBall','PNY']
#,'Redmi4','One plus 5t','Samsung-Galaxy-J7','Lenovo k8']

for p in range(0,len(path)):
    print(path[p])
    get_review(path[p],mysheets[p],wb)




#######################################################################################################################################
