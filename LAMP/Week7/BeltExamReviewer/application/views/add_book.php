<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Book page</title>

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
      <h1>Add a Book Title and a Review</h1>
      <form class="" action="/books/create" method="post">
          <input type="hidden" name="user_id" value="<?php $logged_in=$this->session->userdata('logged_in'); echo $logged_in['user_id']; ?>">
          <h4>Book Title:</h4>
          <input type="text" name="title" value="">
          <h4>Author:</h4>
          <p>choose from the list:</p>
          <select class="" name="">
              <!-- <?php  ?> -->
          </select>
          <p>Or add a new author:</p>
          <input type="text" name="author" value="">
          <h4>Review:</h4>
          <textarea name="comment" rows="8" cols="80"></textarea>
          <h4>Rating:</h4>
          <select class="" name="rating">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
          </select>
          <p>stars</p>
          <input type="submit" name="" value="Add Book and Review">
      </form>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
