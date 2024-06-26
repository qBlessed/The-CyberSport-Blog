<?php
session_start();
include_once('../../include/header-admin.php');
include  ('../../controller/userss.php');
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
                <h2>Cтворення Юзер</h2>
            </div>

            <div class="row edd-post">
                <div class="mb-3 col-12 col-md-4 err">
                    <p><?=$errMsg?></p>
                </div>

            <div class="row edd-post">
                <div   class="mb-3 col-12  col-md-4  error" >
                    <p><?=isset($_GET['errMsg']) ? $_GET['errMsg'] : '';?></p>
                </div>
                <form action="create.php" method="post">
                    <div class="сol">
                        <label for="formGroupExampleInput" class="form-label">Ваш логін</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Введіь ваш логін" name="name" value="<?=$login?>">
                    </div>
                    <div class="col">
                        <label for="exampleInputEmail1" class="form-label" >Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" name="email" value="<?=$email?>">
                    </div>
                    <div class="col">
                        <label for="exampleInputPassword1" class="form-label">Пароль</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Введіть пароль" name="password">
                    </div>
                    <div class="col">
                        <label for="exampleInputPassword2" class="form-label">Повторний пароль</label>
                        <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Повторний пароль" name="pass-second">
                    </div>
                    <input name="admin"  value="1" class="form-check-input" type="checkbox" id="flexCheckChecked">
                    <label class="form-check-label" for="flexCheckChecked">
                        Admin
                    </label>
                    <div class="col">
                        <button  name="create-user" class="btn btn-primary" type="submit">Створити</button>
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
