<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title>Survey Form</title>
        <?php
            session_start();
            echo session_id();
         ?>
    </head>
    <body>

        <form class="" action="result.php" method="post">
            <p>Your Name: <input type="text" name="name" value=""></p>
            <p>Dojo Location:
                <select class="" name="location">
                    <option value="Seattle">Seattle</option>
                    <option value="Online">Online</option>
                </select>
            </p>
            <p>Favorite Language:
                <select class="" name="language">
                    <option>Javascript</option>
                    <option>PHP</option>
                </select>
            </p>
            <p>
                Comment:
                <textarea name="comment" rows="8" cols="80"></textarea>
            </p>
            <input type="submit" name="" value="submit">
        </form>
    </body>
</html>
