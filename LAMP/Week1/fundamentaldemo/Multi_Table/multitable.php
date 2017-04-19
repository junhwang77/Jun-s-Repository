<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="css/stylesheet.css">
    </head>
    <body>
        <table>
            <tr>
                <td></td>
                <?php for ($i=1; $i < 10; $i++)
                { ?>
                    <td class="outrow"><?php echo $i; ?></td>
                <?php } ?>
            </tr>
            <?php for ($i=1; $i < 10; $i++)
            { ?>
            <tr <?php if ($i%2==1) {?>
                class="grey"
                <?php } ?>>
                <td class="outrow"><?php echo $i; ?></td>
                <?php for ($j=1; $j < 10; $j++)
                { ?>
                    <td><?php echo $i*$j; ?></td>
                <?php } ?>
            </tr>
            <?php } ?>
        </table>
    </body>
</html>
