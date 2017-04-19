<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Users page</title>

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
              <li><a href="/books/add">Add Book and Review</a></li>
              <li><a href="/">Logout</a></li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    <div class="container-fluid">
        <h2>User Alias: <?= $user[0]['first_name']; ?></h2>
        <h4>Name: <?= $user[0]['first_name'];?> <?= $user[0]['last_name'];?> </h4>
        <h4>Email: <?= $user[0]['email']; ?></h4>
        <h4>Total Reviews: <?= count($user); ?> </h4>
    </div>
    <div class="container-fluid">
        <h3>Posted Reviews on the folllowing books</h3>
        <?php if (isset($user)) {
            $arr = array();
            foreach ($user as $use) {
                $arr[]="<a href='/books/{$use['book_id']}'>{$use['title']}</a><br />";
            }
            $unique_title = array_unique($arr);
            foreach ($unique_title as $book) {
                echo $book;
            }
        } ?>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
