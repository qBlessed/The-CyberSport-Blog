<?php include("path.php");
include   'app/controller/topics.php';
$post = selectPostFromPostsWithUsersOnSingle('post','users', $_GET['post']);
//tt($post);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>cybersport dota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Подключение Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<body>
<?php include("app/include/header.php"); ?>
<!--main -->
<div class ="container">
    <div class="content row">
        <!--Main cont-->
        <div class="main-content col-md-9  сol-12">
            <h2><?php echo $post['title']?></h2>
            <div class="single_post">
                <div class="img col-12">
                    <img src="<?='assets/img/post/'.$post['img'];?>" class="img-thumbnail">
                </div>
                <div class="info">
                    <i class="far fa-user"><?=$post['username'];?></i>
                    <i class="far fa-calendar"><?=$post['created_date'];?></i>
                </div>
                <div class="single_post_text col12">
                    <?=$post['content'];?>
                </div>
            </div>
            <?php  include   'app/include/comments.php'; ?>
        </div>
        <!--sidebar Content-->
        <div class="sidebar col-md-3 col-12">

            <div class="section search">

                <h3>Пошук</h3>
                <form action="index.php" method="post">
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
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<?php include("app/include/footer.php"); ?>

</body>

</html>

