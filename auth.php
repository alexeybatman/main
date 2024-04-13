<?php

include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tel = $_POST['tel'];
    $pass = $_POST['pass'];

    // Поиск пользователя по номеру телефона и паролю
    $stmt = pdo()->prepare("SELECT * FROM users WHERE tel = :tel AND pass = :pass");
    $stmt->bindParam(':tel', $tel);
    $stmt->bindParam(':pass', $pass);
    $stmt->execute();
    $user = $stmt->fetch();

    if ($user) {
        echo 'User authenticated successfully';
        // Здесь можно выполнить дополнительные действия после успешной авторизации
    } else {
        echo 'Invalid phone number or password';
    }
}

?>