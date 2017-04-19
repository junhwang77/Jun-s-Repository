<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome Page</title>
    <link rel = "stylesheet" type = "text/css"
   href = "<?php echo base_url(); ?>css/Portfolio.css">
    <style media="screen">
        .jumbo {
            padding: 0px 40px;
            margin: 100px 0px 50px 0px;
            background-color: rgba(0,0,0, 0.60);
            color: white;
            padding: 77px;
            border-radius: 10px;
            border: white 3px dashed;
        }
        .mini {
            background-color: white;
            margin: 50px 0px 100px 0px;
            border-radius: 10px;
            background-color: rgba(0,0,0, 0.60);
            color: white;
            border: white 3px dashed;

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
              <li><a href="#"></a></li>

            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
      <div class="wrapper">
           <h1 id="name">Jun Hwang</h1>
           <img id="face" src="css/Portfolio/Newphoto1.jpg" alt="profile picture" />
           <h4 id="description">Hello, my name is Jun, and I received a B.S. in Animal Sciences from UC Davis. I have found my new passion in programming through my friend who introduced me to CS50x Harvard class that opened my eyes to the world of programming, and its vast creative potential.</h4>
           <div class="links">
               <div class="container">
                   <div class="row">
                       <a class="btn btn-primary view-pdf" href="css/Portfolio/JunResume2017.pdf"><img src="css/Portfolio/glyphicons-248-note.png" alt="resume" /></a>
                       <a id="abc" href="https://www.linkedin.com/in/jun-hwang-b8316326
                       "><img src="css/Portfolio/In-2C-59px-R.png" alt="linkedIn
                       " /></a>
                       <a href="https://github.com/junhwang77"><img src="css/Portfolio/GitHub-Mark-Light-64px.png" alt="GitHub" /></a>
                   </div>
               </div>
           </div>
       </div>
      <div class="container">
          <div class="jumbo">
              <h1>User Dashboard Project</h1>
              <p></p>
              <p><a class="btn btn-primary btn-lg" href="signin" role="button">Start</a></p>
          </div>
          <div class="container-fluid">
              <div class="row">
                  <div class="mini col-xs-6 col-md-4">
                      <h3>Manage Users</h3>
                      <p>Using this application, you will be able to add, remove, and edit users for the application.</p>
                  </div>
                  <div class="mini col-xs-6 col-md-4">
                      <h3>Leave messages</h3>
                      <p>Users will be able to leave a message to another user using this application.</p>
                  </div>
                  <div class="mini col-xs-6 col-md-4">
                      <h3>Edit User Information</h3>
                      <p>Admins will be able to edit another user's information (email addressm first name, last name, etc).</p>
                  </div>
              </div>
          </div>
      </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type = 'text/javascript' src = "<?php echo base_url();
   ?>js/Portfolio.js"></script>
  </body>
</html>
