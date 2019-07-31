import urllib.request

def push_data(guid,temp,hum):

    url = urllib.request.urlopen("http://holdeniot.000webhostapp.com/rpi_uploads/temperature.php/?temp={0:0.01f}&hum={1:0.01f}&guid={2:1f}&page=0".format(temp,hum,guid))

    return

def email_alert(guid,temp,hum):
    
    url = urllib.request.urlopen("http://holdeniot.000webhostapp.com/emailAlert.php/?temp={0:0.01f}&hum={1:0.01f}&guid={2,1f}".format(temp,hum,guid))
    
    return
