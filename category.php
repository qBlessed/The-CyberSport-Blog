<?php
include  'path.php';
//include 'app/database/databases.php';
include   'app/controller/topics.php';
$posts = selectAll('post',['id_topic'=> $_GET['id']]);
$category  = selectOne('topics',['id' => $_GET['id']]);
//tt($category);
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>cybersport dota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Подключение Font Awesome CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
<?php include("app/include/header.php"); ?>


<!--main -->
<div class ="container">
    <div class="content row">
        <!--Main cont-->
        <div class="main-content col-md-9  сol-12">
            <h2 id="topicName"> Розділ
                <?=$category['name']?></h2>
            <?php foreach ($posts as $post): ?>
                <div class="post row">
                    <div class="img col-12 col-md-4">
                        <img src="<?='assets/img/post/'.$post['img']?>" class="img-thumbnail">
                    </div>
                    <div class="post_text col-12 col-md-8">
                        <h3>
                            <a href="<?= 'single.php?post=' . $post['id'];?>"><?=substr($post['title'],0,120) . '...' ?></a>
                        </h3>
                        <i class="far fa-user"><?=$post['username'];?></i>
                        <i class="far fa-calendar"><?=$post['created_date'];?></i>
                        <p class="preview-text">
                            <?=mb_substr($post['content'],0,150). '...'?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <!--sidebar Content-->
        <div class="sidebar col-md-3 col-12">
            <div class="section search">
                <h3>Пошук</h3>
                <form action="search.php" method="post">
                    <input type="text" name="search-term" class="text-input" placeholder="Пошук">
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Footer -->
<?php include("app/include/footer.php"); ?>
</body>

</html>

