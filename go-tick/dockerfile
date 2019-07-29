FROM golang:alpine

MAINTAINER haiwei.free@gmail.com

RUN sed -i 's/dl-cdn.alpinelinux.org/mirrors.aliyun.com/g' /etc/apk/repositories

ENV MSEC 1000
ENV URL http://www.1heron.com

COPY src /var/www/html/
CMD ["go", "run", "/var/www/html/main.go"]