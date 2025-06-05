<?php

declare(strict_types=1);

$file = __DIR__ . '/../storage/recipes.txt';

if (!file_exists($file)) {
    echo "<p>Рецептов пока нет.</p>";
    exit;
}

$lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$recipes = array_map('json_decode', $lines);

// Получаем последние 2
$latest = array_slice($recipes, -2);

echo "<h1>Последние рецепты</h1>";

foreach ($latest as $recipe) {
    echo "<div style='border:1px solid #ccc; padding:10px; margin:10px 0;'>";
    echo "<h2>" . htmlspecialchars($recipe->title) . "</h2>";
    echo "<p><strong>Категория:</strong> " . htmlspecialchars($recipe->category) . "</p>";
    echo "<p><strong>Описание:</strong><br>" . nl2br(htmlspecialchars($recipe->description)) . "</p>";
    echo "</div>";
}
