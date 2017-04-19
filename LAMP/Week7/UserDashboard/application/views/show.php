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
            padding: 77px;
            border-radius: 10px;
            border: white 3px dashed;
        }
        .title {
            color: white;
        }
        .comment{
            border: white dashed 1px;
            width: 442px;
            height: 70px;
            margin: 0px 0px 20px 0px;

        }
        .comment_box{
            margin-top: 10px;
            margin-left: 145px;
        }
        .message{
            border: white dashed 1px;
            width: 582px;
            height: 100px;
            display: inline-block;
        }
        p{
            /*display: inline-block;*/
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
              <li><a href="/signin">Log off</a></li>

            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
      <div class="container">
          <h2 class="title"><?=$user['first_name'];?> <?=$user['last_name'];?></h2>
          <table class="table">
            <tbody>
                <tr>
                    <td class="title">Registered at:</td>
                    <td class="title"><?php $date=date_create($user['created_at']); echo date_format($date, 'F jS Y');?></td>
                </tr>
                <tr>
                    <td class="title">User ID:</td>
                    <td class="title">#<?=$user['id']?></td>
                </tr>
                <tr>
                    <td class="title">Email address:</td>
                    <td class="title"><?=$user['email']?></td>
                </tr>
                <tr>
                    <td class="title">Description:</td>
                    <td class="title"><?=$user['description']?></td>
                </tr>
            </tbody>
          </table>

          <h3 class="title">Leave a message for <?=$user['first_name']?></h3>
          <form class="" action="/message/add/<?=$user['id']?>/<?=$logged_in['user_id']?>" method="post">
              <textarea name="message" rows="6" cols="80"></textarea>
              <input class="btn-success" type="submit" name="" value="Post">
          </form>
          <?php if (isset($messages)) {
              foreach ($messages as $message)
              {
                  echo "<div class='message_box'>
                      <em class='title'>{$message['first_name']} {$message['last_name']}</em>
                      "?>
                      <p class="title"><?= date_format(date_create($message['created_at']), 'F jS Y')?></p>

                      <?php echo "<div class='title message'>{$message['message']}</div><a class='btn-danger' href='/messages/destroy_message/{$message['id']}"?>/<?=$user['id']?> <?php echo "'>Delete</a>" ?>
                      <?php $comments = $this->Message->comments_by_message_id($message['id']) ?>
                      <div class='comment_box'>
                      <?php if (isset($comments)) {
                          foreach ($comments as $comment) {
                              echo "<em class='title'>{$comment['first_name']} {$comment['last_name']}</em>
                                  "?>
                                  <p class="title"><?= date_format(date_create($comment['created_at']), 'F jS Y')?></p>

                                  <?php echo "<div class='title comment'>{$comment['comment']}</div>";
                                 }
                      }?>
                      <?php echo "<form class='' action='/comment/add/"?><?=$user['id']?>/<?=$message['id']?>/<?=$logged_in['user_id']?>'
                          <?php echo "method='post'>
                          <textarea name='comment' rows='4' cols='60'></textarea>
                          <input class='btn-success' type='submit' name='' value='Comment'>
                      </form>
                  </div>";
              }
          } ?>

      </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
