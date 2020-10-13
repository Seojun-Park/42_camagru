## Camagru



docker build --tag name:tag
docker volume study will be needed
docker compose
docker exec -it <name> bash

docker logs[container]

service php7.4-fpm start
chgrp ubuntu /etc/nginx/sites-available/default
chmod 664 /etc/nginx/sites-available/default


test 

 docker run -d --name host_vol -e MYSQL_DATABASE=cama -e MYSQL_ROOT_PASSWORD=admin -v /Desktop/42_project/42_camagru/db:/var/lib/mysql mysql