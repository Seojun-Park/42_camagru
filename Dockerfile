FROM ubuntu:20.04
MAINTAINER Jin Park <jinchul112@gmail.com>

RUN apt-get update 
RUN apt-get install -y wget && apt-get install -y curl && apt-get remove -y nginx
RUN apt-get install -y nginx
RUN apt-get install -y git && apt-get install -y vim && apt-get install -y ufw
RUN ufw allow 'Nginx Full'
RUN echo "\ndaemon off;" >> /etc/nginx/nginx.conf
RUN chown -R www-data:www-data /var/lib/nginx
RUN apt-get install -y composer && apt-get install -y mariadb-server && apt-get install -y mariadb-client
RUN apt-get install -y php7.4-fpm
RUN apt-get install -y php7.4-cli php7.4-curl php7.4-gd php7.4-mysql php7.4-mbstring zip unzip
RUN chgrp root /etc/nginx/sites-available/default
RUN chmod 664 /etc/nginx/sites-available/default
# RUN chmod 755 setup.sh
# RUN echo "Setting up" && ./setup

COPY srcs/ /var/www/html
# COPY docker/setup.sh ./

# VOLUME ["/data", "/etc/nginx/site-enabled", "/var/log/nginx"]
# WORKDIR /etc/nginx

CMD ["nginx"]
# CMD bash /start.sh


EXPOSE 80
EXPOSE 443
