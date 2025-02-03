<?php
include 'path.php';
include SITE_ROOT . "/app/database/databases.php";

$posts = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search-term'])) {
    $posts = search($_POST['search-term'], 'post', 'users');
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cybersport Dota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php include("app/include/header.php"); ?>

<div class="container">
    <div class="content row">
        <div class="main-content col-md-12">
            <h2 id="search">Результати пошуку</h2>
            <?php foreach ($posts as $post): ?>
                <div class="post row mb-4">
                    <div class="img col-12 col-md-4">
                        <img src="<?= 'assets/img/post/' . $post['img'] ?>" class="img-thumbnail" alt="Post Image">
                    </div>
                    <div class="post_text col-12 col-md-8">
                        <h3>
                            <a href="<?= 'single.php?post=' . $post['id']; ?>"><?= htmlspecialchars(mb_substr($post['title'], 0, 120)) . '...' ?></a>
                        </h3>
                        <i class="far fa-user"><?= htmlspecialchars($post['username']); ?></i>
                        <i class="far fa-calendar"><?= htmlspecialchars($post['created_date']); ?></i>
                        <p class="preview-text">
                            <?= htmlspecialchars(mb_substr($post['content'], 0, 100)) . '...' ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php include("app/include/footer.php"); ?>
</body>
</html>
