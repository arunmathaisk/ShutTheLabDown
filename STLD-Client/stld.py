import os
import requests

LAB_NUMER = "111"

SERVER_IP = "http://localhost"

TARGET_URL = "/STLD/status.php"

ARGUMENT_URL = "?lab_number=" + LAB_NUMER

URL = SERVER_IP + TARGET_URL + ARGUMENT_URL

print(URL)

RESPONSE_COMMAND = requests.get(URL)

print(RESPONSE_COMMAND.text)

if(RESPONSE_COMMAND.text=='shutdown'):
    os.system("poweroff")
