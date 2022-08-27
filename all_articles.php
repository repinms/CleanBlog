<?php require('database/connect.php'); ?>

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
        
    <?php include("templates/header.php");?>

        <main>
            <div class="fs-3 mb-2">Все статьи</div>
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
        </main>

        <?php include("templates/footer.php");?>
        
    </div>
</body>
</html>