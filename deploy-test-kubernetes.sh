#!/bin/bash

##step 1 coping the config.test.php file & renaming it to config.php inside the src folder
##with this file you access the db server
#Kubernetes file !!! 
cp config.test.php src/config.php

##step 2 grabbing the code from github,bitbucket, gitlab
##you grab the latest changes to the code and saves it onto your computer
git pull origin develop

##step 3 zip up all the files in src directory name it src.tz then move the file to the dir 1 level up
tar -C ./src -zcvf src.tz .

## step 4 copy the zip file to the container into /var/www/html
## does not actually have to go to html we can put it in tmp if we want
kubectl cp ./src.tz customer-api:/tmp

## step 5 ssh into the container, unzip the file & put in the root directory where nginx looks for it 
## see php-app/docker/provision/nginx.conf "root" directive
kubectl exec -it  customer-api /bin/bash -c "tar -zxvf /tmp/src.tz -C /usr/share/nginx/html/"

echo ===== deploy complete =====
