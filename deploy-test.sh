#!/bin/bash

#*********** Don't forget to update IP address in the config.test.php ERROR Timed out!***********
# This script grabs bitbucket updates  zips it and deploy
#It also copies the updated config.test.php file with current IP  rename to config.php to connect to the db server 

ip=127.0.0.1  #This Is App IP Address

cp config.test.php src/config.php
git pull origin master
cd . && tar -zcvf ../src.tz .
cd ..
docker cp  ./src.tz docker_api_1:/var/www/html/
docker exec docker_api_1 /bin/bash -c "tar -zxvf /var/www/html/src.tz -C /var/www/html/"

echo ===== deploy complete =====
