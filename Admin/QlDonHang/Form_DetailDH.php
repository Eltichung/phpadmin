<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="Form_DetailDH.css">
</head>
<?php
    include("../QlSanPham/Connect.php");
    $id = $_GET['id'];
    $sql = "select * from hoadon where idHD = '$id'";
    $sql1 = "select * from hoadon_chitiet  where idHD = '$id'";
    $result = mysqli_query($conn, $sql);
    $r = mysqli_fetch_assoc($result);
    $idKH = $r['idKH'];
    $sql2 = "select * from taikhoan where Id = '$idKH'";
    $h = mysqli_fetch_assoc(mysqli_query($conn, $sql2));
    $trangthai = "";
    if($r['trangthai'] == 1){
        $trangthai = "Chờ xác nhận";
    }
    else if($r['trangthai'] == 2){
        $trangthai = "Đơn đã được xác nhận";
    }
    else if($r['trangthai'] == 3){
        $trangthai = "Đơn đã bị hủy";
    }
?>
<body>
    <a href="../GdAdmin/index.php" ><i class="fas fa-hand-point-left" style="font-size:50px; margin-left:50px;color:blue;"></i></a>
    <div class="detail">
        <div class="donhang_box">
            <div class="donhang_box-row">
                <p class="donhang_box-header">Mã đơn hàng:</p>
                <p class="donhang_box-content"><?=$r['idHD']?></p>
            </div>
            <div class="donhang_box-row">
                <p class="donhang_box-header">Mã khách hàng:</p>
                <p class="donhang_box-content"><?=$r['idKH']?></p>
            </div>
            <div class="donhang_box-row">
                <p class="donhang_box-header">Tên khách hàng:</p>
                <p class="donhang_box-content"><?=$h['name']?></p>
            </div>
            <div class="donhang_box-row">
                <p class="donhang_box-header">Địa chỉ:</p>
                <p class="donhang_box-content"><?=$h['address']?></p>
            </div>
            <div class="donhang_box-row">
                <p class="donhang_box-header">Số điện thoại:</p>
                <p class="donhang_box-content"><?=$h['phone']?></p>
            </div>
            <div class="donhang_box-row">
                <p class="donhang_box-header">Ngày đặt:</p>
                <p class="donhang_box-content"><?=$r['ngaydat']?></p>
            </div>
            <div class="donhang_box-row">
                <p class="donhang_box-header">Trạng thái:</p>
                <p class="donhang_box-content"><?=$trangthai?></p>
            </div>
        </div>
        <div class="sanpham_box">
            <p style="font-size: 25px; font-weight: 700; margin-bottom: 16px; text-align: center;">Bảng danh sách sản phẩm</p>
        <table class="table table-striped" style="text-align: center; overflow-y: scroll;">
            <head>
                <tr>
                    <th scope="col">Mã SP</th>
                    <th scope="col">Tên SP</th>
                    <th scope="col">Số Lượng</th>
                    <th scope="col">Đơn giá</th>
                    <th scope="col">Thành tiền</th>
                </tr>
            </head>
            <body>
<?php
    static $sum = 0;
    $result1 = mysqli_query($conn, $sql1);
    while($k = mysqli_fetch_assoc($result1)){
        $id = $k['idSP'];
        $sql3 = "select name from sanpham where id = '$id'";
        $result2 = mysqli_fetch_assoc(mysqli_query($conn, $sql3));

?>
                <tr>
                    <td  scope="row"><?=$k['idSP']?></td>
                    <td><?=$result2['name']?></td>
                    <td><?=$k['soluong']?></td>
                    <td><?=$k['gia']?></td>
                    <td><?=$k['soluong']*$k['gia']?></td>
                </tr>
<?php
    $sum += $k['soluong']*$k['gia'];
    }
?>
            </body>
        </table>
        </div>
        <div class="total_money">
            Tổng tiền:
            <p style="display: inline-block; color:red;"><?=$sum?></p>
        </div>
    </div>
</body>
</html>