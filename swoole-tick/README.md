# Timed call Http request
Initiate http request through swoole tick timing
Http blocking does not affect the trigger time

# Environment
- MSEC: Time interval milliseconds
- URL: Open url

# docker compose example
``` yml
version: "3"

services:
  ticker:
    container_name: ticker
    image: longdahai/ticker:swoole
    restart: always
    environment:
      MSEC: 1000
      URL: http://baidu.com
    volumes:
      - "/etc/localtime:/etc/localtime"
      - "/etc/timezone:/etc/timezone"
```