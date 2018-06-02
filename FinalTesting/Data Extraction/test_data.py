
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
        x=ws.findAll('div',class_='a-row product-title')
        if(x!=None):
            if(len(x)>0):
                break
    mob_name=x[0].text
    print(mob_name)
    while True:
        web = requests.get(url).text
        ws=BeautifulSoup(web,'lxml')            
        x=ws.findAll('span',class_='a-size-base a-color-secondary')
        if(x!=None):
            if(len(x)>0):
                break
    mob_size=(((x[0].text).split(':'))[1]).split('|')[0]
    print(mob_size)

    while True:
        web = requests.get(url).text
        ws=BeautifulSoup(web,'lxml')            
        x=ws.findAll('span',class_='a-color-price arp-price')
        if(x!=None):
            if(len(x)>0):
                break
    mob_price=x[0].text.split(' ')[0].split('₹\xa0')[1]
    print(mob_price)

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

    while True:
        web = requests.get(url).text
        ws=BeautifulSoup(web,'lxml')            
        x=ws.findAll('a',class_='a-link-normal')
        #print(x.get('href'));
        #x='<a class=\"a-size-base a-link-normal\" href=\"/Moto-Plus-Lunar-Grey-64GB/dp/B071HWTHPH\">'
           #Change</a>, <a class="a-size-base a-link-normal" href="/gp/customer-reviews/R3MJCYKOOYW6VK?ASIN=B071HWTHPH#R3MJCYKOOYW6VK">Read more</a>, <a class="a-size-base a-link-normal" href="/gp/customer-reviews/R2FG810U8GKOGF?ASIN=B071HWTHPH#R2FG810U8GKOGF">Read more</a>]
        #print(type(x));
        #print(x[0].attrs['href'])
        '''
        if x.has_attr('href'):
            print(x['href'])
        #print(x.get('href'))
        '''
        if(x!=None):
            if(len(x)>0):
                break
    mob_link="https://www.amazon.in"+x[0].attrs['href']   
    print(mob_link)
    
    #print(ws.prettify())

    

    print(sheet)
    sheet.write(0,0,mob_name)
    sheet.write(0,1,mob_size)
    sheet.write(0,2,mob_price)
    sheet.write(0,3,mob_star)
    sheet.write(0,4,mob_link)
    




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
    while(j<2):
        reviews=list(map(lambda x:x.text,res1.find_all('div',class_='a-row a-spacing-medium review-data')))
        #print(reviews)
        for t1 in reviews:
            #print(t1)
            sheet.write(i,0,t1)
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
        wb.save('test_result.xls')


wb=xlwt.Workbook()

path=["https://www.amazon.in/Moto-Plus-Lunar-Grey-64GB/product-reviews/B071HWTHPH/ref=cm_cr_dp_d_show_all_btm?ie=UTF8&reviewerType=all_reviews",
      "https://www.amazon.in/Redmi-4-Black-16-GB/product-reviews/B01MT0QKAG/ref=cm_cr_arp_d_paging_btm_1?ie=UTF8&pageNumber=1&reviewerType=all_reviews"]

mysheets=['Moto G5plus','Redmi 4']

for p in range(0,len(path)):
    print(path[p])
    get_review(path[p],mysheets[p],wb)


