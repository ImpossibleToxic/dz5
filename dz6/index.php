<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Загрузка изображения</title>
</head>
<body>
    <h1>Загрузка изображения</h1>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="filename">Имя файла (без расширения):</label>
        <input type="text" name="filename" required><br><br>

        <label for="width">Ширина нового файла (в пикселях):</label>
        <input type="number" name="width" required><br><br>

        <label for="file">Выберите файл:</label>
        <input type="file" name="file" accept=".jpg" required><br><br>

        <input type="submit" value="Загрузить">
    </form>
</body>
</html>
