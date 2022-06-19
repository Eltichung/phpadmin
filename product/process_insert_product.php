<?php
require "../common/csdl.php";

$title=$_POST['title'];
$detail=$_POST['detail_description'];
$short = $_POST['short_description'];
$price = $_POST['price'];
$category_id = $_POST['category_id'];
$anh=$_FILES['avatar'];
$folder='../img/';

$file_extension=explode('.',$anh['name'])[1];
$file_name= time().'.'.$file_extension;
$path_file=$folder.$file_name;
move_uploaded_file($anh["tmp_name"],$path_file);
$sql="INSERT INTO tbl_products (title,avatar,short_description, detail_description,price,category_id)
 VALUES ('$title','$file_name','$short','$detail','$price','$category_id')";
 mysqli_query($conn,$sql);
$error=mysqli_error($conn);
mysqli_close($conn);
header("location: ../table/product_interface.php");
?>