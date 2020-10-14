FROM ubuntu:20.04
MAINTAINER Jin Park <jinchul112@gmail.com>

RUN apt-get update 
RUN apt-get install -y wget && apt-get install -y curl && apt-get remove -y nginx
RUN apt-get install -y nginx
RUN apt-get install -y git && apt-get install -y vim && apt-get install -y ufw
RUN ufw allow 'Nginx Full'
RUN echo "\ndaemon off;" >> /etc/nginx/nginx.conf
RUN chown -R www-data:www-data /var/lib/nginx
RUN apt-get install -y php-fpm
RUN apt-get install -y php-cli php-curl php-gd php-mysql php-mbstring zip unzip
RUN chgrp root /etc/nginx/sites-available/default
RUN chmod 664 /etc/nginx/sites-available/default

COPY /srcs /var/www/html

# VOLUME ["/data", "/etc/nginx/site-enabled", "/var/log/nginx"]

WORKDIR /etc/nginx

CMD ["nginx", "-g", "deamon off;"]

EXPOSE 80
EXPOSE 443
