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
                $id = $_GET['id'];
                $result = $mysqli->query("SELECT * FROM articles WHERE id='$id'")->fetch_array();}?>
            
        <?php if($result!=false):?>
            <main class="container d-flex flex-row">
                <div class="col-lg-9 col-sm-12 pe-lg-3 pe-sm-0">
                    <section class="content p-5">
                        <div><h1><?php echo $result['name'];?></h1></div>
                        <div class="content_image" style="background-image: url(content/article_image/<?php echo $result['logo'];?>);"></div>
                        <div class="text-muted fs-5">Тэги: машины хуины блядины</div>
                        <div class="mt-4 fs-5"><p><?php echo  $result['text'];?></p></div>

                        <section class="comments mt-4">
                            <div><h4>Комментарии</h2></div>
                            <form action="article_page">
                                <textarea class="form-control" placeholder="Ваш комментарий" id="floatingTextarea"></textarea>
                                <button class="btn btn-success mt-2" type="submit">Отправить</button>
                            </form>
                        </section>
                    </section>
                </div>
                
                <div class="col-lg-3 col-sm-0">
                    <aside class="tag_articles">
                        dsdas
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