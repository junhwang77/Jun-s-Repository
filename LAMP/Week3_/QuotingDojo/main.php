<?php
    session_start();
    require_once('new-connection.php');
 ?>
 <!DOCTYPE html>
 <html>
     <head>
         <meta charset="utf-8">
         <title>List of Quotes</title>
     </head>
     <body>
         <p><?php if (isset($_SESSION['message'])) {
                        echo $_SESSION['message'];
         }  ?></p>
         <h3>Here are the awesome quotes!</h1>
         <form class="" action="process.php" method="post">
             <input type="submit" name="" value="Add another quote">
             <input type="hidden" name="action" value="replay">
         </form>
         <?php
            $query = "SELECT * FROM quotes ORDER BY created_at DESC";
            $results = fetch_all($query);
            foreach ($results as $row) {
         ?>
                <div class="">
                    <p>"<?= $row['quote']; ?>"</p>
                    <p>-<?= $row['author']; ?> at <?= date_format(date_create($row['created_at']), "h:ia d/m/Y");?></p>
                    <form class="" action="process.php" method="post">
                        <input type="submit" name="" value="Delete">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="id" value="<?= $row['id']; ?>">
                        <input type="hidden" name="author" value="<?= $row['author']; ?>">
                    </form>
                    <hr>
                </div>
        <?php
            }
          ?>
     </body>
 </html>
