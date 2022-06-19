<?php
require "../../common/csdl.php";
    $email=$_POST['email'];
    $message=$_POST['message'];
    $sql="insert into tbl_contact (email, message)
    values('$email','$message')";
    mysqli_query($conn,$sql);
    header("Location: ../../phpfront/index.php");
?>