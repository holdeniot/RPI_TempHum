from Adafruit_BME280 import *

BME280_OSAMPLE_4 = 5

def read_bme_sensor():
    sensor = BME280(t_mode=BME280_OSAMPLE_4, p_mode=BME280_OSAMPLE_4, h_mode=BME280_OSAMPLE_4)

    degrees = sensor.read_temperature()
    pascals = sensor.read_pressure()
    hectopascals = pascals / 100
    humidity = sensor.read_humidity()
    
    return (degrees,humidity)

#print ('Temp      = {0:0.1f} deg C'.format(degrees))
#print ('Pressure  = {0:0.1f} hPa'.format(hectopascals))
#print ('Humidity  = {0:0.1f} %'.format(humidity))