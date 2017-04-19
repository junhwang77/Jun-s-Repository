<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Destroy Page</title>
    <style media="screen">
        body {
            text-align: center;
        }
        .left {
            display: inline-block;
            margin: 20px;
            text-align: left;
        }
        .right {
            display: inline-block;
            text-align: left;
        }
        .but {
            display: inline-block;
            margin: 20px;
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
      <h3>Are you sure you want to delete the following course?</h3>
      <div class="left">
          <p>Name:</p>
          <p>Description:</p>
      </div>
      <div class="right">
          <p><?= $this->session->userdata('name'); ?></p>
          <p><?= $this->session->userdata('description'); ?></p>
      </div>
      <div class="">
          <form class="but" action="/" method="post">
              <input class="btn-default" type="submit" name="" value="No">
          </form>
          <form class="but" action="/remove/<?= $this->session->userdata('id'); ?>" method="post">
              <input class="btn-danger" type="submit" name="" value="Yes! I want to delete this">
          </form>
      </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
