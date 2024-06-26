<?php
session_start();
include  ('../../controller/topics.php');
include_once('../../include/header-admin.php');


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>cybersport dota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Подключение Font Awesome CSS -->
    <link rel="stylesheet" type="text/css" href="/assets/css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
          rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
</head>
<body>

<div class="container">
    <?php  include "../../include/sidebar-admin.php"; ?>

        <div class="posts col-9">
            <div class="button row">
                <a href="create.php" class="col-2 btn btn-success">Додати</a>
                <span class="col-1"></span>
                <a href="index.php" class="col-2 btn btn-danger">Редагувати</a>
            </div>
            <div class="row title-table">
                <h2>Додавання категорії</h2>
            </div>

          w

            <form action="create.php" method="post">
                    <div class="col">
                        <input name="name" value="<?=$name;?>" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="Назва категорії">
                    </div>

                    <div class="col">
                        <label for="content" class="form-label">Опис категорії</label>
                        <textarea  name="description" class="form-control" id="content" rows="6"><?=$description;?></textarea>
                    </div>
                    <div class="col">
                        <button name="topic-button" class="btn btn-primary" type="submit">Зберегти категорію</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Footer -->
<?php include_once("../../include/footer.php"); ?>
</body>
</html>
