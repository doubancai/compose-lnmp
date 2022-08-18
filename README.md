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

## Redis62

1.拷贝容器内配置文件到宿主机

```bash
mkdir ./services/redis62/
```

2.从GitHub下载对应版本的包,解压后将 redis.conf 拷贝到./services/redis/

```bash
wget -P /tmp https://github.com/redis/redis/archive/refs/tags/6.2.7.zip
unzip /tmp/6.2.7.zip -d /tmp
cp /tmp/redis-6.2.7/redis.conf ./services/redis62/
rm -rf /tmp/6.2.7.zip /tmp/redis-6.2.7
```

3.启动容器

```bash
docker-compose up
```

4.浏览器中访问

127.0.0.1

## Redis70

1.拷贝容器内配置文件到宿主机

```bash
mkdir ./services/redis70/
```

2.从GitHub下载对应版本的包,解压后将 redis.conf 拷贝到./services/redis/

```bash
wget -P /tmp https://github.com/redis/redis/archive/refs/tags/7.0.4.zip
unzip /tmp/7.0.4.zip -d /tmp
cp /tmp/redis-7.0.4/redis.conf ./services/redis70/
rm -rf /tmp/7.0.4.zip /tmp/redis-7.0.4
```

3.启动容器

```bash
docker-compose up
```

4.浏览器中访问

127.0.0.1

## MongoDB50

1.拷贝容器内配置文件到宿主机

```bash
docker run -it --rm --name temp-mongo mongo:5.0.10 /bin/bash
mkdir ./services/mongo50/
docker cp temp-mongo:/etc/mongod.conf.orig ./services/mongo50/
```

2.启动容器

```bash
docker-compose up
```

3.浏览器中访问

127.0.0.1

4.设置密码

报错 The SCRAM_SHA_1 authentication mechanism requires libmongoc built with ENABLE_SSL

需要php安装ssl

报错Uncaught PHP Exception MongoDB\Driver\Exception\AuthenticationException: “Authentication failed.”

需要将data/mongo目录清空重启mongo容器



