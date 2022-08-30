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

    <div class="wrapper">
        
        <main class="container form-signin w-50 m-auto text-center">
            <a href="/" class="d-block text-white fs-1 mb-5 text-decoration-none">CLEANBLOG</a>
            <div class="text-danger fs-6"><?php echo $error;?></div>
            <form method="POST" action="login.php">
               
                <h1 class="text-white h3 mb-3 fw-normal">Войти в аккаунт</h1>

                <div class="form-floating">
                <input type="text" class="form-control" name="login" id="floatingInput" placeholder="text" minlength="4" maxlength="20" required="required">
                    <label for="floatingInput">Логин</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password" minlength="4" maxlength="20" required="required">
                    <label for="floatingPassword">Пароль</label>
                </div>

                <button class="mt-3 w-100 btn btn-lg btn-success" type="submit">Войти</button>
            </form>
        </main>
        <?php include("templates/footer.php");?>
    </div>
    <script type="text/javascript" src="js/bootstrap.js"></script>

    <?php
        if(isset($_POST['login']) && isset($_POST['password'])){
            $login = htmlspecialchars($_POST['login']);
            $password = htmlspecialchars($_POST['password']);
            $result = $mysqli->query("SELECT * FROM users WHERE login='$login'")->fetch_array();
            if (password_verify($password, $result['password'])){
                session_start();
                $_SESSION['user'] = $login;
                $_SESSION['usertype'] = $result['type'];
                $error = '';
                header('Location: index.php');
                exit;
            }
            else{
                $error = 'Неверный ЛОГИН или ПАРОЛЬ';
            }
        } else{
            $error = 'Пользователь не найден';
        }
    ?>
</body>
