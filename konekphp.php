<?php

$connection = mysqli_connect("localhost:3306","root","","test");
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}else{
echo "Database connected!";}
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }
    // if(!$connection){
    //     die("erroe". mysqli_connect_error());
    // }
    // $query = "select * from registration";
    // $stmt = mysqli_query($connection, $query);

    // while($row = mysqli_fetch_array($stmt, MYSQLI_ASSOC)){
    //     echo $row['id'].' '.$row['firstName'].' '.$row['lastName'].' '.$row['gender'].' '.$row['email'].' '.$row['password'].' '.$row['number'].' </br>';
    // }
?>