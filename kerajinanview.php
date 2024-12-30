<?php

require 'konekphp.php';
$query = "select * from komunitas";
$result = mysqli_query($connection, $query);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
</head>
<body>
    
    <table>
        <tr>
            <td>#</td>
            <td>bentuk kerajinan</td>
            <td>bahan</td>
            <td>harga</td>
            <td>foto</td>
        </tr>
        <?php
        $i = 1;
        $rows = mysqli_query($connection, "SELECT * FROM kerajinan")
        ?>

        <?php foreach( $rows as $row ): ?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $row["bentukKerajinan"] ?></td>
            <td><?php echo $row["bahan"] ?></td>
            <td><?php echo $row["harga"] ?></td>
            <td> <img src="img/<?php echo $row['foto'] ?>" width= 200 title=""></td>
        </tr>
        <?php endforeach; ?>
    </table>  
    <a href="home.php">new item</a> 
    <a href="komunitas.php">new komunitas</a>  

</body>
</html>