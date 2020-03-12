package main

import (
	"net/http"
	"os"
	"strconv"
	"time"
)

func main() {
	msec, _ := strconv.Atoi(os.Getenv("MSEC"))
	url := os.Getenv("URL")

	ticker := time.NewTicker(time.Duration(msec) * time.Millisecond)
	for _ = range ticker.C {
		go func() {
			http.Head(url)
		}()

	}

	ticker.Stop()
}
