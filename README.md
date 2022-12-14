# WeatherApp

Just check the Weather


## Installation

Clone my repo from github

```bash
git clone git@github.com:TheBlackJJoker/weatherApp.git
```
Start docker containers
```bash
docker-compose up -d
```

Copy .env.example to .env
```bash
cp .env.example .env
```

Go into php container and install dependencies and artisan generate key
```bash
docker exec -it "php" /bin/bash
```
```bash
composer install
```
```bash
php artisan key:generate
```
```bash
php artisan storage:link
```
If you have problem with Storage permission
```bash
sudo chgrp -R www-data storage
```
```bash
sudo chmod -R ug+rwx storage 
```

## Usage/Examples

Web Server
```bash
localhost:8080
```

Artisan command check weather
```bash
docker exec -it "php" /bin/bash
```
```bash
php artisan weather:get
```
or
```bash
php artisan weather:get {city}
```
API
```bash
localhost:8080/api/weather/get/{city}
```

**Blumilk CodeStyle**<br>
Go to php container
```bash
docker exec -it "php" /bin/bash
```
Check codestyle
```bash
composer cs
```
Fix codestyle
```bash
composer csf
```

