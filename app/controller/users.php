<?php

include "./../database/databases.php";
include "./../../path.php";

$errMsg = '';

//Код для реєстрації користувача
if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $admin = isset($_POST['admin']) ? 1 : 0; // Встановлюємо 1, якщо вибрана опція "admin", інакше 0
    $password = trim($_POST['password']);
    $password2 = trim($_POST['pass-second']);

    // Створюємо екземпляр класу Users
    $users = new Users($_POST);

    // Перевіряємо валідацію даних
    if (!empty($users->validation())) {
        $errMsg = $users->validation();
        header('location:http://mycyber/reg.php?errMsg=' . $errMsg);
    } else {
        $errMsg = $users->save();

        // Перевіряємо наявність помилок при збереженні користувача
        if (!empty($errMsg)) {
            header('location:http://mycyber/reg.php?errMsg=' . $errMsg);
        }
    }
} else {
    $name = '';
    $email = '';
}

// $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

class Users
{
    public $post;
    public $errMsg = '';

    public function __construct($post)
    {
        $this->post = $post;
    }

    public function save()
    {
        $name = trim($this->post['name']);
        $email = trim($this->post['email']);
        $password = trim($this->post['password']);
        $password2 = trim($this->post['pass-second']);
        $admin = isset($this->post['admin']) ? 1 : 0; // Встановлюємо 1, якщо вибрана опція "admin", інакше 0

        $existence = selectOne('users', ['email' => $email]);
        if ($existence !== false && $existence['email'] === $email) {
            $this->errMsg = "Користувач з такою поштою вже зареєстрований";
            return $this->errMsg;
        }

        $existencename = selectOne('users', ['username' => $name]);
        if ($existencename !== false && $existencename['username'] === $name) {
            $this->errMsg = "Такий логін вже зайнятий";
            return $this->errMsg;
        }

        $password = password_hash($password, PASSWORD_DEFAULT);
        $post = [
            'admin' => $admin,
            'username' => $name,
            'password' => $password,
            'email' => $email,
        ];

        $id = insert('users', $post);
        $user = selectOne('users', ['id' => $id]);

        $_SESSION['id'] = $user['id'];
        $_SESSION['name'] = $user['username'];
        $_SESSION['admin'] = $user['admin'];
        header('location:' . BASE_URL);
    }

    public function validation()
    {
        $name = trim($this->post['name']);
        $email = trim($this->post['email']);
        $password = trim($this->post['password']);
        $password2 = trim($this->post['pass-second']);

        if ($name === '' || $email === '' || $password === '') {
            $this->errMsg = "Поля не можуть бути порожніми";
        } elseif (mb_strlen($name, 'utf8') < 2) {
            $this->errMsg = "Логін повинен містити не менше 2 символів";
        } elseif ($password !== $password2) {
            $this->errMsg = "Паролі не співпадають";
        }
        return $this->errMsg;
    }
}

?>
