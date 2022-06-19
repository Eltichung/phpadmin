
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<body>
    <div class="product_table" style="padding: 20px;">
        <p style="font-size: 25px; font-weight: 700; margin-bottom: 16px; text-align: center;">Bảng quản lý đơn hàng</p>
        <table class="table table-striped" style="text-align: center; overflow-y: scroll;">
            <head>
                <tr>
                    <th scope="col">Mã DH</th>
                    <th scope="col">Mã KH</th>
                    <th scope="col">Tên KH</th>
                    <th scope="col">Địa Chỉ</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Ngày Đặt</th>
                    <th scope="col">Tổng Tiền</th>
                    <th scope="col">Trạng Thái</th>
                    <th scope="col">Chi Tiết</th>
                    <th scope="col">Xác Nhận</th>
                    <th scope="col">Giao thành công</th>
                    <th scope="col">Hủy Đơn</th>
                </tr>
            </head>
            <body>
<?php
    include("../QlSanPham/Connect.php");
    $sql = "select * from hoadon";
    $result = mysqli_query($conn, $sql);
    while($r = mysqli_fetch_assoc($result)){
        $idKH = $r['idKH'];
        $sql1 = "select * from taikhoan where Id = '$idKH'";
        $re = mysqli_query($conn, $sql1);
        $h = mysqli_fetch_assoc($re);
        $nameKH = $h['name'];
        $addressKH = $h['address'];
        $phoneKH = $h['phone'];
        $trangthai="";
        if($r['trangthai'] == 1){
            $trangthai = "Chờ xác nhận";
        }
        else if($r['trangthai'] == 2){
            $trangthai = "Đơn đã được xác nhận";
        }
        else if($r['trangthai'] == 3){
            $trangthai = "Đơn đã bị hủy";
        }
        else if($r['trangthai'] == 4){
            $trangthai = "Đơn đã giao thành công";
        }
        
?>
            
            <tr>
                <td  scope="row"><?=$r['idHD']?></td>
                <td><?=$idKH?></td>
                <td><?=$nameKH?></td>
                <td><?=$addressKH?></td>
                <td><?=$phoneKH?></td>
                <td><?=$r['ngaydat']?></td>
                <td><?=$r['tongtien']?></td>
                <td class="status"><?=$trangthai?></td>
                <td>
                    <a href="../QlDonHang/Form_DetailDH.php?id=<?=$r['idHD']?>">
                        <button class="btn btn-primary">Chi Tiết</button>
                    </a>
                </td>
                <td>
                    <a href="../QlDonHang/Form_ConfirmDH.php?id=<?=$r['idHD']?>">
                        <button class="btn btn-primary confirm" >Xác Nhận</button>
                    </a>
                </td>
                <td>
                    <a href="../QlDonHang/Form_ConfirmDHSuccess.php?id=<?=$r['idHD']?>">
                        <button class="btn btn-primary success" >Giao thành công</button>
                    </a>
                </td>
                <td>
                    <a href="javascript:confirmCancel('../QlDonHang/Form_CancelDH.php?id=<?=$r['idHD']?>')">
                        <button class="btn btn-primary cancel">Hủy Đơn</button>
                    </a>
                </td>
            </tr>
<?php
    }
?>
            </body>
        </table>
    </div>
<?php
    // include("../QlSanPham/Connect.php");
    // $sql = "select * from hoadon";
    // $result = mysqli_query($conn, $sql);
    // while($r = mysqli_fetch_assoc($result)){
    //     if($r['trangthai'] == 2){
    //         echo "<script>";
    //         echo "var cancelBtn = $('.cancel')";
    //         echo "cancelBtn.disabled = true;"
    //         echo "</script>";
    //     }
    // }
    ?>
</body>

</html>