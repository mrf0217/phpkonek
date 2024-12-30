<?php

require 'konekphp.php';
$query = "select * from campaign";
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
            <td>nama event</td>
            <td>tempat</td>
            <td>nomor yang bisa di hubungi</td>
            <td>kondisi</td>
            <td>gambar</td>
        </tr>
        <?php
        $i = 1;
        $rows = mysqli_query($connection, "SELECT * FROM campaign")
        ?>

        <?php foreach( $rows as $row ): ?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $row["nama"] ?></td>
            <td><?php echo $row["tempat"] ?></td>
            <td><?php echo $row["telepon"] ?></td>
            <td><?php echo $row["kondisi"] ?></td>
            <td> <img src="img2/<?php echo $row['gambar'] ?>" width= 200 title=""></td>
        </tr>
        <?php endforeach; ?>
    </table>  
    <a href="home.php">home</a> 
    <a href="kampanya.php">new campaign</a>  
    <a href="editkampanye.php">edit kampanye</a>

</body>
</html>