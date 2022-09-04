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
    <?php
    if(isset($_SESSION['user'])==false):?><a href="login.php" class="fs-3">Войдите в аккаунт</a><?php  endif;?>

    <div class="wrapper">
        <?php include("templates/header.php");?>
        <main class="container d-flex flex-column justify-content-center align-items-center">
            <div><h1 class="text-white"><?php if ($_SESSION['usertype']=='admin'){ echo 'Администратор - ';}
            else{ echo 'Пользователь - ';} echo $_SESSION['user'];?></h1></div>
            <a href="change_password.php" class="text-white btn">Сменить пароль</a>

            <form class="mt-5" name="logout" action="validate.php" method="POST">
                <input type="hidden" name="formtype" value="logout">
                <button class="text-white btn btn-danger" type="submit">Выйти</button>
            </form>

            <!-- ПРОВЕРКА НА АДМИНА -->
            <?php if($_SESSION['usertype']=='admin'):?>
            
                <!-- ФОРМЫ ИЗМЕНЕНИЯ БАЗЫ ДАННЫХ -->
                <div class="d-flex flex-column align-items-start mt-5 border-top w-100">
                    <section class="mt-3 w-100">
                        <div class="text-white">Добавить тэг</div>

                        <form method="POST" action="validate.php">
                            <input type="hidden" name="formtype" value="add_tag">
                            <input name="add_tag" type="text" class="w-100">
                            <button type="submit">ОК</button>
                        </form>

                    </section>
                    <section class="mt-3 w-100">
                        <div class="text-white">Удалить тэг</div>
                        <?php $result = $mysqli->query('SELECT * FROM tags');?>

                        <form method="POST" class="w-100" action="validate.php">
                            <input type="hidden" name="formtype" value="del_tag">
                            <select name="delete_tag" class="form-select" aria-label="Default select">
                                <?php while($row = $result->fetch_array()):?>
                                    <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                                <?php endwhile;?>
                            </select>
                            <button type="submit">ОК</button>
                        </form>

                    </section>
                </div>
                <div class="d-flex flex-column align-items-start mt-5 border-top w-100">
                    <section class="mt-3 w-100">
                        <div class="text-white">Добавить статью</div>
                        <?php $result = $mysqli->query('SELECT * FROM tags');?>

                        <form enctype="multipart/form-data" method="POST" class="form_full" action="validate.php">
                            <input type="hidden" name="formtype" value="add_article">
                            <input class="w-100" name="article_name" placeholder="Название статьи" type="text">
                            <input class="my-1 text-white" name="article_logo" placeholder="Файл картинки" type="file">
                            <textarea name="article_text" class="form-control w-100" placeholder="Текст статьи" id="floatingTextarea"></textarea>
                            <div class="text-white">Тэг</div>
                            <select name="article_tag" class="form-select" aria-label="Default select">
                                <?php while($row = $result->fetch_array()):?>
                                    <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                                <?php endwhile;?>
                            </select>
                            <button type="submit">ОК</button>
                        </form>

                    </section>
                    <section class="mt-3 w-100">
                        <div class="text-white">Удалить статью</div>
                        <?php $result = $mysqli->query('SELECT * FROM articles');?>

                        <form method="POST" action="validate.php">
                            <input type="hidden" name="formtype" value="del_article">
                            <select name="delete_article" class="form-select" aria-label="Default select">
                                <?php while($row = $result->fetch_array()):?>
                                    <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                                <?php endwhile;?>
                            </select>
                            <button type="submit">ОК</button>
                        </form>

                    </section>
                </div>
            <?php endif;?>
        </main>
        <?php include("templates/footer.php");?>
    </div>
    <script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>