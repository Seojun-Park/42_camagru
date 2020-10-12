FROM ubuntu:latest
MAINTAINER Jin Park <jinchul112@gmail.com>

RUN apt-get update 
RUN apt-get install -y wget
RUN apt-get install -y nginx
RUN apt-get install -y git && apt-get install -y vim
RUN echo "\ndaemon off;" >> /etc/nginx/nginx.conf
RUN chown -R www-data:www-data /var/lib/nginx
RUN apt-get install -y php
RUN apt-get remove -y apache2

COPY /vol /var/www/html

# VOLUME ["/data", "/etc/nginx/site-enabled", "/var/log/nginx"]

WORKDIR /etc/nginx

CMD ["nginx"]

EXPOSE 80
EXPOSE 443
