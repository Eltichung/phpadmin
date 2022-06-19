<?php
require "../common/csdl.php";
$id=$_POST['id'];
$title=$_POST['title'];
$detail=$_POST['detail_description'];
$short = $_POST['short_description'];
$status=$_POST['status'];
$price = $_POST['price'];
$category_id = $_POST['category_id'];
$anhMoi=$_FILES['photo_new'];

// mục đích ảnh củ ảnh mới để update cho dễ. check chỗ file anh mới
// xem nó có size>0 ko. Nếu có lf ảnh mới. nếu k thì ảnh cũ
if($anhMoi['size']>0){
    $folder='../img/';

    $file_extension=explode('.',$anhMoi['name'])[1];
    $file_name= time().'.'.$file_extension;
    $path_file=$folder.$file_name;
    move_uploaded_file($anhMoi["tmp_name"],$path_file);
}else{
    $file_name=$_POST['photo_old'];
}


$sql="update tbl_products
 set 
title = '$title',
detail_description = '$detail',
short_description  = '$short',
status = '$status',
price = '$price',
category_id = '$category_id',
avatar = '$file_name'
where 
id='$id'";

 mysqli_query($conn,$sql);
$error=mysqli_error($conn);
mysqli_close($conn);
header("location: ../table/product_interface.php");
?>