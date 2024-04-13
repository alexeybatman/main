<?php

session_start();

// Определите значение константы "DIR" - путь к корневой директории проекта


// Простой способ сделать глобально доступным подключение в БД
function pdo(): PDO
{
    static $pdo;

    if (!$pdo) {
        $config = include __DIR__.'/config.php';
        // Подключение к БД
        $dsn = 'mysql:dbname='.$config['db_name'].';host='.$config['db_host'];
        try {
            $pdo = new PDO($dsn, $config['db_user'], $config['db_pass']);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Ошибка подключения к базе данных: " . $e->getMessage();
        }
    }

    return $pdo;
}

pdo();