<?php
    include("../QlSanPham/Connect.php");
    $id = $_GET['id'];
    $sql = "update hoadon set trangthai = 4 where idHD = '$id'";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo "<script>setTimeout(\"location.href = '../GdAdmin/index.php';\",5);</script>";
        echo "<script>alert('Xác nhận giao thành công.')</script>";
    }
    else{
        echo "<script>setTimeout(\"location.href = '../GdAdmin/index.php';\",5);</script>";
        //echo "<script>alert('Xác nhận thất bại.')</script>";
    }
?>