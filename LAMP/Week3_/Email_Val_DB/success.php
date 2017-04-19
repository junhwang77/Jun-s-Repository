<?php session_start();
    require("new-connection.php");
 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="css/stylesheet.css">
    </head>
    <body>
        <div class="message">
            <h3><?php echo $_SESSION['message'] ?></h3>
        </div>
        <form class="" action="process.php" method="post">
            <input type="submit" name="" value="Add another email">
            <input type="hidden" name="action" value="replay">
        </form>
        <h2>List of registered emails</h2><hr>
        <?php
            $query = "SELECT * FROM emails ORDER BY created_at DESC";
            $results = fetch_all($query);
            foreach($results as $row)
            {
        ?>
              <h3>
                  <?= $row['email']; ?>
                  <?= date_format(date_create($row['created_at']),"d/m/Y h:ia");
                  ?>
              </h3>
              <form class="" action="process.php" method="post">
                  <input type="submit" name="" value="Delete">
                  <input type="hidden" name="action" value="delete">
                  <input type="hidden" name="email" value="<?= $row['email'] ?>">
                  <input type="hidden" name="id" value="<?= $row['id'] ?>">
              </form><br>
        <?php
            }
         ?>
    </body>
</html>
