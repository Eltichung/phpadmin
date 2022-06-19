<?php
session_start();
$local = "localhost";
$uname = "root";
$upass = "";
$dtb = "n9php";
$conn = mysqli_connect($local, $uname, $upass, $dtb);

$cart =  $_SESSION['cart'];
$tongtien = 0;
foreach ($cart as $key => $item) {
  $tongtien += $item['quantity'] * $item['price_sale'];
}
//insert bang hoadon
$idKH = $_SESSION['id'];
$ngaydat = date("Y-m-d ");
$trangthai = 1;
$sql = "insert into hoadon (idKH, ngaydat, trangthai, tongtien) values('$idKH', '$ngaydat', '$trangthai','$tongtien')";
$re = mysqli_query($conn, $sql);

$sql1 = "SELECT  * from hoadon where idKH='$idKH' order by idHD desc";
$rs = mysqli_query($conn, $sql1);
$idHD = mysqli_fetch_assoc($rs)['idHD'];


//insert bagn hoadon-chitiet
foreach ($cart as $key => $item) {
  $idHD1 = $idHD;
  $idSP = $item['id'];
  $soluong = $item['quantity'];
  $gia = $item['price_sale'];
  $sql = "insert into hoadon_chitiet ( idHD, idSP, soluong,gia) values('$idHD1', '$idSP', '$soluong','$gia')";
  mysqli_query($conn, $sql);
}
$_SESSION['cart'] = [];
?>
<script>
  alert('Đặt hàng thành công');
  document.location = 'view_cart.php'
</script>