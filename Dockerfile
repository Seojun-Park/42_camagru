FROM ubuntu:20.04
MAINTAINER Jin Park <jinchul112@gmail.com>

RUN apt-get update
RUN apt-get install -y wget && apt-get install -y nginx && apt-get remove -y apache2
RUN apt-get install -y net-tools iputils-ping
RUN apt-get install openssl
RUN apt-get install -y mariadb-server mariadb-client
# RUN apt-get install -y mysql-server && mysql_secure_installation
RUN apt-get install -y php7.4 php7.4-fpm php7.4-mysql php-common php7.4-cli php7.4-common php7.4-json php7.4-opcache php7.4-readline
RUN apt-get install -y php-mbstring php-zip php-gd
RUN apt-get install -y php-curl php-gd php-intl php-mbstring php-soap php-xml php-xmlrpc php-zip
RUN apt-get install -y vim && apt-get install -y git

COPY srcs/ /var/www/localhost
COPY docker/setup.sh ./
COPY docker/config.inc.php ./
COPY docker/default ./

CMD bash /setup.sh

EXPOSE 80
EXPOSE 443
