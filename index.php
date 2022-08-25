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
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 text-dark text-decoration-none">
                <span class="fs-4">CleanBlog</span>
            </a>

            <ul class="nav nav-pills fs-5">
                <li class="nav-item"><a href="#" class="nav-link">Все статьи</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Тэги</a></li>
            </ul>

            <button type="button" class="btn btn-outline-primary">Войти</button>
        </header>

        <main>
            <div class="row">
                <div class="col">
                    <div class="card" style="height:300px; background-image: url(content/images/yandex.jpg); background-size: cover;">
                        <div class="d-flex card-body align-items-center justify-content-end flex-column">
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <small class="text-muted">9 mins</small>
                        </div>
                    </div>
                </div>
                
            </div>
        </main>

        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 mt-auto border-top">
            <div class="col-md-4 d-flex align-items-center">
                <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                    <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
                </a>
                <span class="mb-3 mb-md-0 text-muted">© 2022 Company, Inc</span>
            </div>

            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"></use></svg></a></li>
                <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"></use></svg></a></li>
                <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"></use></svg></a></li>
            </ul>
        </footer>
    </div>
</body>
</html>