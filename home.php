<?php
require 'konekphp.php';
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['lastName'])) {
    $id = $_SESSION['id'];

    // Fetch the current tabungan value from the database
    $query = $connection->prepare("SELECT tabungan FROM registration WHERE id = ?");
    $query->bind_param("i", $id);
    $query->execute();
    $query->bind_result($current_tabungan);
    $query->fetch();
    $query->close();

    if (isset($_GET["submit"])) {
        $result1 = $_GET['num1'];
        $operator = $_GET['operator']; // Get the operator from the form

        switch ($operator) {
            case 'none':
                echo "Need to select a method";
                break;
            case 'add':
                $hasiltabungan = $current_tabungan + $result1;
                break;
            default:
                $hasiltabungan = $current_tabungan;
                break;
        }

        if (isset($connection)) {
            // Use prepared statements to prevent SQL injection
            $query = $connection->prepare("UPDATE registration SET tabungan = ? WHERE id = ?");
            $query->bind_param("ii", $hasiltabungan, $id); // 'i' for integer
    
            if ($query->execute()) {
                echo "<script> alert('Data updated successfully'); </script>";
            } else {
                echo "<script> alert('Error: " . $query->error . "'); </script>";
            }
        }
    }
} else {
    header("Location: login.php");
    exit();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
<h1>Hello, <?php echo $_SESSION['lastName']; ?></h1><br>
<h2>Please input your total that you turn in</h2>
<form action="home.php" method="get" autocomplete="off">
    <label for="num1">New Amount</label>
    <input type="number" name="num1" required>
    <label for="operator">Operation</label>
    <select name="operator" required>
        <option value="none">None</option>
        <option value="add">Add</option>
    </select>
    <button type="submit" name="submit">Update</button>
</form>
<a href="homeview.php">View Nasabah</a>
<a href="profile.php">New Profile</a>
<a href="komunitas.php">New Komunitas</a>
<a href="komunitasview.php">View Komunitas</a>
<a href="kampanye.php">New Campaign</a>
<a href="logout.php">Logout</a>
</body>
</html>
