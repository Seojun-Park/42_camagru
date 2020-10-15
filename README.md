## Camagru



docker build --force-rm --tag name:tag
docker volume study will be needed
docker compose
docker exec -it <name> bash

docker logs[container]

service php7.4-fpm start
chgrp ubuntu /etc/nginx/sites-available/default
chmod 664 /etc/nginx/sites-available/default


test 

 COPY /srcs /var/www/html

 grep -r [array] [path]

 docker network create cama-network
 docker run --name db -d --network cama-network mysql
 docker run --name cama -d -p 80:80 --network cama-network cama:0.2