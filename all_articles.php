<?php session_start();?>
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
    <div class="wrapper">
        <?php include("templates/header.php");?>
        <main class="container">
            <section id="arcticles">
                <?php if(isset($_GET['tag'])):?>
                    <?php $id = (int)$_GET['tag'];
                    $result = $mysqli->query("SELECT * FROM tags WHERE id='$id'")->fetch_array();?>
                    <div class="text-white fs-3 mb-2"><?php echo $result['name'];?></div>
                    <?php $result=$mysqli->query('SELECT * FROM article_tag LEFT JOIN articles ON article_tag.article_id = articles.id');?>
                    <div class="row">
                        <?php while($row = $result->fetch_array()):?>
                            <?php if((int)$row['tag_id'] == $id):?>
                                <div class="col-sm-12 col-md-6 col-lg-3">
                                    <div class="card shadow mt-3" style="min-height: 450px;">
                                        <div class="card_image" style="background-image: url(content/article_image/<?php echo $row['logo'];?>);"></div>
                                        <div class="card-body d-flex flex-column align-items-start justify-content-between">
                                            <b class="card-text"><?php echo $row['name'];?></b>
                                            <p class="card-text preview-card-text"><?php echo preview_text($row['text'], 90);?></p>
                                            <small class="text-muted clock_time"><?php echo date("d-m-Y", strtotime($row['date']));?></small>
                                            <a href="article_page.php?id=<?php echo $row['id'];?>" class="stretched-link"></a>
                                        </div>
                                    </div>
                                </div>
                            <?php endif;?>
                        <?php endwhile;?>
                    </div>
                <?php else:?>
                    <div class="text-white fs-3 mb-2">Все статьи</div>
                    <?php $articles=$mysqli->query('SELECT * FROM articles ORDER by date desc')->fetch_all();?>
                    <div class="row">
                        <?php foreach($articles as list($article_id, $article_name, $article_date, $article_logo, $article_text)):?>
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
                    </div>
                <?php endif;?>
            </section>
        </main>
        <?php include("templates/footer.php");?>
    </div>
    <script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>