<?php require('database/connect.php'); 
include('preview_text.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="text/html">
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
            <section id="big-banners">
                <?php $articles=$mysqli->query('SELECT * FROM articles order by id desc limit 2;')->fetch_all();?>
                <div class="fs-3 mb-2">Новое</div>
                <div class="row d-flex justify-content-around mb-3">
                    <?php foreach($articles as list($article_id, $article_name, $article_date, $article_logo, $article_text)):?>
                        <div class="col-sm-12 col-lg-6 mb-1">
                            <div class="card card_banner" style="background-image: url(content/article_image/<?php echo $article_logo;?>);">
                                <div class="d-flex card-body align-items-center justify-content-end flex-column card_banner_body">
                                    <p class="card-text fs-3 text-white"><?php echo $article_name;?></p>
                                    <small class="text-white align-self-end"><?php echo date("d-m-Y", strtotime($article_date));?></small>
                                    <a href="#" class="stretched-link"></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>
                </div>
            </section>

            <section id="arcticles">
                <?php $tags=$mysqli->query('SELECT * FROM tags')->fetch_all();
                $articles=$mysqli->query('SELECT * FROM articles')->fetch_all();
                $article_tag=$mysqli->query('SELECT * FROM article_tag')->fetch_all();?>
                
                <?php foreach($tags as list($tag_id, $tag_name)):?>
                    <div class="border-bottom mb-3 mt-3"></div>
                    <div class="fs-4"><a href="#" class="link-dark"><?php echo $tag_name?></a></div>
                    <div class="row">
                        <?php foreach($articles as list($article_id, $article_name, $article_date, $article_logo, $article_text)):
                            foreach($article_tag as list($id, $tag)):
                                if($id==$article_id && $tag==$tag_id):?>
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
                                <?php endif;?>
                            <?php endforeach;?>
                        <?php endforeach;?>
                    </div>
                <?php endforeach;?>
            </section>
            
        </main>

        <?php include("templates/footer.php");?>
        
    </div>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    
</body>
</html>