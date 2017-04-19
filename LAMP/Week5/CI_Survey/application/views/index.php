<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Input page</title>
        <style media="screen">
            body {
                text-align: center;
            }
            .container {
                border: solid 2px black;
                width: 311px;
                display: inline-block;
            }
            .label {
                text-align: left;
                display: inline-block;
            }
            .inputs {
                text-align: right;
                display: inline-block;
                vertical-align: top;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <form class="" action="process" method="post">
                <div class="label">
                    <p>Your Name:</p>
                    <p>Dojo Location:</p>
                    <p>Favorite Language:</p>
                </div>
                <div class="inputs">
                    <p><input class="input" type="text" name="name" value=""></p>
                    <p><select class="input" name="location">
                        <option value="Mountain View">Mountain View</option>
                        <option value="Berkeley">Berkeley</option>
                        <option value="Seattle">Seattle</option>
                        <option value="Silicon Valley">Silicon Valley</option>
                    </select></p>
                    <p><select class="input" name="language">
                        <option value="php">php</option>
                        <option value="JavaScript">JavaScript</option>
                        <option value="Python">Python</option>
                        <option value="C++">C++</option>
                    </select></p>
                </div>
                <p>Comment (optional):</p>
                <textarea name="comment" rows="8" cols="40"></textarea>
                <input type="submit" name="" value="Submit">
            </form>
        </div>
    </body>
</html>
