<?php require('database/connect.php'); 
include('preview_text.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="text/html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/article_page.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>CleanBlog</title>
</head>
<body>
    <div class="wrapper">
        
        <?php include("templates/header.php");?>
        <?php $result = false;
            if(isset($_GET['id'])){
                $id = (int)$_GET['id'];
                $result = $mysqli->query("SELECT * FROM articles LEFT JOIN article_tag ON articles.id = article_tag.article_id WHERE id='$id'")->fetch_all();}?>
        <?php if($result!=false):?>
            <main class="container-md d-flex flex-row">
                <div class="col-lg-9 col-md-12 pe-lg-3 pe-sm-0">
                    <section class="content p-md-4 p-2 p-lg-5"> 
                        <div class="mb-3"><h1><?php echo $result[0][1];?></h1></div>
                        <div class="content_image" style="background-image: url(content/article_image/<?php echo $result[0][3];?>);"></div>
                        <div class="d-flex justify-content-between">
                            <div class="text-muted fs-5">Тэги: <?php foreach($result as $arr){ echo $mysqli->query("SELECT * FROM tags WHERE id='$arr[6]'")->fetch_array()['name'] . ' ';}?></div>
                            <div class="text-muted fs-5"><?php echo date("d-m-Y", strtotime($result[0][2]));?></div>
                        </div>
                        <div class="mt-4 fs-5"><p><?php echo  $result[0][4];?></p></div>

                        <section class="comments mt-4">
                            <div><h4>Комментарии</h4></div>
                            <?php if(isset($_SESSION['user'])):?>
                                <form action="article_page.php?id=<?php echo $id;?>" method="POST">
                                    <textarea name="comment_text" class="form-control" placeholder="Ваш комментарий" id="floatingTextarea"></textarea>
                                    <button class="btn btn-success mt-2" type="submit">Отправить</button>
                                </form>
                                <?php $article_id_comm = $result[0][0];
                                if(isset($_POST['comment_text']) && strlen($_POST['comment_text'])>1){
                                    $text = htmlspecialchars($_POST['comment_text']);
                                    $user_id = $_SESSION['user_id'];
                                    $date = date("Y-m-d");
                                    $mysqli->query("INSERT INTO comments (article_id, user_id, comm_date, comm_text) VALUES ('$article_id_comm', '$user_id', '$date','$text')");}
                                ?>
                            <?php else:?><div>Чтобы оставить комментарий войдите в аккаунт</div>
                            <?php endif;?> 
                            <div>
                                <?php 

                                $result_comm = $mysqli->query("SELECT * FROM `comments` 
                                LEFT JOIN articles ON comments.article_id = articles.id  
                                LEFT JOIN users ON comments.user_id = users.id
                                WHERE article_id = '$article_id_comm';");
                        
                                while($row=$result_comm->fetch_array()):?>
                                    <div class="card bg-white p-3 mt-5">
                                        <div class="d-flex justify-content-between border-bottom py-1">
                                            <b class="card-text fs-5"><?php echo $row['login'];?></b>
                                            <span class="text-muted"><?php echo date("d-m-Y", strtotime($row['comm_date']));?></span>
                                        </div>
                                        <div class="card-text mt-2"><?php echo $row['comm_text'];?></div>
                                    </div>
                                <?php endwhile;?>
                            </div>
                        </section>
                    </section>
                </div>
                
                <div class="col-lg-3 d-none d-lg-block">
                    <aside class="tag_articles d-flex flex-column">
                        <div><h3 class="m-0">Рекомендуем</h3></div>
                        <?php $articles=$mysqli->query('SELECT * FROM articles order by id desc limit 5;')->fetch_all();?>
                        <?php foreach($articles as list($article_id, $article_name, $article_date, $article_logo, $article_text)):?>
                            <?php if($article_id==$result[0][0]){continue;}?>
                            <div class="card shadow mt-3" style="min-height: 450px;">
                                <div class="card_image" style="background-image: url(content/article_image/<?php echo $article_logo;?>);"></div>
                                <div class="card-body d-flex flex-column align-items-start justify-content-between">
                                    <b class="card-text"><?php echo $article_name;?></b>
                                    <p class="card-text preview-card-text"><?php echo preview_text($article_text, 90);?></p>
                                    <small class="text-muted clock_time"><?php echo date("d-m-Y", strtotime($article_date));?></small>
                                    <a href="article_page.php?id=<?php echo $article_id;?>" class="stretched-link"></a>
                                </div>
                            </div>
                        <?php endforeach;?>
                    </aside>
                </div>
            </main>
        <?php else:?><div class="text-white ms-5">Статья не найдена(</div>
        <?php endif;?>
        

        <?php include("templates/footer.php");?>
        
    </div>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    
</body>
</html>