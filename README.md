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

## OpenResty121

1.拷贝容器内配置文件到宿主机

```bash
docker run -it --rm --name temp-openresty openresty/openresty:1.21.4.1-3-focal /bin/bash
mkdir -p ./services/openresty121
docker cp temp-openresty:/usr/local/openresty/nginx/conf/nginx.conf ./services/openresty121/
docker cp temp-openresty:/etc/nginx/conf.d/ ./services/openresty121/conf.d/
```

2.启动容器

```bash
docker-compose up
```

3.浏览器中访问

127.0.0.1:8080

## Redis Cluster

批量生成配置文件

```bash
bash redis-cluster-config.sh
```

启动容器

```bash
docker-compose up
```

进入容器

```bash
docker exec -it compose-lnmp-redis-cluster-1 /bin/bash
```

初始化集群(三主零副本)

```bash
redis-cli -p 7001 -a auth123 --cluster create 192.168.1.222:7001 192.168.1.222:7002 192.168.1.222:7003 --cluster-replicas 0

# 输出
>>> Performing hash slots allocation on 3 nodes...
Master[0] -> Slots 0 - 5460
Master[1] -> Slots 5461 - 10922
Master[2] -> Slots 10923 - 16383
M: 31de756725d1b191c53b983b39b15e117c5f4c93 192.168.1.222:7001
   slots:[0-5460] (5461 slots) master
M: 49470ddb375c4361423a80d55a711a422a223bfc 192.168.1.222:7002
   slots:[5461-10922] (5462 slots) master
M: 3809b2e1ceaa6451a511b35c4aba05957babf330 192.168.1.222:7003
   slots:[10923-16383] (5461 slots) master
Can I set the above configuration? (type 'yes' to accept): yes
>>> Nodes configuration updated
>>> Assign a different config epoch to each node
>>> Sending CLUSTER MEET messages to join the cluster
Waiting for the cluster to join
...
>>> Performing Cluster Check (using node 192.168.1.222:7001)
M: 31de756725d1b191c53b983b39b15e117c5f4c93 192.168.1.222:7001
   slots:[0-5460] (5461 slots) master
M: 3809b2e1ceaa6451a511b35c4aba05957babf330 192.168.1.222:7003
   slots:[10923-16383] (5461 slots) master
M: 49470ddb375c4361423a80d55a711a422a223bfc 192.168.1.222:7002
   slots:[5461-10922] (5462 slots) master
[OK] All nodes agree about slots configuration.
>>> Check for open slots...
>>> Check slots coverage...
[OK] All 16384 slots covered.
```

进入redis

```bash
redis-cli -c  -p 7001 -a auth123
```

查看节点

```bash
127.0.0.1:7001> cluster nodes
de4ffd1d949c11c0178c508defa604398927e133 192.168.1.222:7004@17004 slave 3e7f37caba391ab13696f042299fee2bab0ce3e0 0 1660791650000 2 connected
d1c6a6b929588e5e8cfbc93dbc50e750d2393ac9 192.168.1.222:7006@17006 slave c591e58ef2cf313f316383d810b16d222db16525 0 1660791648407 1 connected
c591e58ef2cf313f316383d810b16d222db16525 192.168.1.222:7001@17001 myself,master - 0 1660791649000 1 connected 0-5460
0a1ba1911141b6311edbb89b8091e4b321971d8d 192.168.1.222:7003@17003 master - 0 1660791649000 3 connected 10923-16383
2fa8912cfd335b7952f37b3898c56e77d3f653d1 192.168.1.222:7005@17005 slave 0a1ba1911141b6311edbb89b8091e4b321971d8d 0 1660791649449 3 connected
3e7f37caba391ab13696f042299fee2bab0ce3e0 192.168.1.222:7002@17002 master - 0 1660791650467 2 connected 5461-10922
```

连接测试，浏览器中访问

127.0.0.1



