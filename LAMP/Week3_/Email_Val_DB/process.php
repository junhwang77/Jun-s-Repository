<?php
    session_start();
    require_once('new-connection.php');
    $errors = array();

    if (isset($_POST['email']) && $_POST['email'] != null) {
        if( ! filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
            $errors[] = "This email is not valid";
    }
    else {
        $errors[] = "Email should not be empty";
    }

    if (! empty($errors)) {
        $_SESSION['errors'] = $errors;
        header('Location: index.php');
    }
    elseif (isset($_POST['action']) && $_POST['action']=='insert') {
        $query = "INSERT INTO emails (email, created_at, updated_at)
                 VALUES('{$_POST['email']}', NOW(), NOW())";
        if(run_mysql_query($query)) {
            $_SESSION['message'] = "The email address, '{$_POST['email']}', is a VALID email address! Thank You!";
            header('Location: success.php');
        }
    }
    if (isset($_POST['action']) && $_POST['action']=='replay') {
        session_destroy();
        header('Location:index.php');
    }

    if (isset($_POST['action']) && $_POST['action']=='delete') {
        $id = $_POST['id'];
        $query = "DELETE FROM emails WHERE id = $id";
        if ($connection->query($query) === TRUE) {
            $_SESSION['message'] = "The email address, '{$_POST['email']}' has been successfully deleted";
        }
        else {
            $_SESSION['message'] = "The email cannot be deleted";
        }
        header('Location:success.php');
    }
 ?>
