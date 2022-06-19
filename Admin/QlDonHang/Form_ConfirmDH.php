<?php
    include("../QlSanPham/Connect.php");
    $id = $_GET['id'];
    $sql = "update hoadon set trangthai = 2 where idHD = '$id'";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo "<script>setTimeout(\"location.href = '../GdAdmin/index.php';\",5);</script>";
        echo "<script>alert('Xác nhận thành công.')</script>";
    }
    else{
        echo "<script>setTimeout(\"location.href = '../GdAdmin/index.php';\",5);</script>";
        //echo "<script>alert('Xác nhận thất bại.')</script>";
    }
?>