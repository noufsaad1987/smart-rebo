# first Method
import urllib

from urllib.request import urlopen



link = 'https://www.wikipedia.org/'
f = urlopen(link)
myfile = f.read()
print(myfile)

# Second Method
import requests

r = requests.get('https://www.wikipedia.org/')
print(r.text)

