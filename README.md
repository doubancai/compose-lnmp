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



