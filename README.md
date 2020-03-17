
## COMP1640 - Laravel Project

## Requirements

- [Laravel 6.x](https://laravel.com/docs/6.0#server-requirements)
- [Docker >= 18.06.1-ce](https://docs.docker.com/install)
- [Docker-compose >= 1.22.0](https://docs.docker.com/compose/install)
- [PHP >= 7.2.18](https://www.php.net/downloads.php)
- [Mysql >= 5.7](https://dev.mysql.com/downloads/installer/)
- [Nginx > = nginx/1.15.7](https://www.nginx.com/resources/wiki/start/topic/tutorials/install/)
- [Redis >= 4.0.11](https://redis.io/topics/quickstart)
- [Node >= v8.11.3](https://nodejs.org/en/download/)
- [Yarn >= 1.7.0](https://yarnpkg.com/en/docs/install#debian-stable)

## Setup

- Copy file `.env.example` to `.env`,

- Install or run Docker
```BASH
docker-compose up -d
# Stop
docker-compose stop
```

- Site will publish on 127.0.0.1:{`ports`} (`ports` config in docker-compose.yml > services > ngix > ports). Add domain to host file so we can access site by domain:{`ports`} (edit host in file ./ect/hosts)

```
127.0.0.1 comp1640php.local
```
- Asset project with domain

```
comp1640php.local:8008 or localhost:8008 or 127.0.0.1:8008
```

- `chmod` cache folders
```BASH
chmod -R 777 storage
chmod -R 777 bootstrap/cache
```

### Installation

- Go into the `workspace` container

```BASH
docker exec -it comp1640php_workspace bash
```

```BASH
composer install
php artisan key:generate
```
- Copy APP_KEY from .env.testing to .env

- Run migration

```BASH
# Check Docker Container list, copy the `workspace` container name
docker ps
# Go into the `workspace` container
docker exec -it comp1640php_workspace bash
# Run migration
php artisan migrate --seed
# Or running outside the docker container
docker exec -it comp1640php_workspace php artisan migrate --seed
```

- If you want run project on your local instead of Docker, just skip all step about docker and create virtual host. And modify `.env` config of `DB_HOST`, `DB_HOST_TEST`, `REDIS_HOST` to `127.0.0.1`

Run the development PHP Built-in server.

> After running docker, Application run in port 8008. Visit http://localhost:8008/
