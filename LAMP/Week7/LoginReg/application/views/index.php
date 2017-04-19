<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login and Registration page</title>

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
      <div class="box">
          <h3>Login</h3>
          <?php echo $this->session->flashdata('login'); ?>

          <?php echo form_open('/users/login'); ?>

            <h5>Email:</h5>
            <input type="text" name="login_email" value="" size="25">

            <h5>Password</h5>
            <input type="password" name="login_pass" value="" size="25">

            <div class=""><input type="submit" name="login" value="Login"></div>

            </form>
      </div>
      <div class='box'>
          <h3>Register</h3>
          <?php echo $this->session->flashdata('registration'); ?>

          <?php echo validation_errors(); ?>

          <?php echo form_open('/users/validate'); ?>

            <h5>First Name:</h5>
            <input type="text" name="first_name" value="" size="25" />

            <h5>Last Name:</h5>
            <input type="text" name="last_name" value="" size="25" />

            <h5>Email Address</h5>
            <input type="text" name="email" value="" size="25" />

            <h5>Password</h5>
            <input type="password" name="password" value="" size="25" />

            <h5>Confirm Password</h5>
            <input type="password" name="passconf" value="" size="25" />

            <div><input type="submit" name="register" value="Register" /></div>

            </form>
      </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
