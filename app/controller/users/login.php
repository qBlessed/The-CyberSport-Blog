<?php
// Код для аутентификации пользователя
include "./../../database/databases.php";
include "./../../../path.php";
session_start();
$errMsg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-log'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);


    if ($email === '' || $password === '') {
        $errMsg = "Не всі поля заповнені!";
    } else {
        $existence = selectOne('users', ['email' => $email]);
        if ($existence && password_verify($password, $existence['password'])) {
            $_SESSION['id'] = $existence['id'];
            $_SESSION['name'] = $existence['username'];
            $_SESSION['admin'] = $existence['admin'];

        if (!empty($_SESSION['admin'])) {
            header('Location: ' . BASE_URL . "/app/admin/posts/index.php");
            } else {
                header('Location: ' . BASE_URL);
            }
            exit();
        }else {
            $errMsg = 'Почта або пароль невірні';
        }
    }

    header('location: ' . BASE_URL .  "/log.php?errMsg=" . $errMsg);
}



