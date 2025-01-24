document.getElementById('dataForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Предотвращаем отправку формы

    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const age = document.getElementById('age').value;
    const specialty = document.getElementById('specialty').value;
    const experience = document.getElementById('experience').value;

    // Валидация данных
    if (!name || !email || !age || !specialty || !experience) {
        displayMessage("Пожалуйста, заполните все поля.");
        return;
    }

    if (age < 35) {
        displayMessage("Возраст должен быть более 35 лет.");
        return;
    }

    // Отправка данных через AJAX
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'process.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    
    xhr.onload = function() {
        if (xhr.status === 200) {
            loadData(); // Загружаем данные после успешной отправки
            displayMessage("Данные успешно отправлены!");
        } else {
            displayMessage("Произошла ошибка при отправке данных.");
        }
    };

    xhr.send(name=${encodeURIComponent(name)}&email=${encodeURIComponent(email)}&age=${encodeURIComponent(age)}&specialty=${encodeURIComponent(specialty)}&experience=${encodeURIComponent(experience)});
});
