<?php
//include "./../../database/databases.php";
//include "./../../../path.php";

include $_SERVER['DOCUMENT_ROOT'] . '/app/database/databases.php';


define('BASE_URL', 'http://mycyber');


$errMsg = '';
$id = '';
$name = '';
$description ='';
$topic = selectAll('topics');


//код створення
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topic-button'])) {
   /*
    tt($_POST);
    exit();
*/
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);


    // Создаем экземпляр класса Users
    if ($name === '' || $description  === '') {
        $errMsg = "Не всі поля заповнені!";
    }elseif (mb_strlen($name,'utf8') <2){
        $errMsg = 'Категорія повина містити більше 2 символів';
    }else {
        $existence = selectOne('topics', ['name' => $name]);
        if ($existence['name'] === $name) {
            $errMsg = "Така категорія вже є";
        }else{
            $topic = [
              'name'=>$name,
                'description'=>$description
                ];
            $id = insert('topics' ,$topic);
            $topic = selectOne('topics',['id'=>$id]);
            header('location:'. BASE_URL . "/app/admin/topics/index.php") ;

        }
    }
}else{
    $name = '';
    $description = '';
}
//Видалення
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id'])) {
    $id = $_GET['del_id'];
    delete('topics', $id);
    header('location:' . BASE_URL . "/app/admin/topics/index.php");
}


if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $users = selectOne('users', ['id'=>$_GET['id']]);
    $id = $_GET['id'];
    $topic =  selectOne('topics',['id'=>$id]);
    $id = $topic['id'];
    $name = $topic['name'];
    $description = $topic['description'];

}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topic-edit'])) {

    $name = trim($_POST['name']);
    $description = trim($_POST['description']);


    if ($name === '' || $description === '') {
        $errMsg = "Не всі поля заповнені!";
    } elseif (mb_strlen($name, 'utf8') < 2) {
        $errMsg = 'Категорія повина містити більше 2 символів';
    } else {
        $topic = [
            'name' => $name,
            'description' => $description
        ];
        $id = $_POST['id'];
        $topic_id = updata('topics', $id , $topic);
        header('location:' . BASE_URL . "/app/admin/topics/index.php");

    }
}