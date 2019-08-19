import read_sensor
import push_to_server
import time

GUID = 2

number_readings = 3 #Number of reading before sending an email, based on maximums based on 30minutes
max_temp = 27.00 #Max temperature threshold
count_above_max_temp = 0 #number of times its above maximum temp, this gets reset
max_hum = 60.00 #Max temperature threshold
count_above_max_hum = 0 #number of times its above maximum hum, this gets reset

time.sleep(5)

#for i in range(1,300):
while 1:
    [temp,hum]= read_sensor.read_bme_sensor()
    
    if (temp > max_temp):
        count_above_max_temp+=1
    else:
        count_above_max_temp = 0
        
    if (hum > max_hum):
        count_above_max_hum+=1
    else:
        count_above_max_hum = 0
        
    if (count_above_max_temp >= number_readings+1):
        push_to_server.email_alert(GUID,temp,hum)
    
    if (count_above_max_hum >= number_readings+1):
        push_to_server.email_alert(GUID,temp,hum)
    
    push_to_server.push_data(GUID,temp,hum)
    
    time.sleep(600)
    
  

#print ("Done!")

#f = open("/home/pi/Desktop/BME280/random.txt","a")
#f.write("Running - Temp: " + str(temp) + " Hum: " + str(hum))
#f.close()