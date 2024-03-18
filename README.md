# API для сокращения ссылок

Это API позволяет пользователям сокращать ссылки и перенаправляться по ним на оригинальные адреса.

## Использование

### 1. Создание сокращенной ссылки

Отправьте POST-запрос на `/api/link` с оригинальным URL в качестве данных. Вы получите ответ в формате JSON с сокращенным URL.

# Пример:
```bash
curl -X POST http://localhost:8000/api/link -d "original_url=https://www.example.com"
````
# Ответ:
```bash
{
  "short_url": "http://localhost:8000/C6eS9l"
}
````
### 2. Перенаправление по сокращенной ссылке
Для перенаправления по оригинальному URL, соответствующему сокращенной ссылке, просто перейдите по /C6eS9l (замените C6eS9l на вашу сокращенную ссылку).

# Пример:
```bash
curl -I http://localhost:8000/C6eS9l
````
# Ответ:
```bash
HTTP/1.1 301 Moved Permanently
Location: https://www.example.com
````

## Требования
## PHP >= 7.4
## Laravel >= 8.0

#### Установка

# 1.Клонируйте репозиторий:
```bash
git clone https://github.com/CherniavskyD/shortlinks.git
````

# 2.Перейдите в директорию проекта:
```bash
cd shortlinks
````

# 3.Установите зависимости:
```bash
composer install
````

# 4.Настройте переменные окружения:
```bash
cp .env.example .env
````

# 5.Сгенерируйте ключ приложения:
```bash
php artisan key:generate
````

# 6.Выполните миграции:
```bash
php artisan migrate
````

# 7.Запустите сервер разработки:
```bash
php artisan serve
````
