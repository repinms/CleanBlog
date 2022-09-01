<?php require('database/connect.php');?>

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
    <?php $error = '';?>
    <?php
        $post = $_POST['login'];
        $exist = $mysqli->query("SELECT * FROM users WHERE login='$post'")->num_rows;
        if(isset($_POST['login']) && isset($_POST['password'])){
            if($exist==0){
                $login = htmlspecialchars($_POST['login']);
                $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);
                $mysqli->query("INSERT INTO users (login, password) VALUES ('$login', '$password')");
                $error = '';
                header('Location: login.php');
                exit;
            } else{$error = 'Логин уже занят';}
        }
    ?>
        
    <div class="wrapper">
        
        <main class="container form-signin w-50 m-auto text-center">
            <a href="/" class="d-block text-white fs-1 mb-5 text-decoration-none">CLEANBLOG</a>
            <div class="text-danger fs-6"><?php echo $error;?></div>
            <form method="POST" action="registration.php">
               
                <h1 class="text-white h3 mb-3 fw-normal">Регистрация</h1>

                <div class="form-floating">
                <input type="text" class="form-control" name="login" id="floatingInput" placeholder="text" minlength="4" maxlength="20" required="required">
                    <label for="floatingInput">Логин</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password" minlength="4" maxlength="20" required="required">
                    <label for="floatingPassword">Пароль</label>
                </div>

                <button class="mt-3 w-100 btn btn-lg btn-success" type="submit">Зарегистрироваться</button>
            </form>
        </main>
        <?php include("templates/footer.php");?>
    </div>
    <script type="text/javascript" src="js/bootstrap.js"></script>
</body>