<?php
    include("../QlSanPham/Connect.php");
    $ma = $_GET["id"];
    $sql = "delete from sanpham where id = '$ma'";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo "<script>setTimeout(\"location.href = '../GdAdmin/index.php';\",5);</script>";
        echo "<script>alert('Xóa thành công.')</script>";
    }
?>