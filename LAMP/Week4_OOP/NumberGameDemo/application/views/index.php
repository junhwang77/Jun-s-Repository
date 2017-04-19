<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Great Number Game</title>
        <style media="screen">
            body{
                text-align: center;
            }
            .red{
                background-color: red;
                border: 1px solid black;
                width: 100px;
                padding: 50px;
                display: inline-block;
            }
            .green{
                background-color: green;
                border: 1px solid black;
                width: 100px;
                padding: 50px;
                display: inline-block;
            }
        </style>
    </head>
    <body>
        <div id="container">
            <?= $number ?>
            <h1>Welcom to the Game</h1>
            <p>I am thinking of a number between 1 and 100</p>
            <p>Take a guess!</p>
            <?php
                if ($this->session->flashdata('result')) {
            ?>
                    <p class="red"><?= $this->session->flashdata('result') ?></p>
            <?php
                }
              ?>
              <?php
                  if ($this->session->flashdata('correct')) {
              ?>
                      <p class="green"><?= $this->session->flashdata('correct') ?></p>
                      <form class="" action="reset" method="post">
                          <input type="submit" name="" value="Play Again">
                      </form>
              <?php
                  }
                ?>
            <form class="" action="check" method="post">
                <input type="text" name="guess" value="">
                <input type="submit" name="" value="Submit">
            </form>
        </div>
    </body>
</html>
