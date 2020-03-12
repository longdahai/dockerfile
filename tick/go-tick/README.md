# Timed call Http request
Use the ticker to periodically initiate http requests
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
    image: longdahai/ticker:go
    restart: always
    environment:
      MSEC: 1000
      URL: http://baidu.com
    volumes:
      - "/etc/localtime:/etc/localtime"
      - "/etc/timezone:/etc/timezone"
```