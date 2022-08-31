<header class="pt-1 mb-4 bg-dark fixed-top">
    <nav class="container navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="text-white navbar-brand fs-3 me-5" href="/">CleanBlog</a>
        
            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 fs-5">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../all_articles.php">Все статьи</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../all_tags.php">Тэги</a>
                    </li>
                </ul>
                <?php session_start();
                    if(isset($_SESSION['user'])):?>
                        <a href="account.php" class="text-white m-0 text-decoration-none"><?php echo 'Аккаунт: ' . $_SESSION['user'];?></a>
                <?php else:?>
                    <a href="../login.php" class="text-white btn fs-6 me-2">Войти</a>
                    <a href="../registration.php" class="text-white btn btn-success fs-6">Регистрация</a>
                <?php endif;?>
            </div>
        </div>
    </nav>
</header>