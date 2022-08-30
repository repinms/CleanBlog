<header class="pt-1 mb-4 bg-dark">
    <nav class="container navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="text-white navbar-brand fs-2 me-5" href="/">CleanBlog</a>
        
            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 fs-4">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../all_articles.php">Все статьи</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../all_tags.php">Тэги</a>
                    </li>
                </ul>
                
                <?php if(isset($_COOKIE['user'])):?>
                    <p><?php echo 'Аккаунт: ' . $_COOKIE['user'];?></p>
                <?php else:?>
                    <a href="../registration.php" class="text-white btn btn-outline-success fs-5 bg-success">Войти</a>
                <?php endif;?>
            </div>
        </div>
    </nav>
</header>