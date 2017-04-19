<?php
    session_start();
    require('new-connection.php');

    if (isset($_POST['action']) && $_POST['action']=='register') {
        $errors = array();
        if (empty($_POST['first_name'])) {
            $errors[] = 'First name cannot be empty';
        }
        elseif (!ctype_alpha($_POST['first_name'])) {
            $errors[] = 'First name must only contain letters';
        }
        elseif (strlen($_POST['first_name']) < 2) {
            $errors[] = 'First name must be at least 2 characters';
        }
        if (empty($_POST['last_name'])) {
            $errors[] = 'Last name cannot be empty';
        }
        elseif (!ctype_alpha($_POST['last_name'])) {
            $errors[] = 'Last name cannot contain numbers';
        }
        elseif (strlen($_POST['last_name']) < 2) {
            $errors[] = 'Last name must be at least 2 characters';
        }
        if (isset($_POST['email']) && $_POST['email'] != null) {
            if( ! filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $errors[] = "This email is not valid";
            }
        }
        else {
            $errors[] = "Email cannot be empty";
        }
        if (strlen($_POST['password']) < 8) {
            $errors[] = 'Password must be at least 8 characters long';
        }
        if ($_POST['conf_pass'] != $_POST['password']) {
            $errors[] = 'Confirm password do not match the password';
        }
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            header('Location: index.php');
        }
        else {
            $first_name = mysqli_real_escape_string($connection, $_POST['first_name']);
            $last_name =
            mysqli_real_escape_string($connection, $_POST['last_name']);
            $email = mysqli_real_escape_string($connection, $_POST['email']);
            $password = mysqli_real_escape_string($connection, $_POST['password']);
            $salt = bin2hex(openssl_random_pseudo_bytes(22));
            $encrypted = md5($password . '' . $salt);
            $query = "INSERT INTO users (first_name, last_name, email, password, salt, created_at, updated_at) VALUES ('{$first_name}', '{$last_name}', '{$email}', '{$encrypted}', '{$salt}', NOW(), NOW())";
            if (run_mysql_query($query)) {
                $_SESSION['message'] = "You are successfully registered!";
            }
            else {
                $_SESSION['message'] = "Failed to register account";
            }
            header('Location: success.php');
        }
    }

    if (isset($_POST['action']) && $_POST['action'] == 'login') {
        $errors = array();
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);
        $query = "SELECT * FROM users WHERE email = '{$email}'";
        $user = fetch_record($query);
        if (!empty($user)) {
            $encrypted = md5($password . '' . $user['salt']);
            if ($user['password'] == $encrypted) {
                $_SESSION['message'] = "Successfully logged in!";
                header('Location: success.php');
            }
            else {
                $errors[] = "Invalid password";
                $_SESSION['errors'] = $errors;
                header('Location: index.php');
            }
        }
        else {
            $errors[] = "Invalid email";
            $_SESSION['errors'] = $errors;
            header('Location: index.php');        }
    }
 ?>
