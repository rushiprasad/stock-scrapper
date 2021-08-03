import requests
import math
import json
import time
from bs4 import BeautifulSoup

def allFunc():

    def appendToJSON(data):
        with open('stockDataForWeb.json', 'w') as fp:
            json.dump(data, fp)

    stockDataArray = []
    def company_name_fun(cname):
        # print(cname)
        url = 'https://www.google.com/finance/quote/'+cname

        res = requests.get(url)
        soup = BeautifulSoup(res.text, 'lxml')

        company_name = soup.find_all('h1', {'class': 'kHAtIb'})[0].get_text()
        stock_name = soup.find(class_='GLlpnb').get_text()
        stock_name = stock_name.replace(' • NSE', '');
        current_price = soup.find_all('div', {'class': 'YMlKec fxKbKc'})[0].get_text()
        previous_close = soup.find(class_='M2CUtd').get_text()
        current_price = current_price.replace('₹', '').replace(',', '')
        previous_close = previous_close.replace('₹', '').replace(',', '')

        # print()
        # print('** '+company_name+' **')
        # print(stock_name)
        # print('Current Price: ₹'+ current_price)
        # print('Opening Price: ₹'+opening_price)

        # current_price = "{:.2f}".format(current_price)
        # opening_price = "{:.2f}".format(opening_price)

        current_price = float(current_price)
        previous_close = float(previous_close)

        diff_curr_open = current_price - previous_close


        # print('Today\'s Difference: '+ str(diff_curr_open))

        if(diff_curr_open > 0):
            status = 'Bullish'
            today_change_per = (diff_curr_open * 100) / previous_close
            today_change_per = "{:.2f}".format(today_change_per)
            # print('Status: Bullish')
        else:
            status = 'Bearish'
            today_change_per = (diff_curr_open * 100) / previous_close
            today_change_per = "{:.2f}".format(today_change_per)
            # print('Status: Bearish')

        diff_curr_open = "{:.2f}".format(diff_curr_open)
        stockData = {'company_name': company_name, 'stock_name': stock_name, 'current_price': current_price, 'previous_close': previous_close, 'diff_curr_open': diff_curr_open, 'today_change_per': today_change_per, 'status': status}
        stockDataArray.append(stockData)
        appendToJSON(stockDataArray)
        


    file = open('stockData.json',)
    data = json.load(file)
    for i in data:
        company_name_fun(i['company_name'])
    file.close()


allFunc()