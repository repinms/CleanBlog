<?php require('database/connect.php'); 
include('preview_text.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>CleanBlog</title>
</head>
<body>
    <div class="container">
        
        <?php include("templates/header.php");?>

        <main>
            <section id="arcticles">
                <div class="fs-3 mb-2">Все статьи</div>
                <?php $articles=$mysqli->query('SELECT * FROM articles ORDER by date desc')->fetch_all();?>
                <div class="row">
                    <?php foreach($articles as list($article_id, $article_name, $article_date, $article_logo, $article_text)):?>
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="card shadow mt-3" style="min-height: 450px;">
                                <div class="card_image" style="background-image: url(content/article_image/<?php echo $article_logo;?>);"></div>
                                <div class="card-body d-flex flex-column align-items-start justify-content-between">
                                    <b class="card-text"><?php echo $article_name;?></b>
                                    <p class="card-text preview-card-text"><?php echo preview_text($article_text, 90);?></p>
                                    <small class="text-muted"><?php echo date("d-m-Y", strtotime($article_date));?></small>
                                    <a href="#" class="stretched-link"></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>
                </div>
            </section>
        </main>

        <?php include("templates/footer.php");?>
        
    </div>
    <script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>