<?php
    session_start();
    require('database/connect.php');

    if(isset($_POST)){
        if($_POST['formtype']=='logout'){
            unset($_SESSION['user'], $_SESSION['usertype']);
            header('Location: index.php');
            exit();
        }
        elseif($_POST['formtype']=='add_tag'){
            if(isset($_POST['add_tag'])){
                $post = $_POST['add_tag'];
                $mysqli->query("INSERT INTO tags (name) VALUES ('$post');");
                unset($_SESSION['error']);
                header('Location: account.php');
                exit();
            }
            else{
                unset($_SESSION['error']);
                header('Location: account.php');
                exit();
            }
        }

        elseif($_POST['formtype']=='del_tag'){
            if(isset($_POST['delete_tag'])){
                $post = $_POST['delete_tag'];
                $mysqli->query("DELETE FROM tags WHERE id='$post';");
                unset($_SESSION['error']);
                header('Location: account.php');
                exit();
            }
            else{
                unset($_SESSION['error']);
                header('Location: account.php');
                exit();
            }
        }

        elseif($_POST['formtype']=='add_article'){
            if(isset($_POST['article_name']) && isset($_POST['article_text']) && isset($_POST['article_tag']) && ($_FILES['article_logo']['error'])==0){
                $name = $_POST['article_name'];
                $text = $_POST['article_text'];
                $ext = array_pop(explode('.',$_FILES['article_logo']['name']));
                $new_name_logo = time() . '.' . $ext;
                $logo = 'content/article_image/' . $new_name_logo;
                move_uploaded_file($_FILES['article_logo']['tmp_name'], $logo);
                $tag = $_POST['article_tag'];
                $date = date("Y-m-d");
                $mysqli->query("INSERT INTO articles (name, date, logo, text) VALUES ('$name', '$date', '$new_name_logo', '$text');");
                $id = $mysqli->insert_id;
                $mysqli->query("INSERT INTO article_tag (article_id, tag_id) VALUES ('$id', '$tag');");
                unset($_SESSION['error']);
                header('Location: account.php');
                exit();
            }
            else{
                unset($_SESSION['error']);
                header('Location: account.php');
                exit();
            }
        }

        elseif($_POST['formtype']=='del_article'){
            if(isset($_POST['delete_article'])){
                $post = $_POST['delete_article'];
                $mysqli->query("DELETE FROM articles WHERE id='$post';");
                unset($_SESSION['error']);
                header('Location: account.php');
                exit();
            }
            else{
                unset($_SESSION['error']);
                header('Location: account.php');
                exit();
            }
        }

        elseif($_POST['formtype']=='change_password'){
            if((isset($_POST['old_password'])) && (isset($_POST['new_password']))){
                $old_password = htmlspecialchars($_POST['old_password']);
                $user = $_SESSION['user'];
                $result = $mysqli->query("SELECT * FROM users WHERE login='$user'")->fetch_array();
                if (password_verify($old_password, $result['password'])){
                    $new_password = password_hash(htmlspecialchars($_POST['new_password']), PASSWORD_DEFAULT);
                    $mysqli->query("UPDATE users SET password='$new_password' WHERE users.login='$user'");
                    unset($_SESSION['error']);
                    header('Location: index.php');
                    exit();
                }
                else{
                    $_SESSION['error'] = 'Неверный пароль';
                    header('Location: change_password.php');
                    exit();
                }
            }
            else{
                unset($_SESSION['error']);
                header('Location: change_password.php');
                exit();
            }
        }

        elseif($_POST['formtype']=='login'){
            if((isset($_POST['login'])) && (isset($_POST['password']))){
                $login = htmlspecialchars($_POST['login']);
                $password = htmlspecialchars($_POST['password']);
                $result = $mysqli->query("SELECT * FROM users WHERE login='$login'")->fetch_array();
                if (password_verify($password, $result['password'])){
                    $_SESSION['user'] = $login;
                    $_SESSION['usertype'] = $result['type'];
                    $_SESSION['user_id'] = $result['id'];
                    unset($_SESSION['error']);
                    header('Location: index.php');
                    exit();
                }
                else{
                    $_SESSION['error'] = 'Неверный логин или пароль';
                    header('Location: login.php');
                    exit();
                }
            }
            else{
                unset($_SESSION['error']);
                header('Location: login.php');
                exit();
            }
        }

        elseif($_POST['formtype']=='registration'){
            if((isset($_POST['login'])) && (isset($_POST['password'])))
            {
                $post = $_POST['login'];
                $exist = $mysqli->query("SELECT * FROM users WHERE login='$post'")->num_rows;
                if ($exist == 0) {
                    $login = htmlspecialchars($_POST['login']);
                    $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);
                    $mysqli->query("INSERT INTO users (login, password) VALUES ('$login', '$password')");
                    unset($_SESSION['error']);
                    header('Location: login.php');
                    exit();
                } else {
                    $_SESSION['error'] = 'Логин уже занят';
                    header('Location: registration.php');
                    exit();
                }
            }
            else{
                unset($_SESSION['error']);
                header('Location: registration.php');
                exit();
            }
        }
    }
    unset($_SESSION['error']);
    header('Location: index.php');
    exit;
?>