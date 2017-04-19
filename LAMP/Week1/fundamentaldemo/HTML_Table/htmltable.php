<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Array Table</title>
        <link rel="stylesheet" href="css/stylesheet.css">
    </head>
    <body>
        <?php
        $users = array(
                    array('first_name' => 'Michael', 'last_name' => 'Choi'),
                    array('first_name' => 'John', 'last_name' => 'Supsupin'),
                    array('first_name' => 'Mark', 'last_name' => 'Guillen'),
                    array('first_name' => 'KB', 'last_name' => 'Tonel'),
                    array('first_name' => 'Michael', 'last_name' => 'Choi'),
                    array('first_name' => 'John', 'last_name' => 'Supsupin'),
                    array('first_name' => 'Mark', 'last_name' => 'Guillen'),
                    array('first_name' => 'KB', 'last_name' => 'Tonel'),
                    array('first_name' => 'Michael', 'last_name' => 'Choi'),
                    array('first_name' => 'John', 'last_name' => 'Supsupin'),
                    array('first_name' => 'Mark', 'last_name' => 'Guillen'),
                    array('first_name' => 'KB', 'last_name' => 'Tonel'),
                    array('first_name' => 'Mark', 'last_name' => 'Guillen'),
                    array('first_name' => 'KB', 'last_name' => 'Tonel'),
                );
         ?>
         <table>
             <tr>
                 <th>User #</th>
                 <th>First Name</th>
                 <th>Last Name</th>
                 <th>Full Name</th>
                 <th>Full Name in upper case</th>
                 <th>Length of full name</th>
             </tr>
             <?php
                for ($i=1; $i <= count($users) ; $i++)
                {
                    if ($i%5==0&&$i!=1) {
                        echo '<tr class="grey">';
                    }
                    else {
                        echo '<tr>';
                    }
                    $j=$i-1;
                    echo "<th>{$i}</th>";
                    echo "<td>{$users[$j]['first_name']}</td>";
                    echo "<td>{$users[$j]['last_name']}</td>";
                    echo "<td>{$users[$j]['first_name']} {$users[$j]['last_name']}</td>";
                    $str = $users[$j]['first_name'].' '.$users[$j]['last_name'];
                    $upper = strtoupper($str);
                    echo "<td>{$upper}</td>";
                    $num = strlen(preg_replace('/[^a-zA-Z]/', '', $str));
                    echo "<td>{$num}</td>";
                    echo '</tr>';
                }
              ?>
         </table>
    </body>
</html>
