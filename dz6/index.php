<!DOCTYPE html>
<html lang="ru"> <!-- Указывает, что документ является HTML5 и что язык документа - русский. -->
<head>
    <meta charset="UTF-8"> <!-- Устанавливает кодировку символов для документа на UTF-8. -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Обеспечивает корректное отображение на мобильных устройствах. -->
    <title>Загрузка изображения</title> <!-- Заголовок страницы, который отображается на вкладке браузера. -->
</head>
<body>
    <h1>Загрузка изображения</h1> <!-- Заголовок первого уровня, который отображается на странице. -->
    <form action="upload.php" method="post" enctype="multipart/form-data"> <!-- Начало формы. Данные будут отправлены на upload.php методом POST, и разрешена загрузка файлов. -->
        <label for="filename">Имя файла (без расширения):</label> <!-- Подпись для поля ввода имени файла. -->
        <input type="text" name="filename" required> <!-- Поле ввода текста для имени файла. Атрибут required делает его обязательным для заполнения. -->
        <br><br> <!-- Перенос строки с дополнительным пространством. -->

        <label for="width">Ширина нового файла (в пикселях):</label> <!-- Подпись для поля ввода ширины изображения. -->
        <input type="number" name="width" required> <!-- Поле ввода числа для ширины изображения. Атрибут required делает его обязательным для заполнения. -->
        <br><br> <!-- Перенос строки с дополнительным пространством. -->

        <label for="file">Выберите файл:</label> <!-- Подпись для поля выбора файла. -->
        <input type="file" name="file" accept=".jpg" required> <!-- Поле для загрузки файла, ограниченное только файлами с расширением .jpg. Атрибут required делает его обязательным для заполнения. -->
        <br><br> <!-- Перенос строки с дополнительным пространством. -->

        <input type="submit" value="Загрузить"> <!-- Кнопка отправки формы с текстом "Загрузить". -->
    </form>
</body>
</html>
