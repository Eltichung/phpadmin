<?php
//show cart
//session_destroy();
//die();
$local = "localhost";
$uname = "root";
$upass = "";
$dtb = "n9php";
$con = mysqli_connect($local, $uname, $upass, $dtb);
session_start();
if(isset($_SESSION['cart'])){

    $cart =  $_SESSION['cart'];
}
else{
    $cart =  [];
  
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
</head>
<style>
    <?php include('./css/Cart.css'); ?>
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
        <li><a href="../Cartchung/view_cart.php"class="active">Giỏ hàng của tôi</a></li>
        <li ><a href="../order/order.php">Đơn hàng của tôi</a></li>
    </ul>
    <div class="product_table" style="padding: 20px;">
        <table class="table table-striped" style="text-align: center;">
            <tr>
                <th scope="col">ID SP</th>
                <th scope="col">Tên SP</th>
                <th scope="col">Loại SP</th>
                <th scope="col">Thương Hiệu</th>
                <th scope="col">Số Lượng</th>
                <th scope="col">Giá</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Thành Tiền</th>
                <th scope="col">Xóa</th>
            </tr>
            <tr>

                <?php

                foreach ($cart as $key => $item) :
                ?>
                    <td><?php echo $item['id'] ?></td>
                    <td><?php echo $item['name'] ?></td>
                    <td><?php echo $item['type'] ?></td>
                    <td><?php echo $item['brand'] ?></td>

                    <td>
                        <Button class="giam"><a href='giam.php?id=<?= $item['id'] ?>'>-</a></Button>
                        &nbsp
                        <input class="input" style="width:30px; " disabled name="quantity" oninput="myF()" value="<?php echo $item['quantity'] ?>" />
                        &nbsp
                        <Button class="tang"><a href='tang.php?id=<?= $item['id'] ?>'>+</a></Button>
                    </td>


                    <td class="gia"><?php echo $item['price_sale'] ?></td>
                    <td>
                        <img style="width:50px; height: 50px;"  src="<?='../../Admin/QlSanPham/'.$item['image']?>" />
                    </td>
                    <td class="thanhtien"><?php echo $item['quantity'] * $item['price_sale'] ?></td>
                    <td>
                        <a href="javascript:confirmDelete('deleteCart.php?id=<?= $item['id'] ?>')">
                            <button class="btn btn-primary">Xóa</button>
                        </a>
                    </td>
            </tr>
        <?php endforeach ?>
        </table>
        <!-- <form action="" class="form">
            <div class="form-group">
                <label for="">Họ Và Tên</label>
                <input type="text" name="" id="">
            </div>
           
            <div class="form-group">
                <label for="">SDT</label>
                <input type="text" name="" id="">
            </div>
          

            <div class="form-group">
                <label for="">Địa chỉ </label>
                <input type="text" name="" id="">
            </div>
        </form> -->
        <form action="dathang.php" class="form" method="post">
            <h4 id="tongtien" style="color:red">Tổng tiền</h4>
            <button type="submit" class="btn btn-primary btn-order" >Đặt hàng</button>
        </form>
    </div>

</body>
<script type="text/javascript">
    let sl = document.querySelectorAll(".input")
    let tien = document.querySelectorAll(".thanhtien")
    let tongtien = document.querySelector("#tongtien")
    let gia = document.querySelectorAll(".gia")
    let tang = document.querySelectorAll(".tang")
    let giam = document.querySelectorAll(".giam")
    let tmp = 0
    tien.forEach((item, index) => {
        item.innerText = sl[index].value * gia[index].textContent
        tmp = tmp + (+item.textContent)
    })
    tongtien.innerText = "Tổng tiền:" + tmp

    function myF() {
        let tmp1 = 0
        tien.forEach((item, index) => {

            item.innerText = sl[index].value * gia[index].textContent
            tmp1 = tmp1 + (+item.textContent)
        })
        tongtien.innerText = "Tổng tiền:" + tmp1
    }
    tang.forEach((item, index) => {
        item.addEventListener("click", () => {
            sl[index].value++
            myF()
        })
    })
    giam.forEach((item, index) => {
        item.addEventListener("click", () => {
            sl[index].value--
            if (sl[index].value < 1 || sl[index].value == null) sl[index].value = 1;
            myF()
        })
    })

    function confirmDelete(delUrl) {
        if (confirm("Bạn chắc chắn muốn xóa sản phẩm này?")) {
            document.location = delUrl;
        }
    }
    if(tongtien.textContent=="Tổng tiền:0")
    {
        let btnOrder=document.querySelector('.btn-order')
        btnOrder.disabled = true;

    }
     
    
</script>

</html>