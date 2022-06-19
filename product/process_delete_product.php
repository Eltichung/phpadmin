<?php
require "../common/csdl.php";
$id=$_GET['id'];
$sql="delete from tbl_products where id=$id";
mysqli_query($conn,$sql);
mysqli_close($conn);
header("location: ../table/product_interface.php");
?>