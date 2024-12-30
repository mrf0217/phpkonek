<?php
session_start();
include("konekphp.php");

// Function to validate and sanitize input
function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['Name']) && isset($_POST['password'])) {
        $Name = $connection->real_escape_string(validate($_POST['Name']));
        $password = validate($_POST['password']);

        if (empty($Name) || empty($password)) {
            header("Location: login.php?error=All fields must be filled");
            exit();
        } else {
            $sql = "SELECT * FROM registration WHERE Name='$Name' AND password='$password'";
            $result = $connection->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $_SESSION['Name'] = $row['Name'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['lastName'] = $row['Name']; // Ensure lastName is set appropriately
                header("Location: home.php");
                exit();
            } else {
                header("Location: login.php?error=Incorrect Name or password");
                exit();
            }
        }
    } else {
        header("Location: login.php");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}
?>
