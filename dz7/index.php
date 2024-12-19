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
    $username = $_POST['username'];
    $work_type = $_POST['work_type'];
    
    
    
    $stmt = $conn->prepare("INSERT INTO std_works (user, work_type, action_date) VALUES (?, ?, NOW())");
    $stmt->bind_param("si", $username, $work_type);
    $stmt->execute();
    $stmt->close();
}


$works = $conn->query("SELECT * FROM std_works");
$worktypes = $conn->query("SELECT * FROM std_workslist");
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Работа с данными</title>
</head>
<body>
    <h1>Добавить запись</h1>
    <form action="" method="post">
        <label for="username">Имя:</label>
        <input type="text" name="username" required><br><br>

        <label for="work_type">Тип работы:</label>
        <select name="work_type" required>
            <?php while ($row = $worktypes->fetch_assoc()): ?>
                <option value="<?= $row['id'] ?>"><?= $row['worktype'] ?></option>
            <?php endwhile; ?>
        </select><br><br>

        <input type="submit" value="Добавить">
    </form>

    <h2>Список работ</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Имя</th>
            <th>Тип работы</th>
            <th>Дата действия</th>
            <th>Действия</th>
        </tr>
        <?php while ($row = $works->fetch_assoc()): ?>
            <tr data-id="<?= $row['id'] ?>">
                <td><?= $row['id'] ?></td>
                <td class="user"><?= htmlspecialchars($row['user']) ?></td>
                <td class="work_type"><?= $row['work_type'] ?></td>
                <td><?= $row['action_date'] ?></td>
                <td><button class="edit">Редактировать</button></td>
            </tr>
        <?php endwhile; ?>
    </table>

    <script>
        document.querySelectorAll('.edit').forEach(button => {
            button.addEventListener('click', function() {
                const row = this.closest('tr');
                const userCell = row.querySelector('.user');
                const workTypeCell = row.querySelector('.work_type');
                
                const userInput = document.createElement('input');
                userInput.value = userCell.textContent;
                
                const select = document.createElement('select');
                
                const workTypes = <?= json_encode($worktypes->fetch_all(MYSQLI_ASSOC)) ?>;
                workTypes.forEach(type => {                    const option = document.createElement('option');
                    option.value = type.id;
                    option.textContent = type.worktype;
                    if (type.id == workTypeCell.textContent) {
                        option.selected = true;
                    }
                    select.appendChild(option);
                });
                
                userCell.innerHTML = '';
                userCell.appendChild(userInput);
                
                workTypeCell.innerHTML = '';
                workTypeCell.appendChild(select);
                
                this.textContent = 'Сохранить';
                this.classList.remove('edit');
                this.classList.add('save');
                
                this.addEventListener('click', function() {
                    const id = row.dataset.id;
                    const username = userInput.value;
                    const workTypeId = select.value;

                    fetch('update.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: id=${id}&username=${username}&work_type=${workTypeId},
                    }).then(response => response.text()).then(data => {
                        location.reload();
                    });
                });
            });
        });
    </script>
</body>
</html>

<?php
$conn->close();
?>

