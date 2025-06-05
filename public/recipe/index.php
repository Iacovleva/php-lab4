<?php

declare(strict_types=1);

$file = __DIR__ . '/../../storage/recipes.txt';

if (!file_exists($file)) {
    echo "<p>Рецептов пока нет.</p>";
    exit;
}

$lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$recipes = array_map('json_decode', $lines);

// Пагинация
$perPage = 5;
$total = count($recipes);
$page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
$start = ($page - 1) * $perPage;
$visible = array_slice($recipes, $start, $perPage);

// Вывод
echo "<h1>Все рецепты</h1>";

foreach ($visible as $recipe) {
    echo "<div style='border:1px solid #ccc; padding:10px; margin:10px 0;'>";
    echo "<h2>" . htmlspecialchars($recipe->title) . "</h2>";
    echo "<p><strong>Категория:</strong> " . htmlspecialchars($recipe->category) . "</p>";
    echo "<p><strong>Описание:</strong><br>" . nl2br(htmlspecialchars($recipe->description)) . "</p>";
    echo "</div>";
}

// Навигация
$totalPages = ceil($total / $perPage);
echo "<div style='margin-top:20px;'>";
for ($i = 1; $i <= $totalPages; $i++) {
    echo "<a href='?page=$i' style='margin-right: 10px;'>Страница $i</a>";
}
echo "</div>";
