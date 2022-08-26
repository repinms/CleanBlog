<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css/">
    <link rel="stylesheet" href="css/main.css">
    <title>CleanBlog</title>
</head>
<body>
    <div class="container">
        <header class="d-flex flex-wrap justify-content-between py-3 mb-4 border-bottom">
            <a href="#" class="d-flex align-items-center mb-3 mb-md-0 text-dark text-decoration-none">
                <span class="fs-4">CleanBlog</span>
            </a>

            <ul class="nav nav-pills fs-5">
                <li class="nav-item"><a href="#" class="nav-link">Все статьи</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Тэги</a></li>
            </ul>

            <button type="button" class="btn btn-outline-primary">Войти</button>
        </header>

        <main>
            <section id="big-banners">
                <div class="fs-3 mb-2">Новое</div>
                <div class="row d-flex justify-content-around mb-3">
                    <div class="col-sm-12 col-lg-6">
                        <div class="card" style="height:400px; background-image: url(content/images/yandex.jpg); background-size: cover;">
                            <div class="d-flex card-body align-items-center justify-content-end flex-column">
                                <p class="card-text fs-3">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <small class="text-muted align-self-end">9 mins</small>
                                <a href="#" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card" style="height:400px; background-image: url(content/images/yandex.jpg); background-size: cover;">
                            <div class="d-flex card-body align-items-center justify-content-end flex-column">
                                <p class="card-text fs-3">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <small class="text-muted align-self-end">9 mins</small>
                                <a href="#" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="border-bottom mb-3"></div>

            <section id="arcticles">
                <div class="fs-4 mb-2"><a href="#" class="link-dark">Жанр 1</a></div>
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-3">
                        <div class="card shadow-sm">
                            <img src="content/images/yandex.jpg" alt="preview" width="100%" height="225" style="object-fit: cover;">
                            
                            <div class="card-body d-flex flex-column align-items-start justify-content-center">
                                <b class="card-text">Название</b>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <small class="text-muted">9 mins</small>
                                <a href="#" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </section>
            
        </main>

        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <div class="col-md-4 d-flex align-items-center">
                <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                    <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
                </a>
                <span class="mb-3 mb-md-0 text-muted">© 2022 Company, Inc</span>
            </div>
        </footer>
    </div>
</body>
</html>