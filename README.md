<!-- @format -->

# Camagru

### Summary

> Camagru is a first 42 web project that allow the students to create a small social media web(such as facebook or instagram) application. A user can post their images, photos, statements...etc.

## Stacks

<li>_docker_<br/><li>_php/html_<br/><li>_mysql_

## Server

## Database

docker build --force-rm --tag name:tag
docker volume study will be needed
docker compose
docker exec -it <name> bash

docker logs[container]

grep -r [array][path]

docker network create cama-network
docker run --name db -d --network cama-network mysql
docker run --name cama -d -p 80:80 --network cama-network cama:0.2

Method 1 : create a new super user for phpadmin login with

mysql -u root -p

then
CREATE USER 'user'@'localhost' IDENTIFIED WITH mysql_native_password BY 'password_here';

give permission
GRANT ALL PRIVILEGES ON _._ TO 'pmauser'@'localhost';

method 2 : change root Authentication Method

mysql

SELECT user,plugin,host FROM mysql.user WHERE user = 'root';

ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'enter_password_here';

flush it
FLUSH PRIVILEGES;
