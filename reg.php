<?php
// Подключаем файл для соединения с базой данных

     // include "app/database/databases.php";
      //include "app/controller/users.php";



?>

<!DOCTYPE html>
<html>
<?php include ("app/view/head.html") ?>
<body>
<?php include("app/include/header.php"); ?>
<!--END HEADER -->
<!--Form-->
<div class="container reg_form">
    <form class="row  justify-content-center " method="post" action="./app/controller/users/registation.php">
        <h2>Реєстрація</h2>
        <div   class="mb-3 col-12  col-md-4  error" >
            <p><?=isset($_GET['errMsg']) ? $_GET['errMsg'] : '';?></p>
        </div>
        <div  class="w-100"></div>
        <div class="mb-3 col-12  col-md-4">
            <label for="formGroupExampleInput" class="form-label">Ваш логін</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Введіь ваш логін" name="name" value="">
        </div>
        <div  class="w-100"></div>
        <div class="mb-3 col-12  col-md-4">
            <label for="exampleInputEmail1" class="form-label" >Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" name="email" value="">
        </div>
        <div  class="w-100"></div>
        <div class="mb-3 col-12  col-md-4">
            <label for="exampleInputPassword1" class="form-label">Пароль</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Введіть пароль" name="password">
        </div>
        <div  class="w-100"></div>
        <div class="mb-3 col-12  col-md-4">
            <label for="exampleInputPassword2" class="form-label">Повторний пароль</label>
            <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Повторний пароль" name="pass-second">
        </div>
        <div  class="w-100"></div>
        <div class="mb-3 col-12  col-md-4">
            <button type="submit" class="btn btn-warning" name="button-reg">Зареєструватися</button>
            <a href="log.php">Авторизуватись</a>
        </div>
    </form>
</div>

<!--END FORM-->
<?php include("app/include/footer.php"); ?>
</body>
</html>
