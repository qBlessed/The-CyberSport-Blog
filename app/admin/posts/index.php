<?php
session_start();
include_once('../../include/header-admin.php');
include('../../controller/post.php');

// Reverse the posts array to show the latest posts first
$postsADM = array_reverse($postsADM);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>cybersport dota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Подключение Font Awesome CSS -->
    <link rel="stylesheet" type="text/css" href="/assets/css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>

<div class="container">
    <?php include "../../include/sidebar-admin.php"; ?>

    <div class="posts col-9">
        <div class="button row">
            <a href="create.php" class="col-2 btn btn-success">Додати</a>
            <span class="col-1"></span>
            <a href="index.php" class="col-2 btn btn-danger">Редагувати</a>
        </div>
        <div class="row title-table">
            <h2>Керуваня записами</h2>
            <div class="col-1">Id</div>
            <div class="col-3">Назва</div>
            <div class="col-2">Автор</div>
            <div class="col-6">Керування</div>
        </div>
        <?php foreach ($postsADM as $key => $post): ?>
            <div class="row post">
                <div class="id col-1"><?=$key +1; ?></div>
                <div class="title col-3"><?=mb_substr($post['title'], 0, 300). '...'?></div>
                <div class="author col-2"><?=$post['username']; ?></div>
                <div class="red col-2"><a href="edit.php?id=<?=$post['id'];?>">Edit</a></div>
                <div class="del col-2"><a href="index.php?del_id=<?=$post['id'];?>">Delete</a></div>
                <?php if($post['status']): ?>
                    <div class="unpublish col-2"><a href="edit.php?publish=0&pub_id=<?=$post['id'];?>">unpublish</a></div>
                <?php else: ?>
                    <div class="publish col-2"><a href="edit.php?publish=1&pub_id=<?=$post['id'];?>">publish</a></div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</div>

<!-- Footer -->
<?php include_once("../../include/footer.php"); ?>
</body>
</html>
