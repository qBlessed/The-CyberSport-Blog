<?php
include  'path.php';
//include 'app/database/databases.php';
include SITE_ROOT ."/app/database/databases.php";
 if($_SERVER['REQUEST_METHOD']=== 'POST'  && isset($_POST['search-term'])){
     $posts = search($_POST['search-term'],'post','users');
 }
//tt($posts);
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


<!-- Карусель start-->

<!--main -->
<div class ="container">
    <div class="content row">
        <!--Main cont-->
        <div class="main-content col-md  сol-12">
            <h2 id="search">Результати пошуку</h2>
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
                            <?=mb_substr($post['content'],0,100). '...'?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</div>


<!-- Footer -->
<?php include("app/include/footer.php"); ?>
</body>

</html>

