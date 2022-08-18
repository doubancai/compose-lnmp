# compose-lnmp

## Nginx

1.拷贝容器内配置文件到宿主机

```bash
docker run -it --rm --name temp-nginx nginx:1.22.0 /bin/bash
mkdir -p ./services/nginx
docker cp temp-nginx:/etc/nginx/nginx.conf ./services/nginx/
docker cp temp-nginx:/etc/nginx/conf.d/ ./services/nginx/conf.d/
```

2.启动容器

```bash
docker-compose up
```

3.浏览器中访问

127.0.0.1

## PHP74

1.拷贝容器内配置文件到宿主机

```bash
docker run -it --rm --name temp-php php:7.4.30-fpm-bullseye /bin/bash
mkdir ./services/php74
docker cp temp-php:/usr/local/etc/php-fpm.conf ./services/php74/php-fpm.conf
docker cp temp-php:/usr/local/etc/php/php.ini-development ./services/php74/
docker cp temp-php:/usr/local/etc/php/php.ini-production ./services/php74/
cp services/php74/php.ini-development services/php74/php.ini
```

2.启动容器

```bash
docker-compose up
```

3.浏览器中访问

127.0.0.1

## PHP81

1.拷贝容器内配置文件到宿主机

```bash
docker run -it --rm --name temp-php php:8.1.9-fpm-bullseye /bin/bash
mkdir ./services/php81
docker cp temp-php:/usr/local/etc/php-fpm.conf ./services/php81/php-fpm.conf
docker cp temp-php:/usr/local/etc/php/php.ini-development ./services/php81/
docker cp temp-php:/usr/local/etc/php/php.ini-production ./services/php81/
cp services/php81/php.ini-development services/php81/php.ini
```

2.启动容器

```bash
docker-compose up
```

3.浏览器中访问

127.0.0.1

## MySQL80

1.拷贝容器内配置文件到宿主机

```bash
docker run -itd --rm --name temp-mysql -e MYSQL_ROOT_PASSWORD=root mysql:8.0.30
# 进入容器
# docker exec -it temp-mysql /bin/bash
mkdir ./services/mysql80/
docker cp temp-mysql:/etc/my.cnf ./services/mysql80/
docker stop temp-mysql
```

2.启动容器

```bash
docker-compose up
```

3.浏览器中访问

127.0.0.1



