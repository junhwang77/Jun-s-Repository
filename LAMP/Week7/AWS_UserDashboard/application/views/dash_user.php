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
        margin: 70px;
        background-color: rgba(0,0,0, 0.60);
        color: white;
        padding: 77px;
        border-radius: 10px;
        border: white 3px dashed;
    }
    .table {
        background-color: white;
        color: black;
    }
    .button {
        margin: 10px;
        padding-left: 133px;
    }
    .right {
        margin-left: 536px;
    }
    h3 {
        display: inline-block;
    }
    .table {
        margin-top: 10px;
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
              <li><a href="/users/edit">Profile</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="/">Log off</a></li>

            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
      <div class="container">
          <h3>All Users</h3>
          <table class="table table-bordered table-striped">
              <thead>
                  <tr>
                      <th>ID</th>
                      <th>Name (Message Board)</th>
                      <th>Email</th>
                      <th>created_at</th>
                      <th>user_level</th>
                  </tr>
              </thead>
              <tbody>
                 <?php if (isset($users)) {
                     foreach ($users as $user) {
                         echo "<tr>
                             <td>{$user['id']}</td>
                             <td><a href='/show/{$user['id']}'>{$user['first_name']} {$user['last_name']}</a></td>
                             <td>{$user['email']}</td>
                             <td>{$user['created_at']}</td>
                             <td>{$user['user_level']}</td>
                         </tr>";
                     }
                 }?>
              </tbody>
          </table>

      </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
