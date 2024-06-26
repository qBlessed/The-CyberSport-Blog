<header class="container-fluid">
    <div class ="container">
        <div class="row">
            <div class="col-4">
                <a href="/index.php">
                    <img src="/assets/img/mainlogo-transformed.png" width="100" alt="Главная страница">
                </a>
            </div>
            <nav class="col-8">
                <ul>

                    <li>
                        <a href="#">

                            <?php echo $_SESSION['name'];?>
                            <i class= " fas fa-user"></i>
                        </a>
                        </li>
                            <li>
                                <a href="http://mycyber/app/controller/users/logout.php?logout=1">Вихід </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>


</header>