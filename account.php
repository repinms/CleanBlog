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
    <?php session_start();
    if(isset($_SESSION['user'])==false){header('Location: login.php'); exit;}
    if(isset($_POST['logout'])){
        unset($_SESSION['user'], $_SESSION['usertype']);
        header('Location: index.php');
        exit;
    }
    ?>
    <div class="wrapper">
        
        <?php include("templates/header.php");?>

        <main class="container d-flex flex-column justify-content-center align-items-center">
            <div><h1 class="text-white"><?php if ($_SESSION['usertype']=='admin'){ echo 'Администратор - ';}
            else{ echo 'Пользователь - ';} echo $_SESSION['user'];?></h1></div>
            
            <a href="change_password.php" class="text-white btn">Сменить пароль</a>
            
            <form class="mt-5" name="logout" action="account.php" method="POST">
                <input type="hidden" name="logout">
                <button class="text-white btn btn-danger" type="submit">Выйти</button>
            </form>
        </main>

        <?php include("templates/footer.php");?>
        
    </div>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    
</body>
</html>