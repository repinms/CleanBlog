<?php session_start();?>
<?php require('database/connect.php');
include('preview_text.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="text/html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>CleanBlog</title>
</head>
<body>
    <div class="wrapper">
        <?php include("templates/header.php");?>
        <main class="container">
            <section id="big-banners">
                <?php $articles=$mysqli->query('SELECT * FROM articles order by id desc limit 2;')->fetch_all();?>
                <div class="text-white fs-3 mb-2">Новое</div>
                <div class="row d-flex justify-content-around mb-3">
                    <?php foreach($articles as list($article_id, $article_name, $article_date, $article_logo, $article_text)):?>
                        <div class="col-sm-12 col-lg-6 mb-1">
                            <div class="card card_banner border-0" style="height: 400px;background-image: url(content/article_image/<?php echo $article_logo;?>);">
                                <div class="d-flex card-body align-items-center justify-content-end flex-column card_banner_body">
                                    <p class="card-text fs-3 text-white"><?php echo $article_name;?></p>
                                    <small class="text-white align-self-end"><?php echo date("d-m-Y", strtotime($article_date));?></small>
                                    <a href="article_page.php?id=<?php echo $article_id;?>" class="stretched-link"></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>
                </div>
            </section>
            <section id="arcticles">
                <?php $tags=$mysqli->query('SELECT * FROM tags')->fetch_all();?>
                <?php foreach($tags as list($tag_id, $tag_name)):
                    $article_tag=$mysqli->query("SELECT * FROM article_tag WHERE tag_id='$tag_id'")->fetch_all();?>
                    <div class="border-bottom mb-3 mt-3"></div>
                    <div class="fs-4"><a href="all_articles.php?tag=<?php echo $tag_id;?>" class="text-white link"><?php echo $tag_name;?></a></div>
                    <div class="row">
                        <?php foreach($article_tag as list($article_id, $tag_id)):
                            $articles=$mysqli->query("SELECT * FROM articles WHERE id='$article_id' LIMIT 4")->fetch_all();
                            foreach($articles as list($article_id, $article_name, $article_date, $article_logo, $article_text)):?>
                                <div class="col-sm-12 col-md-6 col-lg-3">
                                    <div class="card shadow mt-3" style="min-height: 450px;">
                                        <div class="card_image" style="background-image: url(content/article_image/<?php echo $article_logo;?>);"></div>
                                        <div class="card-body d-flex flex-column align-items-start justify-content-between">
                                            <b class="card-text"><?php echo $article_name;?></b>
                                            <p class="card-text preview-card-text"><?php echo preview_text($article_text, 90);?></p>
                                            <small class="text-muted clock_time"><?php echo date("d-m-Y", strtotime($article_date));?></small>
                                            <a href="article_page.php?id=<?php echo $article_id;?>" class="stretched-link"></a>
                                        </div>
                                    </div>
                                </div>
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