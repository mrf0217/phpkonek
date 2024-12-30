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
            <?php
            while ($row = mysqli_fetch_assoc($result)){

            ?>
                <td>
                    <?php echo $row['no'] ?>
                    <?php echo $row['namaKomunitas'] ?>
                    <?php echo $row['kontak'] ?>
                    <?php echo $row['alamat'] ?>
                </td>
        </tr>
        <?php
            }
        ?>
    </table>  
    <a href="home.php">new item</a> 
    <a href="komunitas.php">new komunitas</a>  
    <a href="editkampanye.php">edit kampanye</a>

</body>
</html>