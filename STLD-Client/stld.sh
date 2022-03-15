#!/bin/bash

sudo crontab -r

sudo rm -rf /root/stld

sudo mkdir /root/stld



echo "Enter the lab number: "  
read lab_number

echo "Enter the Server IP in the form http(s):192.168.0.1 : "  
read server_ip

sudo wget https://raw.githubusercontent.com/arunmathaisk/stld/main/stld.py -P /root/stld/

echo "* * * * * /usr/bin/python3 /root/stld/stld.py $lab_number $server_ip" >> mycron

sudo crontab mycron
rm mycron

