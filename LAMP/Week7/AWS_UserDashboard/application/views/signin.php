<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel = "stylesheet" type = "text/css"
   href = "<?php echo base_url(); ?>css/Portfolio.css">
        <style media="screen">
            .container {
                padding: 30px;
                margin: 70px;
                background-color: white;
                border-radius: 10px;
                background-color: rgba(0,0,0, 0.60);
                border: white 3px dashed;
            }
            .button {
                margin: 10px;
                padding-left: 133px;
            }
            .title {

                color: white;
                margin: 10px 0px;;
            }
            .red {
                color: red;
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
      <nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">User Dashboard</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#"></a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#">Sign in</a></li>

            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
      <div class="container">
          <h3 class="title">Login</h3>
          <div class="red">
              <?php echo $this->session->flashdata('login'); ?>

              <?php echo form_open('/main/login'); ?>
          </div>


            <h5 class="title">Email Address:</h5>
            <input type="text" name="login_email" value="" size="27">

            <h5 class="title">Password</h5>
            <input type="password" name="login_pass" value="" size="27">

            <div class="button"><input class="btn-success" type="submit" name="login" value="Sign In"></div>

            </form>
            <a href="reg_page">Don't have an account? Register.</a>
      </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
