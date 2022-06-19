<?php
 
$day = date('Y-m-d');
include("../QlSanPham/Connect.php");
//tổng tiền hôm nay
$sql = "select * from hoadon where trangthai =4 and ngaydat='$day'";
$result = mysqli_query($conn, $sql);
$tongtien = 0;
$count = 0;
while ($r = mysqli_fetch_assoc($result)) {
    $tongtien += $r['tongtien'];
    $count++;
}
//đếm số đơn hủy
$count1 = 0;
$reCancel = mysqli_query($conn, "select * from hoadon where trangthai =3");
while ($r = mysqli_fetch_assoc($reCancel)) {
    $count1++;
}

//đếm số đơn chờ
$count3 = 0;
$reWait = mysqli_query($conn, "select * from hoadon where trangthai =1");
while ($r = mysqli_fetch_assoc($reWait)) {
    $count3++;
}
//đếm số đơn đc xác nhận
$count2 = 0;
$reConfirm = mysqli_query($conn, "select * from hoadon where trangthai =2");
while ($r = mysqli_fetch_assoc($reConfirm)) {
    $count2++;
}

//đếm số đơn giao thành công
$count4 = 0;
$reConfirm = mysqli_query($conn, "select * from hoadon where trangthai =4");
while ($r = mysqli_fetch_assoc($reConfirm)) {
    $count4++;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="thongke.css">
</head>

<body>
    <h2 id="a1">Thống kê</h2>
    <div class="gallery">
        <div class="gallery-items">
        <i class="fas fa-dollar-sign"></i>
            <p>Thu Nhập hôm nay</p>
            <h3><?=$tongtien?></h3>
        </div>
        <div class="gallery-items">
        <i class="fas fa-clipboard-check"></i>
            <p>Đơn xác nhận</p>
            <h3><?= $count2 ?></h3>
        </div>
        <div class="gallery-items">
            <i class="fas fa-window-close"></i>
            <p>Đơn hủy</p>
            <h3><?= $count1 ?></h3>
        </div>
        <div class="gallery-items">
             <i class="fas fa-spinner"></i>
            <p>Đơn đang chờ</p>
            <h3><?= $count3 ?></h3>
        </div>
        <div class="gallery-items">
             <i class="fas fa-spinner"></i>
            <p>Đơn giao thành công</p>
            <h3><?= $count4 ?></h3>
        </div>
    </div>
    
</body>