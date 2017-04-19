<?php
    session_start();
    require_once 'new-connection.php';
 ?>
 <!DOCTYPE html>
 <html>
     <head>
         <meta charset="utf-8">
         <title>Dashboard</title>
         <link rel="stylesheet" href="css/stylesheet.css">
     </head>
     <body>
         <h1>CodingDojo Wall</h1>
         <form class="" action="process.php" method="post">
             <input type="submit" name="" value="Log off">
             <input type="hidden" name="action" value="log_off">
         </form>
         <?php
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
            if (isset($_SESSION['errors'])) {
                foreach ($_SESSION['errors'] as $error) {
                    echo $error . '<br>';
                }
                unset($_SESSION['errors']);
            }
          ?>
         <h6>Welcome, <?= $_SESSION['first_name']; ?></h6>
         <h4>Post a message</h4>
         <form class="" action="process.php" method="post">
             <textarea name="message" rows="8" cols="80"></textarea>
             <input type="submit" name="" value="Post a message">
             <input type="hidden" name="user_id" value="<?= $_SESSION['id'] ?>">
             <input type="hidden" name="action" value="add_message">
         </form>
         <?php
            $query = "SELECT users.first_name, users.last_name, messages.created_at, messages.message, messages.id FROM messages JOIN users ON messages.user_id = users.id ORDER BY messages.created_at DESC";
            $results = fetch_all($query);
            foreach ($results as $row) {
        ?>
                <div class="message">
                    <h5><?= $row['first_name'] . $row['last_name'] . '-' . date_format(date_create($row['created_at']), "h:ia d/m/Y"); ?> </h5>
                    <p><?= $row['message'] ?></p>
                    <form class="" action="process.php" method="post">
                        <input type="submit" name="" value="Delete Message">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="created_at" value="<?= $row['created_at'] ?>">
                        <input type="hidden" name="message_id" value="<?= $row['id'] ?>">
                    </form>
                </div>
                <?php
                    $query = "SELECT users.first_name, users.last_name, messages.id, comments.created_at, comments.comment FROM users JOIN comments ON comments.user_id = users.id JOIN messages ON comments.message_id = messages.id WHERE messages.id = '{$row['id']}'";
                    $results = fetch_all($query);
                    foreach ($results as $row) {
                ?>
                        <div class="comment">
                            <h5><?= $row['first_name'] . $row['last_name'] . '-' . date_format(date_create($row['created_at']), "h:ia d/m/Y"); ?> </h5>
                            <p><?= $row['comment'] ?></p>
                        </div>
                <?php
                    }
                 ?>
                    <div class="comment">
                        <h6>Post a comment</h6>
                        <form class="" action="process.php" method="post">
                            <textarea name="comment" rows="5" cols="50"></textarea>
                            <input type="submit" name="" value="Post a comment">
                            <input type="hidden" name="user_id" value="<?= $_SESSION['id'] ?>">
                            <input type="hidden" name="message_id" value="<?= $row['id'] ?>">
                            <input type="hidden" name="action" value="add_comment">
                        </form>
                    </div>
        <?php
            }
          ?>
     </body>
 </html>
