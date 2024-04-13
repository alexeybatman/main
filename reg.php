<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    $mail = $_POST['mail'];
    $tel = $_POST['tel'];

    // Проверка наличия номера телефона в базе данных
    $stmt_check = pdo()->prepare("SELECT COUNT(*) FROM users WHERE tel = :tel");
    $stmt_check->bindParam(':tel', $tel);
    $stmt_check->execute();
    $tel_count = $stmt_check->fetchColumn();

    if ($tel_count > 0) {
        echo 'Phone number already exists in the database';
    } else {
        // Подготовка запроса
        $stmt = pdo()->prepare("INSERT INTO users (name, pass, mail, tel) VALUES (:name, :pass, :mail, :tel)");

        // Привязка параметров
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':pass', $pass);
        $stmt->bindParam(':mail', $mail);
        $stmt->bindParam(':tel', $tel);

        // Выполнение запроса
        if ($stmt->execute()) {
            echo 'User registered successfully';
        } else {
            echo 'Error registering user';
        }
    }
}
?>
