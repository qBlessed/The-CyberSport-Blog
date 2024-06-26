<?php


include "./../../database/databases.php";
include "./../../../path.php";

$errMsg = '';


//Код для реєстрації користувачана
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $admin = 0;
    $password = trim($_POST['password']);
    $password2 = trim($_POST['pass-second']);

    // Создаем экземпляр класса Users
    $users = new Users($_POST);

    // Проверяем валидацию данных
    if (!empty($users->validation())) {
        $errMsg = $users->validation();
        header('location:http://mycyber/reg.php?errMsg=' . $errMsg);
    } else {
        $errMsg = $users->save();

        // Проверяем наличие ошибок при сохранении пользователя
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

        $existence = selectOne('users', ['email' => $email]);
        if ($existence !== false && $existence['email'] === $email) {
            $this->errMsg = "Юзер з такою поштую зареєстрований";
            return $this->errMsg;
        }

        $existencename = selectOne('users', ['username' => $name]);
        if ($existencename !== false && $existencename['username'] === $name) {
            $this->errMsg = "Такий логін занятий";
            return $this->errMsg;
        }

        $password = password_hash($password, PASSWORD_DEFAULT);
        $post = [
            'admin' => 0,
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
            $this->errMsg = "Поля пусті";
        } elseif (mb_strlen($name, 'utf8') < 2) {
            $this->errMsg = "Логін  повинен містити більше 2-х ";
        } elseif ($password !== $password2) {
            $this->errMsg = "Паролі не збігаються";
        }
        return $this->errMsg;
    }
}



