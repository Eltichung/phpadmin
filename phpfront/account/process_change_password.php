
<?php
require "../../common/csdl.php";
$password_old=$_POST['password_old'];
$password_new=$_POST['password_new'];
$id=$_POST['id'];
$sql="select * from taikhoan
where id= $id and pass='$password_old'";

$num_row=mysqli_num_rows(mysqli_query($conn,$sql));

if($num_row==1){
    $sql="update taikhoan
    set pass='$password_new'
    where id=$id and pass='$password_old'";
    mysqli_query($conn,$sql);
    mysqli_close($conn);
    echo'<script>alert("Doi mat khau thanh cong!")</script>';
    echo "<script>setTimeout(\"location.href = '../../phpfront/account/change_password.php?id=$id';\",5);</script>";
    exit;
}else{
    echo'<script>alert("Mat khau khong dung!")</script>';
    echo "<script>setTimeout(\"location.href = '../../phpfront/account/change_password.php?id=$id';\",5);</script>";
    
}


?>
