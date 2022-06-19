<?php
session_start();

$local = "localhost";
$uname = "root";
$upass = "";
$dtb = "n9php";
$conn = mysqli_connect($local, $uname, $upass, $dtb);


$idKH = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./Order.css">

</head>
<style>
.tab
{
    display: flex;
    padding-top:60px;
    width:100%;
    justify-content:center;
    gap:50px;
}
.tab li a
{
    display: inline-block;
    font-size: 20px;
    padding: 10px 30px;
}

.tab-active
{
    background-color: #FDFF8F;    
    border-radius: 15px;
}
.myOrder
{
    display:flex;
   
}
.myOrder-items
{
    flex: 1;
    width:100%;
    display:none;
}
.pane-active
{
    display:block;
}
.line {
  position: absolute;
  left: 0;
  bottom: 0;
  width: 0;
  height: 6px;
  border-radius: 15px;
  background-color: #c23564;
  transition: all 0.2s ease;
}
</style>
<body>
    <header>
        <div class="logo"><img src="../images/icon.png" alt=""><span>QUANG THANG</span></div>
        <ul class="menu">
            <li active check><a href="../index.php">Trang chủ</a></li>
        </ul>
        <ul class="menu-cart">
            <li><a href="./login-signu/index.html"><i class="fas fa-user"></i></a></li>
        </ul>
    </header>
    <ul class="control">
        <li><a href="../Cartchung/view_cart.php">Giỏ hàng của tôi</a></li>
        <li class="active"><a href="./Order.html">Đơn hàng của tôi</a></li>
    </ul>
    <ul class="tab">
        <li><a href="#" class="tab-active">Chờ xác nhận</a></li>
        <li><a href="#">Đã xác nhận</a></li>
        <li><a href="#">Đã hủy</a></li>
        <li><a href="#">Đã giao</a></li>
    </ul>
    <div class="myOrder">
        <div class="myOrder-items pane-active">
            <?php
            $sqlS1 = "select * from hoadon where idKH='$idKH' and trangthai='1'";
            $resultS1 = mysqli_query($conn, $sqlS1);
            while ($r = mysqli_fetch_assoc($resultS1)) {
                $idHD = $r['idHD'];
                $sql1 = "select * from taikhoan where Id = '$idKH'";
                $re = mysqli_query($conn, $sql1);
                $h = mysqli_fetch_assoc($re);
                $nameKH = $h['name'];
                $addressKH = $h['address'];
                $phoneKH = $h['phone'];
                $trangthai = "";
                if ($r['trangthai'] == 1) {
                    $trangthai = "Chờ xác nhận";
                } else if ($r['trangthai'] == 2) {
                    $trangthai = "Đơn đã được xác nhận";
                } else if ($r['trangthai'] == 3) {
                    $trangthai = "Đơn đã bị hủy";
                }
                else if ($r['trangthai'] == 4) {
                    $trangthai = "Đơn đã hoàn thành";
                }
            ?>
        
                <div class="order-name">
                    <p style="font-size:20px;">Mã đơn hàng:<?= $r['idHD'] ?></p>
                    <p style="font-size:20px;">Người đặt:<?= $nameKH ?></p>
                    <p style="font-size:20px;">SDT:<?= $phoneKH ?></p>
                    <p style="font-size:20px;" class="status"><?= $trangthai ?></p>
                </div>
                <br>
                <h3>Tổng tiền:<?= $r['tongtien'] ?></h3>
                <br>
                <p style="color:rgb(243, 96, 28)">Danh sách sản phẩm</p>
                <br>
                <ul class="heading">
                    <li>Ảnh</li>
                    <li>Tên</li>
                    <li>Đơn giá</li>
                    <li>Số lượng</li>
                    <li>Thành tiền</li>
                </ul>
                <table class="order-list product-List">
                    <?php
                    $sqlDH = "select * from hoadon_chitiet where idHD='$idHD'";
                    $resultDH = mysqli_query($conn, $sqlDH);
                    while ($k = mysqli_fetch_array($resultDH)) {
                        $idSP = $k['idSP'];
                        $sqlSP = "select * from sanpham where id = '$idSP'";
                        $resultSP = mysqli_query($conn, $sqlSP);
                        while ($SP = mysqli_fetch_assoc($resultSP)) {
                            $sqlDtDh = "select * from hoadon_chitiet where idHD ='$idHD' and idSP = '$idSP' ";
                            $resultSPDt = mysqli_fetch_assoc(mysqli_query($conn, $sqlDtDh));
                    ?>
                            <tr style=" border-bottom: 0px">
                                <td><img src="<?= '../' . $SP['image'] ?>" alt=""></td>
                                <td><?= $SP['name'] ?></td>
                                <td><?= $SP['price_sale'] ?></td>
                                <td><?= $resultSPDt['soluong'] ?></td>
                                <td><?= $SP['price_sale'] * $resultSPDt['soluong'] ?></td>

                            </tr>
                    <?php
                        }
                    }
                    ?>
                </table>
            <?php
            }
            ?>
        </div>    
        <div class="myOrder-items">
            <?php
            $sqlS2 = "select * from hoadon where idKH='$idKH' and trangthai='2'";
            $resultS2 = mysqli_query($conn, $sqlS2);
            while ($r = mysqli_fetch_assoc($resultS2)) {
                $idHD = $r['idHD'];
                $sql1 = "select * from taikhoan where Id = '$idKH'";
                $re = mysqli_query($conn, $sql1);
                $h = mysqli_fetch_assoc($re);
                $nameKH = $h['name'];
                $addressKH = $h['address'];
                $phoneKH = $h['phone'];
                $trangthai = "";
                if ($r['trangthai'] == 1) {
                    $trangthai = "Chờ xác nhận";
                } else if ($r['trangthai'] == 2) {
                    $trangthai = "Đơn đã được xác nhận";
                } else if ($r['trangthai'] == 3) {
                    $trangthai = "Đơn đã bị hủy";
                }
                else if ($r['trangthai'] == 4) {
                    $trangthai = "Đơn đã hoàn thành";
                }
            ?>
        
                <div class="order-name">
                    <p style="font-size:20px;">Mã đơn hàng:<?= $r['idHD'] ?></p>
                    <p style="font-size:20px;">Người đặt:<?= $nameKH ?></p>
                    <p style="font-size:20px;">SDT:<?= $phoneKH ?></p>
                    <p style="font-size:20px;color:blue;" class="status"><?= $trangthai ?></p>
                </div>
                <br>
                <h3>Tổng tiền:<?= $r['tongtien'] ?></h3>
                <br>
                <p style="color:rgb(243, 96, 28)">Danh sách sản phẩm</p>
                <br>
                <ul class="heading">
                    <li>Ảnh</li>
                    <li>Tên</li>
                    <li>Đơn giá</li>
                    <li>Số lượng</li>
                    <li>Thành tiền</li>
                </ul>
                <table class="order-list product-List">
                    <?php
                    $sqlDH = "select * from hoadon_chitiet where idHD='$idHD'";
                    $resultDH = mysqli_query($conn, $sqlDH);
                    while ($k = mysqli_fetch_array($resultDH)) {
                        $idSP = $k['idSP'];
                        $sqlSP = "select * from sanpham where id = '$idSP'";
                        $resultSP = mysqli_query($conn, $sqlSP);
                        while ($SP = mysqli_fetch_assoc($resultSP)) {
                            $sqlDtDh = "select * from hoadon_chitiet where idHD ='$idHD' and idSP = '$idSP' ";
                            $resultSPDt = mysqli_fetch_assoc(mysqli_query($conn, $sqlDtDh));
                    ?>
                            <tr style=" border-bottom: 0px">
                                <td><img src="<?= '../' . $SP['image'] ?>" alt=""></td>
                                <td><?= $SP['name'] ?></td>
                                <td><?= $SP['price_sale'] ?></td>
                                <td><?= $resultSPDt['soluong'] ?></td>
                                <td><?= $SP['price_sale'] * $resultSPDt['soluong'] ?></td>

                            </tr>
                    <?php
                        }
                    }
                    ?>
                </table>
            <?php
            }
            ?>
        </div>    
        <div class="myOrder-items">
            <?php
            $sqlS3 = "select * from hoadon where idKH='$idKH' and trangthai='3'";
            $resultS3 = mysqli_query($conn, $sqlS3);
            while ($r = mysqli_fetch_assoc($resultS3)) {
                $idHD = $r['idHD'];
                $sql1 = "select * from taikhoan where Id = '$idKH'";
                $re = mysqli_query($conn, $sql1);
                $h = mysqli_fetch_assoc($re);
                $nameKH = $h['name'];
                $addressKH = $h['address'];
                $phoneKH = $h['phone'];
                $trangthai = "";
                if ($r['trangthai'] == 1) {
                    $trangthai = "Chờ xác nhận";
                } else if ($r['trangthai'] == 2) {
                    $trangthai = "Đơn đã được xác nhận";
                } else if ($r['trangthai'] == 3) {
                    $trangthai = "Đơn đã bị hủy";
                }
                else if ($r['trangthai'] == 4) {
                    $trangthai = "Đơn đã hoàn thành";
                }
            ?>
                <a href="javascript:confirmCancel('./cancelDH.php?id=<?=$r['idHD']?>')">
                       <button type="button" id="cancel" class="cancel" style="color:white;border-radius:10px;">Hủy đơn hàng</button>
            </a>
                <div class="order-name">
                    <p style="font-size:20px;">Mã đơn hàng:<?= $r['idHD'] ?></p>
                    <p style="font-size:20px;">Người đặt:<?= $nameKH ?></p>
                    <p style="font-size:20px;">SDT:<?= $phoneKH ?></p>
                    <p style="font-size:20px;color:red;" class="status"><?= $trangthai ?></p>
                </div>
                <br>
                <h3>Tổng tiền:<?= $r['tongtien'] ?></h3>
                <br>
                <p style="color:rgb(243, 96, 28)">Danh sách sản phẩm</p>
                <br>
                <ul class="heading">
                    <li>Ảnh</li>
                    <li>Tên</li>
                    <li>Đơn giá</li>
                    <li>Số lượng</li>
                    <li>Thành tiền</li>
                </ul>
                <table class="order-list product-List">
                    <?php
                    $sqlDH = "select * from hoadon_chitiet where idHD='$idHD'";
                    $resultDH = mysqli_query($conn, $sqlDH);
                    while ($k = mysqli_fetch_array($resultDH)) {
                        $idSP = $k['idSP'];
                        $sqlSP = "select * from sanpham where id = '$idSP'";
                        $resultSP = mysqli_query($conn, $sqlSP);
                        while ($SP = mysqli_fetch_assoc($resultSP)) {
                            $sqlDtDh = "select * from hoadon_chitiet where idHD ='$idHD' and idSP = '$idSP' ";
                            $resultSPDt = mysqli_fetch_assoc(mysqli_query($conn, $sqlDtDh));
                    ?>
                            <tr style=" border-bottom: 0px">
                                <td><img src="<?= '../' . $SP['image'] ?>" alt=""></td>
                                <td><?= $SP['name'] ?></td>
                                <td><?= $SP['price_sale'] ?></td>
                                <td><?= $resultSPDt['soluong'] ?></td>
                                <td><?= $SP['price_sale'] * $resultSPDt['soluong'] ?></td>

                            </tr>
                    <?php
                        }
                    }
                    ?>
                </table>
            <?php
            }
            ?>
        </div>    
        <div class="myOrder-items">
            <?php
            $sqlS4 = "select * from hoadon where idKH='$idKH' and trangthai='4'";
            $resultS4 = mysqli_query($conn, $sqlS4);
            while ($r = mysqli_fetch_assoc($resultS4)) {
                $idHD = $r['idHD'];
                $sql1 = "select * from taikhoan where Id = '$idKH'";
                $re = mysqli_query($conn, $sql1);
                $h = mysqli_fetch_assoc($re);
                $nameKH = $h['name'];
                $addressKH = $h['address'];
                $phoneKH = $h['phone'];
                $trangthai = "";
                if ($r['trangthai'] == 1) {
                    $trangthai = "Chờ xác nhận";
                } else if ($r['trangthai'] == 2) {
                    $trangthai = "Đơn đã được xác nhận";
                } else if ($r['trangthai'] == 3) {
                    $trangthai = "Đơn đã bị hủy";
                }
                else if ($r['trangthai'] == 4) {
                    $trangthai = "Đơn đã hoàn thành";
                }
            ?>
        
                <div class="order-name">
                    <p style="font-size:20px;">Mã đơn hàng:<?= $r['idHD'] ?></p>
                    <p style="font-size:20px;">Người đặt:<?= $nameKH ?></p>
                    <p style="font-size:20px;">SDT:<?= $phoneKH ?></p>
                    <p style="font-size:20px;color:#A85CF9;font-weight:300;" class="status"><?= $trangthai ?></p>
                </div>
                <br>
                <h3>Tổng tiền:<?= $r['tongtien'] ?></h3>
                <br>
                <p style="color:rgb(243, 96, 28)">Danh sách sản phẩm</p>
                <br>
                <ul class="heading">
                    <li>Ảnh</li>
                    <li>Tên</li>
                    <li>Đơn giá</li>
                    <li>Số lượng</li>
                    <li>Thành tiền</li>
                </ul>
                <table class="order-list product-List">
                    <?php
                    $sqlDH = "select * from hoadon_chitiet where idHD='$idHD'";
                    $resultDH = mysqli_query($conn, $sqlDH);
                    while ($k = mysqli_fetch_array($resultDH)) {
                        $idSP = $k['idSP'];
                        $sqlSP = "select * from sanpham where id = '$idSP'";
                        $resultSP = mysqli_query($conn, $sqlSP);
                        while ($SP = mysqli_fetch_assoc($resultSP)) {
                            $sqlDtDh = "select * from hoadon_chitiet where idHD ='$idHD' and idSP = '$idSP' ";
                            $resultSPDt = mysqli_fetch_assoc(mysqli_query($conn, $sqlDtDh));
                    ?>
                            <tr style=" border-bottom: 0px">
                                <td><img src="<?= '../' . $SP['image'] ?>" alt=""></td>
                                <td><?= $SP['name'] ?></td>
                                <td><?= $SP['price_sale'] ?></td>
                                <td><?= $resultSPDt['soluong'] ?></td>
                                <td><?= $SP['price_sale'] * $resultSPDt['soluong'] ?></td>

                            </tr>
                    <?php
                        }
                    }
                    ?>
                </table>
            <?php
            }
            ?>
        </div>    
    </div>
    <script>
        const $$ = document.querySelectorAll.bind(document)
        const $ = document.querySelector.bind(document)
        let tab_li=$$('.tab>li')
        let tab_panes=$$('.myOrder-items')
        
       
        tab_li.forEach((tab,index) => {
            tab.addEventListener('click',()=>{                
                $('.tab-active').classList.remove('tab-active')
                $('.pane-active').classList.remove('pane-active')
                tab.classList.add('tab-active')
                tab_panes[index].classList.add('pane-active')
            })
        })
        function confirmCancel(delUrl) {
        if (confirm("Bạn chắc chắn muốn hủy đơn hàng này?")) {
            document.location = delUrl;
        }
      
    }
    </script>
</body>

</html>