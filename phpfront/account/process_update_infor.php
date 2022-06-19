
<?php
require "../../common/csdl.php";
$name=$_POST['username'];
$phone=$_POST['phone'];
$id=$_POST['id'];
$sql="update taikhoan
set name='$name', phone='$phone'
where id=$id";
mysqli_query($conn,$sql);

mysqli_close($conn);
echo'<script>alert("Sửa thông tin thanh cong!")</script>';
    echo "<script>setTimeout(\"location.href = '../../phpfront/account/infomation.php?id=$id';\",5);</script>";
?>
