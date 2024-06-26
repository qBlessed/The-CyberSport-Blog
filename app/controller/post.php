<?php

//include "./../../database/databases.php";
//include "./../../../path.php";

include $_SERVER['DOCUMENT_ROOT'] . '/app/database/databases.php';
include $_SERVER['DOCUMENT_ROOT'] . '/path.php';
if(!$_SESSION){
    header('location: '. BASE_URL . 'log.php');

}

define('BASE_URL', 'http://mycyber');

$errMsg =[];
$id = '';
$title = '';
$content = '';
$topics = selectAll('topics');
$topic = '';
$img = '';
$posts = selectAll('post');
$postsADM = selectAllFromPostsWithUsers('post','users');
//tt(ROOT_PATH);
// Код для створення посту
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_post'])) {

   // tt($_FILES);
    if(!empty($_FILES['img'] ['name'])){
        $imgName = time()."_". $_FILES['img'] ['name'];
        $fileTmpName = $_FILES['img'] ['tmp_name'];
        $fileType = $_FILES['img'] ['type'];
        $destination = ROOT_PATH ."\assets\img\post\\" .$imgName;

       if(strpos($fileType, 'image')=== false){
           array_push($errMsg,'Файл є не зображенням');
       }

       $result = move_uploaded_file ($fileTmpName ,$destination);

       if($result){
           $_POST['img'] = $imgName;

       }else{
           array_push($errMsg,'Помилка загрузки зображення на сервер ');
       }
    }else{
        array_push($errMsg, 'Помилка отримання зображення ');
    }


    // Обрізка вхідних даних для видалення зайвих пробілів
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $topic = trim($_POST['topic']);



    $publish = isset($_POST['publish']) ? 1 : 0;





    // Валідація вхідних даних
    if ($title === '' || $content === '' || $topic === '') {
        array_push($errMsg, "Не всі поля заповнені!");
    } elseif (mb_strlen($title, 'utf8') < 7) {
        array_push($errMsg,'Назва посту повинна містити більше 7 символів');
    } else {
        // Підготовка даних для вставки
        $post = [
            'id_user' => $_SESSION['id'],
            'title' => $title,
            'content' => $content,
            'img' => $_POST['img'],
            'status' => $publish,
            'id_topic' => $topic
        ];

        // Вивід змінних для відладки
        echo "<pre>";
        print_r($post);
        echo "</pre>";

        // Вставка посту в базу даних
        $post_id = insert('post', $post);


        // Перевірка, чи пост був вставлений
        if ($post_id) {
            echo "Пост успішно вставлений з ID: " . $post_id;
            // Перенаправлення на сторінку індексу постів
            header('location:' . BASE_URL . "/app/admin/posts/index.php");
            exit();
        } else {
            echo "Помилка при вставці посту!";
        }
    }
} else {
    $id = '';
    $title = '';
    $content = '';
    $publish = '';
    $topic= '';
}

//Видалення
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id'])) {
    $id = $_GET['del_id'];
    delete('post', $id);
    header('location:' . BASE_URL . "/app/admin/posts/index.php");
}

///Апдейт
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $post = selectOne('post', ['id' => $_GET['id']]);

    $id = $post['id'];
    $title = $post['title'];
    $content = $post['content'];
    $topic = $post['id_topic'];
    $publish = $post['status'];
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['post-edit'])) {
    $id = $_POST['id'];
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $topic = trim($_POST['topic']);
    $publish = isset($_POST['publish']) ? 1 : 0;


    if(!empty($_FILES['img'] ['name'])){
        $imgName = time()."_". $_FILES['img'] ['name'];
        $fileTmpName = $_FILES['img'] ['tmp_name'];
        $fileType = $_FILES['img'] ['type'];
        $destination = ROOT_PATH ."\assets\img\post\\" .$imgName;

        if(strpos($fileType, 'image')=== false){
            array_push($errMsg,'Файл є не зображенням');
        }

        $result = move_uploaded_file ($fileTmpName ,$destination);

        if($result){
            $_POST['img'] = $imgName;

        }else{
            array_push($errMsg,'Помилка загрузки зображення на сервер ');
        }
    }else{
        array_push($errMsg, 'Помилка отримання зображення ');
    }



    if ($title === '' || $content === '' || $topic === '') {
        array_push($errMsg, "Не всі поля заповнені!");
    } elseif (mb_strlen($title, 'utf8') < 7) {
        array_push($errMsg, 'Назва посту повинна містити більше 7 символів');
    } else {

        $post = [
            'id_user' => $_SESSION['id'],
            'title' => $title,
            'content' => $content,
            'img' => $_POST['img'],
            'status' => $publish,
            'id_topic' => $topic
        ];

        updata('post', $id, $post);
        header('location:' . BASE_URL . "/app/admin/posts/index.php");
    }
} else {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $publish = isset($_POST['publish']) ? 1 : 0;
    $topic = $_POST['id_topic'];
}
////Pablick unpablick
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['pub_id'])) {
    $id = $_GET['pub_id'];
    $publish = $_GET['publish'];

    $post_id = updata('post',$id,['status' => $publish]);
    header('location:' . BASE_URL . "/app/admin/posts/index.php");
    exit();
}

