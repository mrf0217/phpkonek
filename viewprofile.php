<?php

require 'konekphp.php';
$query = "select * from profile";
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
            <td>nama depan</td>
            <td>nama belakang</td>
            <td>gender</td>
            <td>alamat</td>
        </tr>
        <?php
        $i = 1;
        $rows = mysqli_query($connection, "SELECT * FROM registration")
        ?>

        <?php foreach( $rows as $row ): ?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $row["firstName"] ?></td>
            <td><?php echo $row["lastName"] ?></td>
            <td><?php echo $row["gender"] ?></td>
            <td><?php echo $row["alamat"] ?></td>
        <?php endforeach; ?>
    </table>  
    <a href="profile.php">new profile</a> 
    <a href="home.php">new item</a> 
    <a href="komunitas.php">new komunitas</a>  

</body>
</html>