<?php
 
$day = date('Y-m-d');
include("../QlSanPham/Connect.php");
//tổng tiền hôm nay
$sql = "select * from hoadon where trangthai =2 and ngaydat='$day'";
$result = mysqli_query($conn, $sql);
$tongtien = 0;
$count = 0;
while ($r = mysqli_fetch_assoc($result)) {
    $tongtien += $r['tongtien'];
    $count++;
}
//dem so don huy
$count1 = 0;
$reCancel = mysqli_query($conn, "select * from hoadon where trangthai =3 and ngaydat='$day'");
while ($r = mysqli_fetch_assoc($reCancel)) {
    $count1++;
}
//dem so don cho xac nhan
$count2 = 0;
$reWait = mysqli_query($conn, "select * from hoadon where trangthai =1 and ngaydat='$day'");
while ($r = mysqli_fetch_assoc($reWait)) {
    $count2++;
}
//tỏng tiền hôm qua
$dayYesterday = date('Y-m-d', strtotime("-1 days"));
$sql1 = "select * from hoadon where trangthai =2 and ngaydat='$dayYesterday'";
$result1 = mysqli_query($conn, $sql1);
$tongtien1 = 0;
while ($r1 = mysqli_fetch_assoc($result1)) {
    $tongtien1 += $r1['tongtien'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="thongke.css">
</head>

<body>
    <h2 id="a1">Thống kê</h2>
    <div class="gallery">
        <div class="gallery-items">
        <i class="fas fa-dollar-sign"></i>
            <p>Thu Nhập</p>
            <h3><?= $tongtien ?></h3>
        </div>
        <div class="gallery-items">
        <i class="fas fa-dollar-sign"></i>
            <p>Thu Nhập hôm trước</p>
            <h3><?= $tongtien1 ?></h3>
        </div>
        <div class="gallery-items">
        <i class="fas fa-clipboard-check"></i>
            <p>Đơn xác nhận</p>
            <h3><?= $count ?></h3>
        </div>
        <div class="gallery-items">
            <i class="fas fa-window-close"></i>
            <p>Đơn hủy</p>
            <h3><?= $count1 ?></h3>
        </div>
        <div class="gallery-items">
             <i class="fas fa-spinner"></i>
            <p>Đơn đang chờ</p>
            <h3><?= $count2 ?></h3>
        </div>
    </div>
    <div class="tk-main">
        <img src="../image_common/bg1.jpg" alt="">
        <div class="tk-main-form">
            <img src="../image_common/discount.png" alt="" style="width:100%">
            <form action="../ThongKe/discount.php" method="post">
                <label for="">Nhập mã giảm giá</label>
                <br>

                <input type="text" name="discount"value="<?php echo$_SESSION['discount']?>">
                <br>
                <br>
                <a href="../ThongKe/discount.php" style="color:white"><button class="btn btn-primary" name="update" style="width:150px;border-radius:10px;">Cập nhập</button></a>
            </form>
            <div class="form-btn">
                <a href="../ThongKe/reset.php" style="color:white"><button class="btn btn-primary tk-btn" name="reset"style="width:150px;margin-left:0px;border-radius:10px;">Đặt lại</button></a>
    
            </div>
        </div>
    </div>
</body>