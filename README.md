<!-- @format -->

# Camagru

### Summary

> Camagru is a first 42 web project that allow the students to create a small social media web(such as facebook or instagram) application. A user can post their images, photos, statements...etc.

## Stacks

docker / php / html / mysql

## Todo List

**Auth**
> - [x] : sign up with basic information
> - [ ] : requiring password with special character
> - [x] : duplicated User ID check
> - [x] : login with User ID and pw

**Page**
> Header
>   > - [x] : responsive layout
>   > - [x] : logout
>	> - [ ] : searching user by username or user id

> Feed
>   > - [x] : display writer and link to profile page of writer
>   > - [x] : display feed content
>   > - [ ] : display image / photo
>   > - [ ] : delete feed
>   > - [x] : add reply
>   > - [x] : delete reply

>  Profile
>   > - [x] : display the information of user
>   > - [ ] : following?? (not sure)
>	> - [ ] : display Avatar
>	> - [ ] : 

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
