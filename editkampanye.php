<?php
    require 'konekphp.php';
    if(isset($_POST ["submit"]) && isset($_SESSION["id"])){
        $sql="SELECT * FROM campaign WHERE ID= '{$_GET['id']}'";
        $result=mysqli_query($connection, $sql );
        $record= mysqli_fetch_array($result);
    }else{
        $sql2="SELECT * FROM campaign WHERE ID= '{$_POST['id']}'";
        $result2=mysqli_query($connection, $sql2);
        $rec= mysqli_fetch_array(($result2));
    }
    $nameimage=$_POST["nama"];

    $sql1="UPDATE campaign SET nama='{$nameimage}' WHERE id='{$_POST['id']}'";
    mysqli_query($connection, $sql1) or die(mysqli_error($connection));
    header('Location:index.php');


?>
<h1>
    edit
</h1>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];  ?>" enctype="multipart/form-data">
    name: <br/><input type="text" name="nama" value="<?php echo $record['name']; ?>"/>,<br/>
    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">/>
    <input type="submit" name="submit" value="edit"/>
</form>