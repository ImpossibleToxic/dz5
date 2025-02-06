<?php
// Проверяем, был ли запрос методом POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Получаем имя файла из данных формы
    $filename = $_POST['filename'];
    // Получаем ширину нового изображения и преобразуем ее в целое число
    $newWidth = intval($_POST['width']);
    // Получаем информацию о загружаемом файле
    $uploadedFile = $_FILES['file'];

    // Проверяем, нет ли ошибок при загрузке файла и является ли файл изображением JPEG
    if ($uploadedFile['error'] == UPLOAD_ERR_OK && $uploadedFile['type'] == 'image/jpeg') {
        
        // Получаем временный путь к загруженному файлу
        $sourcePath = $uploadedFile['tmp_name'];
        
        // Создаем изображение из загруженного JPEG-файла
        $sourceImage = imagecreatefromjpeg($sourcePath);
        
        // Получаем размеры оригинального изображения
        list($originalWidth, $originalHeight) = getimagesize($sourcePath);
        
        // Вычисляем новую высоту, сохраняя пропорции
        $newHeight = ($originalHeight / $originalWidth) * $newWidth;

        // Создаем новое пустое изображение с заданными шириной и высотой
        $newImage = imagecreatetruecolor($newWidth, $newHeight);
        
        // Копируем и изменяем размер оригинального изображения в новое изображение
        imagecopyresampled($newImage, $sourceImage, 0, 0, 0, 0, $newWidth, $newHeight, $originalWidth, $originalHeight);

        // Формируем новое имя файла с расширением .jpg
        $newFileName = $filename . '.jpg';
        // Сохраняем новое изображение в папку uploads с новым именем файла
        imagejpeg($newImage, 'uploads/' . $newFileName);

        // Освобождаем память, занятую оригинальным и новым изображениями
        imagedestroy($sourceImage);
        imagedestroy($newImage);

        // Выводим сообщение об успешной загрузке с ссылкой на новое изображение
        echo "Файл успешно загружен и изменен: <a href='uploads/$newFileName'>$newFileName</a>";
    } else {
        // Если произошла ошибка при загрузке файла, выводим сообщение об ошибке
        echo "Ошибка загрузки файла.";
    }
} else {
    // Если запрос не был методом POST, выводим сообщение о некорректном запросе
    echo "Некорректный запрос.";
}
?>
