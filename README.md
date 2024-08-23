<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Laravel Lead Management System

## Описание

Этот проект представляет собой систему управления лидами, разработанную на Laravel. Система включает регистрацию, авторизацию, подтверждение почты и возможность работы с лидами.

## Требования

- PHP 8.0 или выше
- Composer
- MySQL или другая поддерживаемая СУБД
- Почтовый сервер (можно использовать бесплатные SMTP-сервисы, например, Mailtrap, Gmail)

## Установка

1. **Клонируйте репозиторий:**

    ```bash
    git clone <URL репозитория>
    cd <папка проекта>
    ```

2. **Установите зависимости Composer:**

    ```bash
    composer install
    ```

3. **Создайте файл .env:**

   Скопируйте файл `.env.example` в `.env` и отредактируйте его:

    ```bash
    cp .env.example .env
    ```

   В файле `.env` настройте параметры подключения к базе данных и SMTP серверу. Например:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database
    DB_USERNAME=your_username
    DB_PASSWORD=your_password

    MAIL_MAILER=smtp
    MAIL_HOST=smtp.mailtrap.io
    MAIL_PORT=2525
    MAIL_USERNAME=your_mailtrap_username
    MAIL_PASSWORD=your_mailtrap_password
    MAIL_ENCRYPTION=null
    MAIL_FROM_ADDRESS=no-reply@example.com
    MAIL_FROM_NAME="${APP_NAME}"
    ```

4. **Создайте и примените миграции базы данных:**

    ```bash
    php artisan migrate
    ```

5. **Сделайте начальные сиды (если есть):**

    ```bash
    php artisan db:seed
    ```

6. **Запустите локальный сервер:**

    ```bash
    php artisan serve
    ```

7. **Откройте приложение в браузере:**

   Перейдите по адресу [http://localhost:8000](http://localhost:8000) для проверки работы приложения.

## Функционал

- **Регистрация и авторизация:** Пользователи могут регистрироваться, входить в систему и выходить из нее. Подтверждение регистрации приходит на почту.
- **Форма обращения:** Доступна для неавторизованных пользователей. Поля: Имя, Фамилия, Номер телефона, E-mail, Текст обращения.
- **Страница профиля:** Для авторизованных пользователей. Показывает список лидов с возможностью редактирования статуса, удаления и редактирования данных лида.
- **Статусы лидов:** Новый, В работе, Завершен.

## Документация

- **Структура проекта:** Обратите внимание на модели `Lead`, `Status`, `User`.
- **Маршруты:** Смотрите файл `routes/web.php` для понимания доступных маршрутов.
- **Контроллеры:** Основные контроллеры находятся в `app/Http/Controllers`. Контроллеры обрабатывают запросы для работы с лидами и пользователями.
- **Шаблоны:** Шаблоны находятся в `resources/views`.

## Примечания

- Убедитесь, что все конфигурации и переменные окружения правильно настроены.
- Проверьте работу системы почты, чтобы убедиться, что пользователи получают подтверждения на почту.

## Ссылки

- [Laravel Documentation](https://laravel.com/docs)
- [Mailtrap SMTP Testing](https://mailtrap.io)

