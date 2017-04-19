<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <style media="screen">
        .box{
            display: inline-block;
            margin: 0px 50px;
            vertical-align: top;
        }
    </style>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
      <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav">
                <li><h3>Book Review App!</h3></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="/books">Home</a></li>
              <li><a href="/">Logout</a></li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
<div class="box">
    <div class="">
        <h2><?= $reviews[0]['title'] ?></h2>
        <h4>Author: <?= $reviews[0]['author'] ?></h4>

        <h3>Reviews:</h3>
        <?php if (isset($reviews)) {
            foreach ($reviews as $review) {
                echo "<hr /><p>Rating: {$review['rating']}</p>
                <p><a href='/user/{$review['user_id']}'>{$review['first_name']}</a> says: {$review['comment']}</p>
                <p>Posted on {$review['created_at']}</p>";
                if ($review['user_id']==$logged_in['user_id']) {
                    echo "<a href='/review/delete/{$review['book_id']}/{$review['id']}'>Delete this Review</a>";
                };
            }
        } ?>
    </div>
</div>
<div class="box">
    <h3>Add a Review</h3>
    <form class="" action="/books/create" method="post">
        <input type="hidden" name="book_id" value="<?=$reviews[0]['book_id']?>">
        <input type="hidden" name="user_id" value="<?=$logged_in['user_id']?>">
        <textarea name="comment" rows="8" cols="60"></textarea>
        <p>Rating: <select class="" name="rating">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select> Stars</p>
        <input type="submit" name="" value="Submit Review">
    </form>
</div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
