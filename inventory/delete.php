<?php
include 'connection.php';
$id=$_GET['id'];
$table="DELETE FROM sales WHERE id='$id'";
$quee=mysqli_query($dbase,$table);
if($quee){
    header("location: admin.php");
}
else{
    echo "failed deleting";
}

