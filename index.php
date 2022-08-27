<?php require('database/connect.php'); ?>

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
                <div class="fs-3 mb-2">Новое</div>
                <div class="row d-flex justify-content-around mb-3">
                    <div class="col-sm-12 col-lg-6 mb-1">
                        <div class="card" style="height:400px; background-image: url(content/images/yandex.jpg); background-size: cover;">
                            <div class="d-flex card-body align-items-center justify-content-end flex-column">
                                <p class="card-text fs-3">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <small class="text-muted align-self-end">9 mins</small>
                                <a href="#" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-6 mb-1">
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
                                        <div class="card shadow-sm mt-3" style="height: 450px;">
                                            <img src="content/article_image/<?php echo $article_logo;?>" alt="" width="100%" height="225" style="object-fit: cover;">
                                            
                                            <div class="card-body d-flex flex-column align-items-start justify-content-between">
                                                <b class="card-text"><?php echo $article_name;?></b>
                                                <p class="card-text preview-card-text"><?php echo substr($article_text, 0, 100);?></p>
                                                <small class="text-muted"><?php echo $article_date;?></small>
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
</body>
</html>