<?php

include("konekphp.php");

if (isset($_POST["submit"])) {
    $namaKomunitas = $_POST["namaKomunitas"];
    $kontak = (int)$_POST["kontak"];
    $alamat = $_POST["alamat"];

    if (isset($connection)) {
        $query = $connection->prepare("INSERT INTO komunitas (namaKomunitas, kontak, alamat) VALUES (?, ?, ?)");
        $query->bind_param("sis", $namaKomunitas, $kontak, $alamat);

        if ($query->execute()) {
            echo "<script> alert('Data inserted successfully'); </script>";
        }else{
            echo "<script> alert('Error: " . $query->error . "'); </script>";
        }
    } else {
        echo "<script> alert('Database connection failed'); </script>";
    }
}

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insert komunitas</title>
</head>
<body>
    
    
    
    <form action="komunitas.php" method="post" autocomplete="off">
        <label for="namaKomunitas">nama komunitas</label>
        <input type="text" name="namaKomunitas" required>
        <label for="kontak">nomor telepon</label>
        <input type="number" name="kontak" required>
        <label for="alamat">alamat</label>
        <input type="text" name="alamat" required>
        <button type="submit" name="submit">new</button>
        <a href="komunitasview.php">view komunitas</a>
        <a href="kerajinan.php">new kerajinan</a>    
        <a href="home.php">new item</a>   
        <a href="logout.php">logout</a>
    </form>
</body>
</html>