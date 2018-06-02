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
    while True:
        web = requests.get(url).text
        ws=BeautifulSoup(web,'lxml')            
        x=ws.findAll('span',class_='a-size-base a-color-secondary')
        if(x!=None):
            if(len(x)>0):
                break
    mob_size=(((x[0].text).split(':'))[1]).split('|')[0]
    while True:
        web = requests.get(url).text
        ws=BeautifulSoup(web,'lxml')            
        x=ws.findAll('span',class_='a-color-price arp-price')
        if(x!=None):
            if(len(x)>0):
                break
    mob_price=x[0].text.split(' ')[0].split('₹\xa0')[1]
    while True:
        web = requests.get(url).text
        ws=BeautifulSoup(web,'lxml')            
        x=ws.findAll('span',class_='a-icon-alt')
        if(x!=None):
            if(len(x)>0):
                break
    mob_star=(x[0]).text.split(' ')
    mob_star=mob_star[0]

    while True:
        web = requests.get(url).text
        ws=BeautifulSoup(web,'lxml')            
        x=ws.findAll('a',class_='a-link-normal')
        if(x!=None):
            if(len(x)>0):
                break
    mob_link="https://www.amazon.in"+x.get('href')


    
    print(mob_name)
    print(mob_size)
    print(mob_price)
    print(mob_star)
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
    while(j<10):
        reviews=list(map(lambda x:x.text,res1.find_all('div',class_='a-row review-data')))
        for t1 in reviews:
            
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
        wb.save('Mob_rev.xls')


wb=xlwt.Workbook()

path=["https://www.amazon.in/Moto-Plus-Lunar-Grey-64GB/product-reviews/B071HWTHPH/ref=cm_cr_dp_d_show_all_btm?ie=UTF8&reviewerType=all_reviews",
      "https://www.amazon.in/Redmi-4-Black-16-GB/product-reviews/B01MT0QKAG/ref=cm_cr_arp_d_paging_btm_1?ie=UTF8&pageNumber=1&reviewerType=all_reviews",
      "https://www.amazon.in/OnePlus-Midnight-Black-64GB-memory/product-reviews/B0756ZFXVB/ref=cm_cr_dp_d_show_all_btm?ie=UTF8&reviewerType=all_reviews",
      "https://www.amazon.in/Samsung-Galaxy-J7-Prime-Offers/product-reviews/B0773R5ZYT/ref=cm_cr_dp_d_show_all_btm?ie=UTF8&reviewerType=all_reviews",
      "https://www.amazon.in/Lenovo-Venom-Black-System-Update/product-reviews/B01LZKSUXF/ref=cm_cr_dp_d_show_all_btm?ie=UTF8&reviewerType=all_reviews",
      "https://www.amazon.in/Nokia-Mobile-8-Steel-64GB/product-reviews/B072LNNSQQ/ref=cm_cr_dp_d_show_all_btm?ie=UTF8&reviewerType=all_reviews",
      "https://www.amazon.in/Vivo-V7-Gold-Fullview-Display/product-reviews/B07548NYFP/ref=cm_cr_dp_d_show_all_btm?ie=UTF8&reviewerType=all_reviews",
      "https://www.amazon.in/Sony-Xperia-R1-Plus-Dual/product-reviews/B076HYJT12/ref=cm_cr_dp_d_show_all_btm?ie=UTF8&reviewerType=all_reviews",
      "https://www.amazon.in/Apple-iPhone-Plus-Black-128GB/product-reviews/B01LWNBCGM/ref=cm_cr_dp_d_show_all_btm?ie=UTF8&reviewerType=all_reviews",
      "https://www.amazon.in/Asus-Zenfone-ZC550KL-Black-16GB/product-reviews/B018VKZPG4/ref=cm_cr_dp_d_show_all_btm?ie=UTF8&reviewerType=all_reviews"]

mysheets=['Moto G5plus','Redmi4','One plus 5t','Samsung-Galaxy-J7','Lenovo k8','Nokia 8','Vivo V7','Sony-Xperia-R1-Plus','iPhone 7 plus','Asus-Zenfone']

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

