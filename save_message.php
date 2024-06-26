<?php
// Перевірка, чи була відправлена форма методом POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Отримуємо дані з форми
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';

    // Якщо є дані для збереження
    if (!empty($email) && !empty($message)) {
        // Перевірка наявності директорії для збереження повідомлень
        $messagesDirectory = 'messages/';
        if (!file_exists($messagesDirectory)) {
            mkdir($messagesDirectory, 0777, true); // Створюємо директорію, якщо її немає
        }

        // Генеруємо унікальне ім'я файлу для збереження повідомлення
        $fileName = $messagesDirectory . uniqid('message_', true) . '.txt';

        // Зберігаємо дані у текстовий файл
        $data = "Email: $email\nMessage:\n$message\n";
        if (file_put_contents($fileName, $data, FILE_APPEND | LOCK_EX) !== false) {
            // Повідомлення успішно збережене, перенаправлення на головню сторінку
            header("Location: index.php");
            exit(); // Завершуємо виконання скрипту після перенаправлення
        } else {
            echo 'Помилка при збереженні повідомлення.';
        }
    } else {
        echo 'Будь ласка, заповніть всі поля форми.';
    }
} else {
    echo 'Дозволено тільки метод POST.';
}
?>
