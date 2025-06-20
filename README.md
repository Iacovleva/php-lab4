# php-lab4

Лабораторная работа №4
Тема: Обработка и валидация форм в PHP
Цель: Освоить работу с HTML-формами, их валидацией, обработкой и хранением данных на сервере.

Структура проекта recipe-book/

recipe-book/
├── public/
│   ├── index.php                      ← вывод последних рецептов
│   └── recipe/
│       ├── create.php                 ← HTML-форма добавления рецепта
│       └── index.php                 ← список всех рецептов + пагинация
├── src/
│   ├── handlers/
│   │   └── handle_recipe.php         ← обработчик формы
│   └── helpers.php                   ← вспомогательные функции
├── storage/
│   └── recipes.txt                   ← хранение рецептов (JSON-построчно)

Реализовано

create.php
Форма с полями: название, категория, ингредиенты, описание, теги, шаги

Метод: POST, действие — handle_recipe.php

handle_recipe.php
Фильтрация и проверка обязательных полей

Сохранение данных в recipes.txt в формате JSON

Отображение сообщений об успехе или ошибке

index.php
Отображение 2 последних рецептов из файла

Преобразование JSON → массив

recipe/index.php
Отображение всех рецептов с пагинацией по 5 на страницу

Используется GET параметр ?page=1, ?page=2, ...

Контрольные вопросы
1. Какие методы HTTP применяются для отправки данных формы?
GET — передаёт данные через URL, используется для поиска, пагинации
POST — передаёт данные "скрыто", используется для отправки формы и изменения данных

2. Что такое валидация данных, и чем она отличается от фильтрации?
Фильтрация — очистка данных от ненужного: trim, strip_tags, htmlspecialchars
Валидация — проверка корректности данных (например, обязательные поля не пусты)

3. Какие функции PHP используются для фильтрации данных?
trim() — удаляет пробелы
htmlspecialchars() — предотвращает XSS
filter_var() — фильтрация и валидация (например, email, URL)
