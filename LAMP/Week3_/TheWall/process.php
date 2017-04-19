<?php
    session_start();
    require_once 'new-connection.php';

// -------------------------- The LoginReg process ---------------------------

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
            $_SESSION['first_name'] = $first_name;
            if (run_mysql_query($query)) {
                $query = "SELECT * FROM users WHERE email = '{$email}'";
                $user = fetch_record($query);
                $_SESSION['id'] = $user['id'];
                $_SESSION['message'] = "You are successfully registered!";
                header('Location: main.php');
            }
            else {
                $errors[] = 'Failed to register account';
                $_SESSION['errors'] = $errors;
                header('Location: index.php');
            }

        }
    }

    if (isset($_POST['action']) && $_POST['action'] == 'login') {
        $errors = array();
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);
        $query = "SELECT * FROM users WHERE email = '{$email}'";
        $user = fetch_record($query);
        $_SESSION['id'] = $user['id'];
        $_SESSION['first_name'] = $user['first_name'];
        if (!empty($user)) {
            $encrypted = md5($password . '' . $user['salt']);
            if ($user['password'] == $encrypted) {
                $_SESSION['message'] = "Successfully logged in!";
                header('Location: main.php');
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
// ----------------------------- The Wall process ---------------------------
    if (isset($_POST['action']) && $_POST['action'] == 'add_message') {
        $errors = array();
        if (empty($_POST['message'])) {
            $errors[] = 'Message cannot be empty';
        }
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            header('Location: main.php');
        }
        else {
            $user_id = mysqli_real_escape_string($connection, $_POST['user_id']);
            $message = mysqli_real_escape_string($connection, $_POST['message']);
            $query = "INSERT INTO messages (user_id, message, created_at, updated_at) VALUES ('{$user_id}', '{$message}', NOW(), NOW())";
            if ($connection->query($query)) {
                $_SESSION['message'] = "Message posted!";
            }
            else {
                $_SESSION['message'] = "Failed to post message";
            }
            header('Location: main.php');
        }
    }

    if (isset($_POST['action']) && $_POST['action'] == 'add_comment') {
        $errors = array();
        if (empty($_POST['comment'])) {
            $errors[] = 'Comment cannot be empty';
        }
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            header('Location: main.php');
        }
        else {
            $user_id = mysqli_real_escape_string($connection, $_POST['user_id']);
            $message_id = mysqli_real_escape_string($connection, $_POST['message_id']);
            $comment = mysqli_real_escape_string($connection, $_POST['comment']);
            $query = "INSERT INTO comments (message_id, user_id, comment,  created_at, updated_at) VALUES ('{$message_id}', '{$user_id}',  '{$comment}', NOW(), NOW())";
            if ($connection->query($query)) {
                $_SESSION['message'] = "Comment posted!";
            }
            else {
                $_SESSION['message'] = "Failed to post comment";
            }
            header('Location: main.php');
        }
    }

    if (isset($_POST['action']) && $_POST['action'] == 'delete') {
        $datetime1 = new DateTime($_POST['created_at']);
        $datetime2 = new DateTime(date("Y-m-d H:i:s"));
        $interval = $datetime1->diff($datetime2);
        if ($interval-> format('%i') < 30) {
            $message_id = $_POST['message_id'];
            $query1 = "DELETE FROM comments WHERE message_id = '{$message_id}'";
            $query2 = "DELETE FROM messages WHERE id = '{$message_id}'";
            if ($connection->query($query1) && $connection->query($query2)) {
                $_SESSION['message'] = 'Message successfully deleted';
            }
            else {
                $_SESSION['message'] = 'Message failed to delete';
            }
            header('location: main.php');
        }
        else {
            $_SESSION['message'] = 'message cannot deleted, 30 min after posting';
        }

    }

    if (isset($_POST['action']) && $_POST['action'] == 'log_off') {
        session_destroy();
        header('Location: index.php');
        die();
    }
 ?>
