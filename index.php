<?php
 include  'path.php';
//include 'app/database/databases.php';
include   'app/controller/topics.php';
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 4;
    $offset = $limit * ($page -1);
    $total_page = round(СountRowe('post') / $limit  ,0);
$posts = selectAllFromPostsWithUsersOnindex('post','users',$limit,$offset);
$topTopic = selectTopFromPosts('post');
    //tt($total_page)

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
<div class="container">
    <div class="row">
        <h2 class="slider-title">Топ пости</h2>
    </div>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
        <div class="carousel-inner">
            <?php foreach ($topTopic as $post): ?>
            <div class="carousel-item active">
                <img src="<?='assets/img/post/'.$post['img']?>" class="d-block w-100" alt="...">
                <div class="carousel-caption-hack carousel-caption d-none d-md-block">
                    <h5><a href="<?= 'single.php?post=' . $post['id'];?>"><?=substr($post['title'],0,120) . '...' ?></a></h5>
                </div>
            </div>
            <?php  endforeach;?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- Карусель end -->
<!--main -->
<div class ="container">
    <div class="content row">
        <!--Main cont-->
        <div class="main-content col-md-9  сol-12">
            <h2 id="new">Новини</h2>
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
            <?php include("app/include/pagination.php"); ?>
        </div>
        <!--sidebar Content-->
        <div class="sidebar col-md-3 col-12">
            <div class="section search">
                <h3>Пошук</h3>
                <form action="search.php" method="post">
                    <input type="text" name="search-term" class="text-input" placeholder="Пошук">
                </form>
            </div>
            <div class="section topics">
                <h3>Теми</h3>
                <ul>
                    <?php  foreach ($topic as $key  => $topic): ?>
                    <li>
                        <a href="<?= 'category.php?id='. $topic['id'];?>"><?=$topic['name'];?></a>
                    </li>
                <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>


<!-- Footer -->
<?php include("app/include/footer.php"); ?>
    </body>

</html>

