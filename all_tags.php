<?php session_start();?>
<?php require('database/connect.php');?>
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
            <section id="tags">
                <?php $tags=$mysqli->query('SELECT * FROM tags')->fetch_all();?>
                <div class="text-white fs-3 mb-2">Тэги</div>
                <div class="col-12 col-md-5 col-lg-3">
                    <ul class="list-group">
                        <?php foreach($tags as list($id, $tag)):?>
                            <li class="list-group-item"><a href="all_articles.php?tag=<?php echo $id;?>" class="link-dark"><?php echo $tag;?></a></li>
                        <?php endforeach;?>
                    </ul>
                </div>
            </section>
        </main>
        <?php include("templates/footer.php");?>
    </div>
    <script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>