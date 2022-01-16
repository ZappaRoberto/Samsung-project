"""
Author:Nishan Chettri
Website:www.nishanchettri.com
Email: nishanchettri@gmail.com
"""
import os
import threading
import urllib.request as urllib2
from gpiozero import Button
from signal import pause
import RPi.GPIO as GPIO # Import Raspberry Pi GPIO library
from time import sleep # Import the sleep function from the time module

GPIO.setwarnings(False) # Ignore warning for now
GPIO.setmode(GPIO.BCM) # Use physical pin numbering
GPIO.setup(21, GPIO.OUT, initial=GPIO.LOW) # Set pin 8 to be an output pin and set initial value to low (off)
def done():#To Fast blink LED when data is sent to server
    for x in range(10): 
         GPIO.output(21, GPIO.HIGH) # Turn on         
         sleep(0.1) # Sleep for 1 second
         GPIO.output(21, GPIO.LOW) # Turn off
         sleep(0.1) # Sleep for 1 second
     
def sendDataToServer():
	threading.Timer(600,sendDataToServer).start()
	urllib2.urlopen("https://bgroupunipv.000webhostapp.com/up.php?state=true").read()
	sleep(1)
	done()#To Fast blink LED when data is sent to server
button = Button(18)

button.when_pressed = sendDataToServer #when button is pressed the stated function is called
pause()
