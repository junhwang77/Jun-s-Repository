<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <?php
        ini_set('auto_detect_line_endings', true);

        $file = fopen('CSV/us-500.csv', 'r') or die('Unable to open file!');

        $returnVal = array();
        $header = null;

        while(($row = fgetcsv($file)) !== false){
            if($header === null){
                $header = $row;
                continue;
            }
            $newRow = array();
            for($i = 0; $i<count($row); $i++){
                $newRow[$header[$i]] = $row[$i];
            }
            $returnVal[] = $newRow;
        }

        fclose($file);
        ini_set('auto_detect_line_endings', false);

        // $returnVal now contains the contents of the CSV file
        ?>
        <table>
        <tr>
        <?php
        foreach ($returnVal[0] as $key => $value) {
            ?><th> <?php echo $key ?> </th>
        <?php
        }
        ?>
        </tr>
        <?php
        for ($i=1; $i < count($returnVal); $i++) {
        ?>
        <tr>
        <?php
        foreach ($returnVal[$i] as $key => $value) {
        ?>  <td> <?php echo $value ?> </td>
        <?php
        }
        ?>
        </tr>
        <?php
        }
        ?>
    </table>
    </body>
</html>
