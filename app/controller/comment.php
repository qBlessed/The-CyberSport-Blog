<?php
include $_SERVER['DOCUMENT_ROOT'] . '/app/database/databases.php';
$commentsFirAdm = selectAll('comments');



$page = $_GET['post'];
$email = '';
$comment = '';
$errMsg = [];
$status = 0;
$comments = [];



// Код для формы создания комментария
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['goComment'])){


    $email = trim($_POST['email']);
    $comment = trim($_POST['comment']);


    if($email === '' || $comment === ''){
        array_push($errMsg, "Не все поля заполнены!");
    }elseif (mb_strlen($comment, 'UTF8') < 50){
        array_push($errMsg, "Комментарий должен быть длинее 50 символов");
    }else{
        $user = selectOne('users',['email' => $email]);
        if($user['email'] == $email){
            $status = 1;
        }
    }

        $comment = [
            'status' => $status,
            'page' => $page,
            'email' => $email,
            'comment' => $comment
        ];

        $comment = insert('comments', $comment);
       $comments = selectAll('comments', ['page' => $page, 'status' => 1] );


}else{
    $email = '';
    $comment = '';
    $comments = selectAll('comments', ['page' => $page, 'status' => 1] );

}




////Pablick unpablick
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['pub_id'])) {
    $id = $_GET['pub_id'];
    $publish = $_GET['publish'];

    $post_id = updata('comments',$id,['status' => $publish]);
    define('BASE_URL', 'http://mycyber');
    header('Location: ' . BASE_URL . "/app/admin/comments/index.php");
    exit();
}

///Делит
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    delete('comments', $id);
    header( "/app/admin/сomments/index.php");
}

//Апдейт
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
    $oneComment = selectOne('comments', ['id' => $_GET['id']]);
    $id =  $oneComment['id'];
    $email =  $oneComment['email'];
    $text1 = $oneComment['comment'];
    $pub = $oneComment['status'];
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comment_edit'])) {
    $id = $_POST['id'];
    $text = trim($_POST['content']);
    $publish = isset($_POST['publish']) ? 1 : 0;

    if ($text === '' ) {
        array_push($errMsg, "Кометнар без змісту");
    } elseif (mb_strlen($text, 'utf8') < 7) {
        array_push($errMsg, ' Коментар  повинний містити більше 7 символів');
    } else {

        $com = [
            'comment' => $text,
            'status' => $publish
        ];

       $comment = updata('comments', $id, $com);
        define('BASE_URL', 'http://mycyber');
        header('Location: ' . BASE_URL . "/app/admin/comments/index.php");
    }
} else {
    $text = trim($_POST['content']);
    $publish = isset($_POST['publish']) ? 1 : 0;
}



