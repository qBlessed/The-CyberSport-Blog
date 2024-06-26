<?php
session_start();
include "./../../database/databases.php";
include "./../../../path.php";

$errMsg = "";

// Код для регистрации пользователя
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create-user'])) {
    $users = new Users($_POST);
    $errMsg = $users->validation();
    if (empty($errMsg)) {
        $errMsg = $users->save();
        if (empty($errMsg)) {
            header('location:' . BASE_URL . "/app/admin/user/index.php");
            exit();
        } else {
            header('location:' . BASE_URL . "/app/admin/user/create.php?errMsg=" . urlencode($errMsg));
            exit();
        }
    } else {
        header('location:' . BASE_URL . "/app/admin/user/create.php?errMsg=" . urlencode($errMsg));
        exit();
    }
} else {
    $name = '';
    $email = '';
}

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
        $admin = isset($this->post['admin']) ? 1 : 0;

        // Check if email already exists
        $existence = selectOne('users', ['email' => $email]);
        if ($existence !== false && $existence['email'] === $email) {
            $this->errMsg = "User with this email already exists";
            return $this->errMsg;
        }

        // Check if username already exists
        $existencename = selectOne('users', ['username' => $name]);
        if ($existencename !== false && $existencename['username'] === $name) {
            $this->errMsg = "Username is already taken";
            return $this->errMsg;
        }

        // Validate password
        if ($password !== $password2) {
            $this->errMsg = "Passwords do not match";
            return $this->errMsg;
        }

        // Hash password
        $password = password_hash($password, PASSWORD_DEFAULT);

        // Create user array
        $user = [
            'admin' => $admin,
            'username' => $name,
            'password' => $password,
            'email' => $email,
        ];

        // Insert user into database
        $id = insert('users', $user);

        if ($id) {
            // Get user data from the database
            $user = selectOne('users', ['id' => $id]);

            // Set session
            $_SESSION['id'] = $user['id'];
            $_SESSION['name'] = $user['username'];
            $_SESSION['admin'] = $user['admin'];

            return "";
        } else {
            $this->errMsg = "Error while adding user";
            return $this->errMsg;
        }
    }

    public function validation()
    {
        $name = trim($this->post['name']);
        $email = trim($this->post['email']);
        $password = trim($this->post['password']);
        $password2 = trim($this->post['pass-second']);

        if ($name === '' || $email === '' || $password === '') {
            $this->errMsg = "Fields cannot be empty";
        } elseif (mb_strlen($name, 'utf8') < 2) {
            $this->errMsg = "Username must be at least 2 characters";
        } elseif ($password !== $password2) {
            $this->errMsg = "Passwords do not match";
        }
        return $this->errMsg;
    }
}

$users = selectAll('users');

// Code for user deletion
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    delete('users', $id);
}

// Edit
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['edit_id'])) {
    $user = selectOne('users', ['id' => $_GET['edit_id']]);
    $id = $user['id'];
    $admin = $user['admin'];
    $username = $user['username'];
    $email = $user['email'];

    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['edit_id'])) {
    // Get user data for editing
    $user = selectOne('users', ['id' => $_GET['edit_id']]);
    $id = $user['id'];
    $admin = $user['admin'];
    $username = $user['username'];
    $email = $user['email'];

    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
}

// Editing
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update-user'])) {
    $id = $_POST['id'];
    $email = trim($_POST['email']);
    $username = trim($_POST['name']);
    $password = trim($_POST['password']);
    $admin = isset($_POST['admin']) ? 1 : 0;
    $password2 = trim($_POST['pass-second']);

    if ($username === '' || $email === '' || $password === '') {
        $errMsg = 'Не всі поля заповнені!';
    } elseif (mb_strlen($username, 'utf8') < 2) {
        $errMsg = 'Логін повинен мати більше 2-х символів';
    } elseif ($password !== $password2) {
        $errMsg = 'Паролі не співпадають';
    } else {
        $password = password_hash($password, PASSWORD_DEFAULT);
        if (isset($_POST['admin'])) {
            $admin = 1;
        }

        $user = [
            'id' => $id,
            'admin' => $admin,
            'username' => $username,
            'password' => $password,
        ];
        $updated = updata('users', $id, $user);
    }
    header('location:' . BASE_URL . "/app/admin/user/index.php");
    exit();
}
?>
