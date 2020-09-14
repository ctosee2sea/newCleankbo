#! /bin/bash

#Make backup folder cleanKBO

TODAY=$(date '+%Y%m%d')

mkdir /home/backup/cleankbo/$TODAY
tar -zcf /home/backup/cleankbo/$TODAY/web.tar.gz --exclude /home/cleankbo/www/data /home/cleankbo/www
tar -zcf - /home/backup/cleankbo/$TODAY/web.tar.gz | split -b 50m - /home/backup/cleankbo/$TODAY/web.tar.gz
rm -rf /home/backup/cleankbo/$TODAY/web.tar.gz

#Backup DB
DBPASSWORD='kbokbo)^@('
mysqldump -h220.117.242.242 -ukboclean -p$DBPASSWORD kboclean > /home/backup/cleankbo/$TODAY/db.sql

tar -zcf - /home/backup/cleankbo/$TODAY/db.sql | split -b 50m - /home/backup/cleankbo/$TODAY/db.tar.gz
rm -rf /home/backup/cleankbo/$TODAY/db.sql


git add /home/backup/cleankbo/
git commit -m "commited cleankbo backup"
git push origin master




