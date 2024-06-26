<?php
include ('path.php');
include ('app/database/databases.php');


?>
<header class="container-fluid">
    <div class ="container">
        <div class="row">
            <div class="col-4">
                <a href="index.php">
                    <img src="assets/img/mainlogo-transformed.png" width="100" alt="Главная страница">
                </a>

            </div>
            <nav class="col-8">
                <ul>
                    <li><a href="index.php">Головна</a></li>
                    <li><a href = "about.php">Про нас</a></li>


                    <li>
                        <?php if (isset($_SESSION['id'])):?>

                        <a href="#">
                            <i class= " fas fa-user"></i>

                        <?php echo $_SESSION['name'];?>
                        </a>
                        <ul>
                            <?php if ($_SESSION['admin']):?>
                            <li><a href="/app/admin/posts/index.php">Адмін</a></li>
                        <?php endif; ?>
                            <li><a href="http://mycyber/app/controller/users/logout.php?logout=1">Вихід </a></li>
                        </ul>
                    </li>
                </ul>
                       <?php else:?>
                           <a href ='log.php'>
                               <i class= " fas fa-user"></i>

                             Увійти
                           </a>
                           <ul>
                               <li><a href="reg.php">Реєстрація</a></li>
                           </ul>
                        <?php endif;?>
                        `
            </nav>
        </div>
    </div>


</header>