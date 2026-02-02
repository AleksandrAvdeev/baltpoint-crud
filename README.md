## Установка Docker Desktop
- Установить `Docker Desktop` с официального источника (https://www.docker.com/products/docker-desktop). Это установит все необходимые docker-инструменты и позволит удобно управлять контейнерами на устройстве.
- Клонировать репозиторий проекта в любую удобную папку
```
git clone git@github.com:AleksandrAvdeev/baltpoint-crud.git
```
- Далее в папке с проектом начать инициализацию docker-контейнеров с помощью команды
```
docker-compose up -d --build
```
- При ошибке поднятия контейнеров при занятости порта 80 может помочь команда по остановке сервера Apache, который в Linux чаще всего его занимает
```
sudo systemctl stop apache2
```
Доступ к ресурсу появится по адресу
```
http://localhost:80
```

## Разворачивание проекта
- Из папки с проектом выполнить копирование env-файла
```
cp .env.example .env
```
- Установить композер
```
docker-compose exec app composer install
```
- Выполнить миграцию базы данных
```
docker-compose exec app php artisan migrate
```
- Засидировать базу данных
```
docker-compose exec app php artisan db:seed
```