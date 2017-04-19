<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>product show page</title>
    <style media="screen">
        .left {
            display: inline-block;
            margin-right: 20px;
        }
        .right {
            display: inline-block;
            text-align: left;
        }
        a {
            display: inline-block;
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
      <h2>Product <?= $product['id']; ?></h2>
      <div class="left">
          <p>Name:</p>
          <p>Description:</p>
          <p>Price:</p>
      </div>
      <div class="right">
          <p><?= $product['name']; ?></p>
          <p><?= $product['description']; ?></p>
          <p>$ <?= $product['price']; ?></p>
      </div>
      <br /><a href="/products/edit/<?= $product['id']; ?>">Edit</a> | <a href="/">Back</a>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
