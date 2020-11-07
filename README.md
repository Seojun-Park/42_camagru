<!-- @format -->

# Camagru

### Summary

> Camagru is a first 42 web project that allow the students to create a small social media web(such as facebook or instagram) application. A user can post their images, photos, statements...etc.

## Stacks

docker / php / html / mysql

## Todo List

**Auth**
> - [x] : sign up with basic information
> - [x] : requiring password including special character
> - [ ] : Send email to be verified || the last todo!!!!
> - [x] : duplicated User ID check
> - [x] : login with User ID and pw

**Page**
> Header
>   > - [x] : responsive layout
>   > - [x] : logout in any pages

> Upload
>   > - [x] : image upload and preview
>   > - [x] : put sticker on uploaded image
>   > - [x] : save the image file on storage
>   > - [x] : save the data in the DB
>   > - [x] : CSS media query

> Camera
>   > - [x] : Put the camera on
>   > - [x] : Capture 
>   > - [x] : put sticker on the preview image
>   > - [x] : save the edited image file
>   > - [x] : saved image index check needed

> Gallery
>   > - [x] : Showing feed

## memo

    docker build --tag name:tag

    docker build --force-rm --tag name:tag

    docker volume study will be needed

    docker compose

    docker exec -it <name> bash

    docker logs[container]

    grep -r [array][path]

    docker network create cama-network

    docker run --name db -d --network cama-network mysql

    docker run --name cama -d -p 80:80 --network cama-network cama:0.2

### phpmyadmin

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

mysql -u root -p [name of db]> < /path/query.sql


IDX 같은 항상 증가되는 data 컬럼들은 테이블 생성시 auto_increment 빼먹지말기


sendmail test

<!-- ISP 에서 25번 포트를 block 해놔서 테스트 불가 -->
telnet localhost 25

ehlo 127.0.0.1 or ehlo localhost or helo localhost

mail from: admin@localhost.com

rcpt to: user@provider.com

data

subject : subject
content

.
