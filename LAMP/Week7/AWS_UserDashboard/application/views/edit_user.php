<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Profile</title>
    <link rel = "stylesheet" type = "text/css"
    href = "<?php echo base_url(); ?>css/Portfolio.css">
    <style media="screen">
    .container {
        margin: 70px;
        background-color: rgba(0,0,0, 0.60);
        padding: 77px;
        border-radius: 10px;
        border: white 3px dashed;
    }
    .title {
        color: white;
    }
    input {
        color: black;
    }
        .box {
            margin:20px;
            display: inline-block;
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
      <nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/dashboard">User Dashboard</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav">
              <li class="active"><a href="/dashboard">Dashboard</a></li>
              <li><a href="#">Profile</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="/">Log off</a></li>

            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
      <div class="container">
          <h3 class="title">Edit profile</h3>
          <div class="box">
              <h4 class="title">Edit Information</h4>
              <form class="" action="/edit_user_info/<?=$users['user_id']?>" method="post">
                  <p class="title">Email Address:</p>
                  <input type="text" name="email" value="<?=$users['user_email']?>" placeholder="">
                  <p class="title">First Name:</p>
                  <input type="text" name="first_name" value="<?=$users['user_first']?>" placeholder="">
                  <p class="title">Last Name:</p>
                  <input type="text" name="last_name" value="<?=$users['user_last']?>" placeholder="">
                  <input class="btn-success" type="submit" name="" value="Save">
              </form>
          </div>
          <div class="box">
              <p style="color: red;">
                  <?php echo $this->session->flashdata('password'); ?>

              </p>
              <p style="color: blue;">
                  <?php echo $this->session->flashdata('success'); ?>

              </p>
              <h4 class="title">Change Password</h4>
              <form class="" action="/users/edit_pass/<?=$users['user_id']?>" method="post">
                  <p class="title">Old Password:</p>
                  <input type="password" name="old_pass" value="">
                  <p class="title">New Password:</p>
                  <input type="password" name="new_pass" value="">
                  <p class="title">Password Confirmation:</p>
                  <input type="password" name="conf_pass" value="">
                  <input class="btn-success" type="submit" name="" value="Update Password">
              </form>
          </div>
          <div class="box">
              <h4 class="title">Edit description</h4>
              <form class="" action="/users/edit_desc/<?=$users['user_id']?>" method="post">
                  <textarea name="description" rows="8" cols="80" placeholder="<?=$users['description']?>"></textarea>
                  <input class="btn-success" type="submit" name="" value="Save">
              </form>
          </div>
      </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
