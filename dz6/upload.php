<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $filename = $_POST['filename'];
    $newWidth = intval($_POST['width']);
    $uploadedFile = $_FILES['file'];

    
    if ($uploadedFile['error'] == UPLOAD_ERR_OK && $uploadedFile['type'] == 'image/jpeg') {
        
        $sourcePath = $uploadedFile['tmp_name'];
        
        
        $sourceImage = imagecreatefromjpeg($sourcePath);
        
        
        list($originalWidth, $originalHeight) = getimagesize($sourcePath);
        
        
        $newHeight = ($originalHeight / $originalWidth) * $newWidth;

        
        $newImage = imagecreatetruecolor($newWidth, $newHeight);
        
        
        imagecopyresampled($newImage, $sourceImage, 0, 0, 0, 0, $newWidth, $newHeight, $originalWidth, $originalHeight);

        
        $newFileName = $filename . '.jpg';
        imagejpeg($newImage, 'uploads/' . $newFileName);

        
        imagedestroy($sourceImage);
        imagedestroy($newImage);

        echo "Файл успешно загружен и изменен: <a href='uploads/$newFileName'>$newFileName</a>";
    } else {
        echo "Ошибка загрузки файла.";
    }
} else {
    echo "Некорректный запрос.";
}
?>
