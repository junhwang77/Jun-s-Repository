<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cart</title>

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
      <h3>Check Out</h3>
      <table class="table table-striped">

          <thead>
              <tr>
                  <th>Qty</th>
                  <th>Description</th>
                  <th>Price</th>
              </tr>
          </thead>
          <tbody>
              <?php
              if (isset($items)) {
                  foreach ($items as $item){
                      echo "<tr>
                                <td>{$item['qty']}</td>
                                <td>{$item['name']}</td>
                                <td>{$item['price']}</td>
                                <td><form class='' action='destroy' method='post'>
                                    <input type='submit' name='' value='Delete'>
                                    <input type='hidden' name='item' value='{$item['name']}'>
                                </form></td>
                            </tr>";
                        $prices[] = $item['price'];
                  }
                          echo "<tr>
                          <th></th>
                          <th>Total</th>
                          <th>".array_sum($prices)."</th>
                          </tr>";
                    }    ?>
                </tbody>
            </table>
      <h4>Billing Info</h4>
      <form class="" action="index.html" method="post">
          <p>Name:</p>
          <input type="text" name="name" value="">
          <p>Address:</p>
          <input type="text" name="address" value="">
          <p>Card #:</p>
          <input type="text" name="card" value=""><br>
          <input type="submit" name="" value="Order">
      </form>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
