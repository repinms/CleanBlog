<?php
    require('database/connect.php'); 
    
    if(isset($_POST)){
        if($_POST['formtype']=='registr'){
            $login = htmlspecialchars($_POST['login']);
            $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);
            $mysqli->query("INSERT INTO users (login, password) VALUES ('$login', '$password')");
            session_start();
            $_SESSION['user'] = $login;
            header('Location: index.php');
            exit;
        }
        elseif($_POST['formtype']=='login'){}
    }
    else{
        header('Location: registration.php');
        exit;
    }

    header('Location: index.php');
    exit;
?>