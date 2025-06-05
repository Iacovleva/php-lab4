<?php

declare(strict_types=1);

$data = [
    'title' => $_POST['title'] ?? '',
    'category' => $_POST['category'] ?? '',
    'ingredients' => $_POST['ingredients'] ?? '',
    'description' => $_POST['description'] ?? '',
    'tags' => $_POST['tags'] ?? [],
    'steps' => $_POST['steps'] ?? '',
    'created_at' => date('Y-m-d H:i:s'),
];

// Валидация
if (trim($data['title']) === '' || trim($data['ingredients']) === '' || trim($data['description']) === '') {
    echo "❌ Не заполнены обязательные поля. <a href='../../public/recipe/create.php'>Назад</a>";
    exit;
}

// Сохраняем
$file = __DIR__ . '/../../storage/recipes.txt';
file_put_contents($file, json_encode($data, JSON_UNESCAPED_UNICODE) . PHP_EOL, FILE_APPEND);

echo "✅ Рецепт успешно сохранён! <a href='../../public/index.php'>На главную</a>";
