<?php
    session_start();
    include("../QlSanPham/Connect.php");
    $tmp = $_SESSION['discount'];
    $sql = "select * from sanpham";
    $result = mysqli_query($conn, $sql);
    while ($r = mysqli_fetch_assoc($result)) {
        $id = $r['id'];
        $priceNew = $r['price_sale'] / ((100 - $tmp) / 100);
        $sql1 = "update sanpham set price_sale='$priceNew' where id= '$id'";
        mysqli_query($conn, $sql1);
    }
    $_SESSION['discount']=0;
    echo "<script>alert('Thành công')</script>";
    echo "<script>setTimeout(\"location.href = '../GdAdmin/index.php';\",500);</script>";
?>
