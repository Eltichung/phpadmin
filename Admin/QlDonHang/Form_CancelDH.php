<?php
    include("../QlSanPham/Connect.php");
    $id = $_GET['id'];
    $sql = "update hoadon set trangthai = 3 where idHD = '$id'";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo "<script>setTimeout(\"location.href = '../GdAdmin/index.php';\",5);</script>";
        echo "<script>alert('Hủy đơn thành công.')</script>";
    }
    else{
        echo "<script>setTimeout(\"location.href = '../GdAdmin/index.php';\",5);</script>";
        //echo "<script>alert('Hủy đơn thất bại.')</script>";
    }
?>