import read_sensor
import push_to_server
import time

import logging
from datetime import datetime

LOG_FILENAME = datetime.now().strftime('rpi_logfile_%H_%M_%S_%d_%m_%Y.log')

for handler in logging.root.handlers[:]:
	logging.root.removeHandler(handler)
logging.basicConfig(filename=LOG_FILENAME,level=logging.DEBUG)
logging.info("RPi with GUID 2 Started")


GUID = 2

number_readings = 3 #Number of reading before sending an email, based on maximums based on 30minutes
max_temp = 27.00 #Max temperature threshold
count_above_max_temp = 0 #number of times its above maximum temp, this gets reset
max_hum = 60.00 #Max temperature threshold
count_above_max_hum = 0 #number of times its above maximum hum, this gets reset

time.sleep(5)

#for i in range(1,300):
while 1:
	
	try:
		[temp,hum]= read_sensor.read_bme_sensor()
	except Exception, error:
		logging.info('Error in measurement: ')
		logging.error(str(error))
	else:
		logging.info('Sensor measurement successful')
	finally:
		logging.info('Finished measurement section')
    
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
    
	
    try:
	push_to_server.push_data(GUID,temp,hum)
    except Exception, error:
	logging.info('Error in pushing data to server: ')
	logging.error(str(error))
    else:
	logging.info('Data pushed successfully')
    finally:
	logging.info('Finished pushing data')
    
    time.sleep(600)
	
logging.error("If you see this message, the program has exited the main loop.")
    
  

#print ("Done!")

#f = open("/home/pi/Desktop/BME280/random.txt","a")
#f.write("Running - Temp: " + str(temp) + " Hum: " + str(hum))
#f.close()
