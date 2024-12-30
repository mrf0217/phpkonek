<?php
require 'konekphp.php';

if (isset($_POST["submit"])) {
    $Name = $_POST["Name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    

    // Check if the connection is established
    if (isset($connection)) {
        // Use prepared statements to prevent SQL injection
        $query = $con->prepare("INSERT INTO registration (Name, email, password) VALUES (?, ?, ?)");
        $query->bind_param("sss", $Name, $email, $password); // 'i' for integer

        if ($query->execute()) {
            echo "<script> alert('Data inserted successfully'); </script>";
        } else {
            echo "<script> alert('Error: " . $query->error . "'); </script>";
        }
    } else {
        echo "<script> alert('Database connection failed'); </script>";
    }
}
?>

<!-- <!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Insert Data</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
</head>
<style media="screen">
    label {
        display: block;
    }
</style>
<body>
    <form action="index.php" method="post" autocomplete="off">
        <label for="firstName">First Name</label>
        <input type="text" name="firstName" required>

        <label for="lastName">Last Name</label>
        <input type="text" name="lastName" required>

        <label for="gender">Gender</label>
        <input type="radio" name="gender" value="m" required> M
        <input type="radio" name="gender" value="f" required> F
        <input type="radio" name="gender" value="o"> O

        <label for="email">Email</label>
        <input type="text" name="email" required>

        <label for="password">Password</label>
        <input type="password" name="password" required>

        <label for="number">Number</label>
        <input type="number" name="number" required>

        <br>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html> -->
