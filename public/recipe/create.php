<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавление рецепта</title>
</head>
<body>
    <h1>Добавить рецепт</h1>
    <form method="post" action="../../src/handlers/handle_recipe.php">
        <label>Название:<br><input type="text" name="title" required></label><br><br>
        <label>Категория:<br>
            <select name="category">
                <option value="Завтрак">Завтрак</option>
                <option value="Обед">Обед</option>
                <option value="Ужин">Ужин</option>
            </select>
        </label><br><br>
        <label>Ингредиенты:<br><textarea name="ingredients" required></textarea></label><br><br>
        <label>Описание:<br><textarea name="description" required></textarea></label><br><br>
        <label>Теги:<br>
            <select name="tags[]" multiple>
                <option value="вегетарианское">Вегетарианское</option>
                <option value="быстро">Быстро</option>
            </select>
        </label><br><br>
        <label>Шаги приготовления:<br><textarea name="steps"></textarea></label><br><br>
        <button type="submit">Отправить</button>
    </form>
</body>
</html>
