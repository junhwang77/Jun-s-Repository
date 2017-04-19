<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <style media="screen">
        .lab {
            display: inline-block;
            vertical-align: top;
        }
        .inpu {
            display: inline-block;
            width: 500px;
        }
        .inp {
            width: 450px;
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
      <?php var_dump($this->session->all_userdata()); ?>
      <h3>Add a new course</h3>
      <p><?php echo ($this->session->flashdata('errors') != false) ? $this->session->flashdata('errors') : ""; ?></p>
      <div class="lab">
          <p>Name:</p>
          <p>Description:</p>
      </div>
      <div class="inpu">
          <form class="inp" action="courses/add" method="post">
              <input type="text" name="name" value="">
              <textarea name="description" rows="8" cols="60"></textarea>
              <input type="submit" name="" value="Add">
              <input type="hidden" name="id" value="<?php  echo $this->session->userdata['id']; ?>">
          </form>
      </div>
      <div class="">
          <h3>Courses</h3>
          <table class="table table-bordered">
            <thead>
                <th>Course Name</th>
                <th>Description</th>
                <th>Date Added</th>
                <th>Actions</th>
            </thead>
            <tbody>
                <?php $courses = $this->session->userdata('courses');
                 ($this->session->userdata('courses') != false);
                for ($i = count($courses); $i > 0; $i--)
                {
                    echo $courses[$i-1]['string'];
                }
                ?>
            </tbody>
          </table>
      </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
