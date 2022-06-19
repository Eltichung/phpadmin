<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../ThongKe/thongke.css">
</head>
<style>
.active
{
    color: rgb(0, 0, 0);
    background-color: rgba(175, 173, 173, 0.2);
    border-right: 5px solid #F15412;
    box-shadow: 0px 0px 10px 7px rgba(255, 255, 255, 0.2);
}
<?php 
    session_start();
    if( $_SESSION['discount']==null )$_SESSION['discount']=0;
?>
    </style>
<body>
    <header>
    </header>   
    <div class="body">
        
        <div class="main">
            <nav>
                <p>Admin Website</p>
                <ul class="menu">
                    <li><a class="active" href="#"><i class="fas fa-columns"></i>Thống kê</a></li>
                    <li><a  href="#"><i class="fas fa-database"></i>Quản lí sản phẩm</a></li>
                    <li><a href="#"><i class="fas fa-list"></i>Quản lí loại sản phẩm</a></li>
                    <li><a href="#"><i class="fas fa-user-edit"></i>Quản lí tài khoản</a></li>
                    <li><a  href="#"><i class="fas fa-cart-plus"></i>Quản lí đơn hàng</a></li>
                </ul>
            </nav>
            <div class="content">
                <?php
                // include '../QlSanPham/Form_ShowSP.php';
                include "../ThongKe/thongke.php";
                //include "../QlDonHang/Form_ShowDonHang.php";
                ?>
            </div>
        </div>
    </div>
</body>

<script type="text/javascript">
    const $ = document.querySelector.bind(document);
    const $$ = document.querySelectorAll.bind(document);
    const li = $$(".menu >li>a");
    li.forEach((item) => {
        item.addEventListener("click", () => {
            $('.active').classList.remove("active");
            item.classList.add("active");
            let tmp = item.textContent;
            switch (tmp) {
                case 'Quản lí sản phẩm':
                    $('.content').innerHTML = `<?php
                                                include '../QlSanPham/Form_ShowSP.php'
                                                ?>`
                    break;
                case 'Quản lí loại sản phẩm':
                    $('.content').innerHTML = `<?php
                                                include '../QlLoaiSP/php/Form_ShowLoaiSP.php'
                                                ?>`
                    break;
                case 'Quản lí tài khoản':
                    $('.content').innerHTML = `<?php
                                                include '../QlTaiKhoan/QLTaiKhoan.php'
                                                ?>`
                    break;
                case 'Quản lí đơn hàng':
                    $('.content').innerHTML = `<?php
                                                include '../QlDonHang/Form_ShowDonHang.php'
                                                ?>`
                    break;
                case 'Thống kê':
                    $('.content').innerHTML = `<?php
                                                include '../ThongKe/thongke.php'
                                                ?>`
                    break;
            }
        })
    })

    function confirmDelete(delUrl) {
        if (confirm("Bạn chắc chắn muốn xóa sản phẩm này?")) {
            document.location = delUrl;
        }
    }

    function confirmCancel(delUrl) {
        if (confirm("Bạn chắc chắn muốn hủy đơn hàng này?")) {
            document.location = delUrl;
        }
    }
    let btnConfirm = $$('.confirm')
    let btncancel = $$('.cancel')
    console.log( $$('.status'))
    $$('.status').forEach((item,index)=>{
        if(item.textContent!=="Chờ xác nhận")
        {
            btnConfirm[index].setAttribute('disabled',true);
            btncancel[index].setAttribute('disabled',true);           
        }
        if(item.textContent=="Đơn đã bị hủy")
        item.style.color = 'red';
        if(item.textContent=="Đơn đã được xác nhận")
        item.style.color = 'blue';
    })
</script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</html>