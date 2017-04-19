<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ninja Gold</title>
    <style media="screen">
        .place {
            border: black 2px solid;
            display: inline-block;
            width: 177px;
            padding: 11px;
            text-align: center;
            margin: 11px;
        }
        .counter {
            margin: 22px;
            text-align: left;
        }
        body {
            text-align: center;
        }
        .textbox {
            text-align: left;
            width:787px;
            border: black 2px solid;
            margin-left: 33px;
        }
        p#red {
            margin: 0;
            padding: 0;
            color: red;
            display: inline-block;
        }
        p#green {
            margin: 0;
            padding: 0;
            color: green;
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
      <h1 class="jumbotron">Ninja Gold Game</h1>
      <div class="counter">
          Your Gold:
          <input type="text" name="" value="<?= $totalgold ?>">
      </div>
      <div class="place">
          <h3>Farm</h3>
          <p>(earns 10-20 gold)</p>
          <form class="" action="process_money" method="post">
              <input type="submit" name="" value="Find Gold!">
              <input type="hidden" name="location" value="farm">
          </form>
      </div>
      <div class="place">
          <h3>Cave</h3>
          <p>(earns 5-10 gold)</p>
          <form class="" action="process_money" method="post">
              <input type="submit" name="" value="Find Gold!">
              <input type="hidden" name="location" value="cave">
          </form>
      </div>
      <div class="place">
          <h3>House</h3>
          <p>(earns 2-5 gold)</p>
          <form class="" action="process_money" method="post">
              <input type="submit" name="" value="Find Gold!">
              <input type="hidden" name="location" value="house">
          </form>
      </div>
      <div class="place">
          <h3>Casino</h3>
          <p>(earns/takes 0-50 gold)</p>
          <form class="" action="process_money" method="post">
              <input type="submit" name="" value="Find Gold!">
              <input type="hidden" name="location" value="casino">
          </form>
      </div>
      <p class="counter">Activities:</p>
      <div class="textbox" style="overflow:scroll; height:123px;">
<?= $messages ?></div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
