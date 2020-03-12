# 定时调用Http请求
使用go ticker 定时发起http请求
http阻塞不影响触发时间

# 环境变量
- MSEC: 时间间隔毫秒
- URL: 打开url

# docker compose 示例
``` yml
version: "3"

services:
  ticker:
    container_name: ticker
    image: longdahai/ticker:go
    restart: always
    environment:
      MSEC: 1000
      URL: http://baidu.com
    volumes:
      - "/etc/localtime:/etc/localtime"
      - "/etc/timezone:/etc/timezone"
```