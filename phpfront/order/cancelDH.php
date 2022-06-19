<?php
    $local = "localhost";
    $uname = "root";
    $upass = "";
    $dtb = "n9php";
    $conn = mysqli_connect($local, $uname, $upass, $dtb);
    
    $id = $_GET['id'];
    $sql = "update hoadon set trangthai = 3 where idHD = '$id'";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo "<script>setTimeout(\"location.href = './order.php';\",5);</script>";
        echo "<script>alert('Hủy đơn thành công.')</script>";
    }
    else{
        echo "<script>setTimeout(\"location.href = './order.php';\",5);</script>";
        //echo "<script>alert('Hủy đơn thất bại.')</script>";
    }
?>