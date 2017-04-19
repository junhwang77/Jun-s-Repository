<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Products</title>
    <style media="screen">
        #input{
            width: 30px;
            margin-left: 20px;
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
      <h2>Products</h2>
      <a href="#">Your Cart ( )</a>
      <table>
          <thead>
              <tr>
                  <th>Description</th>
                  <th>Price</th>
                  <th>Qty</th>
              </tr>
          </thead>
          <tbody>
              <tr>
                  <td>Dojo Shirt</td>
                  <td>$19.99</td>
                  <form class="" action="add" method="post">
                      <td><input id="input" type="number" name="qty" value="" placeholder="0"></td>
                      <td><input type="submit" name="" value="Buy"></td>
                      <input type="hidden" name="name" value="Dojo Shirt">
                      <input type="hidden" name="price" value="19.99">
                  </form>
              </tr>
              <tr>
                  <td>Dojo Cup</td>
                  <td>$39.99</td>
                  <form class="" action="add" method="post">
                      <td><input id="input" type="number" name="qty" value="" placeholder="0"></td>
                      <td><input type="submit" name="" value="Buy"></td>
                      <input type="hidden" name="name" value="Dojo Cup">
                      <input type="hidden" name="price" value="39.99">
                  </form>
              </tr>
          </tbody>
      </table>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
