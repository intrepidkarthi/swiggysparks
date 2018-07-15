#!/usr/bin/env python

import urllib.request
import urllib.parse

def sendSMS(apikey, numbers, sender, message):
    data =  urllib.parse.urlencode({'apikey': apikey, 'numbers': numbers, 'message' : message, 'sender': sender})
    data = data.encode('utf-8')
    request = urllib.request.Request("https://api.textlocal.in/send/?")
    f = urllib.request.urlopen(request, data)
    fr = f.read()
    return(fr)

resp =  sendSMS('QnhLEzz7YNo-fH2efwGihzwzbibkjiVneBjbNbeCCF', '919742381630', 'TXTLCL', 'hi from swiggy office. Ignore him!')
print (resp)
