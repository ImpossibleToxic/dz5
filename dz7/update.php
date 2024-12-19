<?php
$host = 'localhost';
$db = 'database_std';
$user = 'root';
$pass = 'root';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']);
    $username = $_POST['username'];
    $work_type = intval($_POST['work_type']);
    
    
    $stmt = $conn->prepare("UPDATE std_works SET user=?, work_type=? WHERE id=?");
    $stmt->bind_param("sii", $username, $work_type, $id);
    $stmt->execute();
    $stmt->close();
}

$conn->close();
?>
