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
<?php
        session_start();
        if(isset($_POST['old_password']) && isset($_POST['new_password'])){
            $old_password = htmlspecialchars($_POST['old_password']);
            $user = $_SESSION['user'];
            $result = $mysqli->query("SELECT * FROM users WHERE login='$user'")->fetch_array();
            
            if (password_verify($old_password, $result['password'])){
                $new_password = password_hash(htmlspecialchars($_POST['new_password']), PASSWORD_DEFAULT);
                $mysqli->query("UPDATE users SET password='$new_password' WHERE users.login='$user'");
                $error = false;
                header('Location: index.php');
                exit;
            }
            else{
                $error = true;
            }
        } else{
            $error = false;
        }
    ?>

    <div class="wrapper">
        
        <main class="container form-signin w-50 m-auto text-center">
            <a href="/" class="d-block text-white fs-1 mb-5 text-decoration-none">CLEANBLOG</a>
            <div class="text-danger fs-6"><?php if ($error) {echo 'Неверный пароль';}?></div>
            <form method="POST" action="change_password.php">
               
                <h1 class="text-white h3 mb-3 fw-normal">Смена пароля</h1>

                <div class="form-floating">
                <input type="text" class="form-control" name="old_password" id="floatingInput" placeholder="Password" minlength="4" maxlength="20" required="required">
                    <label for="floatingInput">Текущий пароль</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" name="new_password" id="floatingPassword" placeholder="Password" minlength="4" maxlength="20" required="required">
                    <label for="floatingPassword">Новый пароль</label>
                </div>

                <button class="mt-3 w-100 btn btn-lg btn-success" type="submit">Подтвердить</button>
            </form>
        </main>
        <?php include("templates/footer.php");?>
    </div>
    <script type="text/javascript" src="js/bootstrap.js"></script>

</body>
