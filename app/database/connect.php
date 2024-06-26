<?php

$host = 'localhost';
$db_name = 'dinamic';
$db_user = 'root';
$charset = 'utf8';

$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$db_name;charset=$charset",
        $db_user
    );
} catch (PDOException $i) {
    die("Ошибка подключения к базе данных: " . $i->getMessage());
}

