![image](https://github.com/user-attachments/assets/0199643c-816b-4b5f-b049-023f786697c8)
![image](https://github.com/user-attachments/assets/b73d1a89-07ba-4f6a-b2aa-f94a14c32f6f)



Інструкція по запуску Laravel API-проєкту 🚀
Цей проєкт використовує Laravel, Sanctum, MySQL, та PHP 8+.

Клонуйте проєкт
Скопіюйте репозиторій на локальний комп'ютер:

git clone https://github.com/your-repository.git
cd your-repository

Змініть параметри підключення до бази даних у .env:

ini
Копіювати код
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=root
DB_PASSWORD=root


Генеруйте ключ додатка

Копіювати код
php artisan key:generate

Налаштуйте базу даних
Створіть базу в MySQL, якщо її ще немає:


CREATE DATABASE your_database;
Потім виконайте міграції та сівди:

php artisan migrate 


Запустіть сервер

php artisan serve

Laravel буде доступний за адресою:

http://127.0.0.1:8000
