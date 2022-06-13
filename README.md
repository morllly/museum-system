# Дипломный проект бакалавриата "Электронный бизнес"

### Развертывание веб-приложения с помощью laradock
###
Зайдите в папку, где будет храниться проект, и клонируйте репозиторий.
```
git clone https://github.com/morllly/museum.git
```
В корень проекта клонируйте репозиторий laradock.
>Laradock - это полная среда разработки Laravel на Docker.
```
git submodule add https://github.com/LaraDock/laradock.git laradock
```
Войдите в папку laradock и скопируйте `.env.example` в `.env`.
```
cp .env.example .env
```
Запустите контейнеры.
```
docker-compose up -d nginx mysql
```
Войдите в контейнер рабочей области.
```
docker-compose exec workspace bash
```
Установите `composer` и `npm`.
```
composer install
npm install
```
