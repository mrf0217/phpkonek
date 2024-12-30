<?php
require 'konekphp.php';

if (isset($_POST["submit"])) {
    $nama = $_POST["nama"];
    $tempat = $_POST["tempat"];
    $telepon = (int)$_POST["telepon"];
    $kondisi = $_POST["kondisi"];
    
    if ($_FILES["gambar"]["error"] === 4){
        echo "<script>alert('Image does not exist');</script>";
    } else {
        $namafile = $_FILES["gambar"]["name"];
        $besarfile = $_FILES["gambar"]["size"];
        $tmpname = $_FILES["gambar"]["tmp_name"];

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
            if (!is_dir('img2')) {
                mkdir('img2', 0777, true);
            }

            if (!is_writable('img2')) {
                echo "<script>alert('The img directory is not writable');</script>";
            } else {
                if (move_uploaded_file($tmpname, 'img2/' . $newImagename)) {
                    $query = "INSERT INTO campaign VALUES ('', '$nama', '$tempat', '$telepon', '$kondisi', '$newImagename')";
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
    <title>Insert kampanya</title>
</head>
<body>
    <form action="kampanye.php" method="post" autocomplete="off" enctype="multipart/form-data">
        <label for="nama">nama campaign</label>
        <input type="text" name="nama" required>
        <label for="tempat">tempat campaign</label>
        <input type="text" name="tempat" required>
        <label for="telepon">nomor yang bisa dihubungi</label>
        <input type="number" name="telepon" required>
        <label for="kondisi">kondisi compaign</label>
        <input type="radio" name="kondisi" value="selesai" required> selesai
        <input type="radio" name="kondisi" value="berlangsung" required> berlangsung
        <input type="radio" name="kondisi" value="mendantang"> mendantang
        <label for="foto">Foto</label>
        <input type="file" name="gambar" id="gambar" accept=".jpg, .jpeg, .png" required> <br> <br>
        <button type="submit" name="submit">New</button>
        <a href="komunitasview.php">View Komunitas</a> 
        <a href="kerajinanview.php">View kerajinan</a> 
        <a href="kampanyeview.php">View campaign</a> 
        <a href="home.php">home</a>   
        <a href="logout.php">Logout</a>
    </form>
</body>
</html>
