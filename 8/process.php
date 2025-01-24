<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $specialty = $_POST['specialty'];
    $experience = $_POST['experience'];

    // Запись данных в файл
    $dataLine = "$name,$email,$age,$specialty,$experience\n";
    file_put_contents('data.txt', $dataLine, FILE_APPEND);
}
?>
