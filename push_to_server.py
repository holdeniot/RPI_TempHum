import urllib.request

def push_data(temp,hum):

    url = urllib.request.urlopen("http://holdeniot.000webhostapp.com/rpi_uploads/temperature.php/?temp={0:0.01f}&hum={1:0.01f}&page=0".format(temp,hum))

    return

def email_alert(temp,hum):
    
    url = urllib.request.urlopen("http://holdeniot.000webhostapp.com/emailAlert.php/?temp={0:0.01f}&hum={1:0.01f}".format(temp,hum))
    
    return