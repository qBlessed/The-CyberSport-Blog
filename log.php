<?php
//include "./app/database/databases.php";
//include "./path.php";
///include "./../app/controller/users.php";

?>

<!DOCTYPE html>
<html>
<?php include ("app/view/head.html") ?>
<body>
<?php include("app/include/header.php"); ?>
<!--END HEADER -->
<!--Form-->
<div class="container reg_form">
    <form class="row justify-content-center" method="post" action="./app/controller/users/login.php">
        <h2>Авторизація</h2>
        <div class="mb-3 col-12 col-md-4 error_log">
            <p><?= isset($_GET['errMsg']) ? $_GET['errMsg'] : ''; ?></p>
            <label for="formGroupExampleInput" class="form-label">Ваша почта</label>
            <div class="mb-3 col-12 col-md-4 error">
            </div>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" name="email" value="">
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <label for="exampleInputPassword1" class="form-label">Пароль</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Введіть пароль" name="password">
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <button type="submit" class="btn btn-warning" name="button-log">Увійти</button>
            <a href="reg.php">Зареєструватися</a>
        </div>
    </form>
</div>

<!--END FORM-->

<?php include("app/include/footer.php"); ?>
</body>

</html>
