import logging
from datetime import datetime

LOG_FILENAME = datetime.now().strftime('rpi_logfile_%H_%M_%S_%d_%m_%Y.log')

for handler in logging.root.handlers[:]:
	logging.root.removeHandler(handler)
logging.basicConfig(filename=LOG_FILENAME,level=logging.DEBUG)
logging.info("RPi with GUID 1 Started")

logging.debug("Test")
logging.error("Test error")