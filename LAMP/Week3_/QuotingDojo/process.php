<?php
    session_start();
    require_once('new-connection.php');


    if (isset($_POST['action']) && $_POST['action'] == 'add') {
        $errors = array();
        if (empty($_POST['author'])) {
            $errors[] = 'Name field cannot be blank';
        }
        if (empty($_POST['quote'])) {
            $errors[] = 'Quote field cannot be blank';
        }
        if (count($errors) > 0) {
            $_SESSION['errors'] = $errors;
            header('Location: index.php');
        }
        else {
            $quote = mysqli_real_escape_string($connection,$_POST['quote']);
            $author = mysqli_real_escape_string($connection,$_POST['author']);
            $query = "INSERT INTO quotes (quote, author, created_at, updated_at) VALUES ('{$quote}', '{$author}', NOW(), NOW())";
            if ($connection->query($query) === TRUE) {
                $_SESSION['message'] = "The quote was successfully added!";
            }
            else {
                $_SESSION['message'] = "Failed to add quote";
            }
            header('Location: main.php');
        }
    }

    if (isset($_POST['action']) && $_POST['action'] == 'main') {
        header('Location: main.php');
    }

    if (isset($_POST['action']) && $_POST['action'] == 'delete') {
        $query = "DELETE FROM quotes WHERE id = '{$_POST['id']}'";
        if ($connection->query($query) === TRUE) {
            $_SESSION['message'] = "The quote by '{$_POST['author']}'; was successfully deleted";
            header('Location: main.php');
        }
        else {
            $_SESSION['message'] = "Failed to delete quote";
        }
    }

    if (isset($_POST['action']) && $_POST['action'] == 'replay') {
        session_destroy();
        header('Location: index.php');
    }
 ?>
