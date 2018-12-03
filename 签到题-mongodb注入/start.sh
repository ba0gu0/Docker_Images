#! /bin/sh
set -e

mongod --bind_ip 127.0.0.1 --dbpath /data/db --logpath /var/log/mongodb/mongodb.log --fork

mongo /db.js

/usr/sbin/httpd -D FOREGROUND