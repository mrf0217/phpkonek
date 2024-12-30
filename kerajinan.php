<?php

include("konekphp.php");

if (isset($_POST["submit"])) {
    $bentukKerajinan = $_POST["bentukKerajinan"];
    $bahan = $_POST["bahan"];
    $harga = (int)$_POST["harga"];

    if ($_FILES["foto"]["error"] === 4) {
        echo "<script>alert('Image does not exist');</script>";
    } else {
        $namafile = $_FILES["foto"]["name"];
        $besarfile = $_FILES["foto"]["size"];
        $tmpname = $_FILES["foto"]["tmp_name"];

        $validimageExtention = ['jpg', 'jpeg', 'png'];
        $imageExtention = explode('.', $namafile);
        $imageExtention = strtolower(end($imageExtention));

        if (!in_array($imageExtention, $validimageExtention)) {
            echo "<script>alert('Invalid image extension');</script>";
        } else if ($besarfile > 1000000) {
            echo "<script>alert('Image too large');</script>";
        } else {
            $newImagename = uniqid();
            $newImagename .= '.' . $imageExtention;

            // Check if the 'img' directory exists and is writable
            if (!is_dir('img')) {
                mkdir('img', 0777, true);
            }

            if (!is_writable('img')) {
                echo "<script>alert('The img directory is not writable');</script>";
            } else {
                if (move_uploaded_file($tmpname, 'img/' . $newImagename)) {
                    $query = "INSERT INTO kerajinan VALUES ('', '$bentukKerajinan', '$bahan', '$harga', '$newImagename')";
                    mysqli_query($connection, $query);
                    echo "<script>alert('Data inserted successfully');</script>";
                } else {
                    echo "<script>alert('Failed to move uploaded file');</script>";
                }
            }
        }
    }
}
?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Kerajinan</title>
</head>
<body>
    <form action="kerajinan.php" method="post" autocomplete="off" enctype="multipart/form-data">
        <label for="bentukKerajinan">Bentuk Kerajinan</label>
        <input type="text" name="bentukKerajinan" required>
        <label for="bahan">Terbuat dari apa</label>
        <input type="text" name="bahan" required>
        <label for="harga">Harga</label>
        <input type="number" name="harga" required>
        <label for="foto">Foto</label>
        <input type="file" name="foto" id="foto" accept=".jpg, .jpeg, .png" required> <br> <br>
        <button type="submit" name="submit">New</button>
        <a href="komunitasview.php">View Komunitas</a> 
        <a href="kerajinanview.php">View kerajinan</a> 
        <a href="home.php">New Item</a>   
        <a href="logout.php">Logout</a>
    </form>
</body>
</html>
