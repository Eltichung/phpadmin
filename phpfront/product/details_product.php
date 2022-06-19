<?php 
   require "../../common/csdl.php";
   $id_pro=$_GET['id_pro'];
   $sql="select * from sanpham where id='$id_pro'";
   $result=mysqli_fetch_assoc(mysqli_query($conn,$sql));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>
   <?php require "../common/link_shop.php"; ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
.product-img {
    height: 100%;
    width: 400px;
}
.product_decription{
    margin: 10px 0 0 10px;
}
.decription-h1{
    line-height: 1.3em;
    font-size: 24px;
    color: #333;
    font-weight: normal;
    margin-right: 10px;
}
.product_status{
    color: #333;
    font-weight: 600;
}
.product_point{
    display: inline-block;
    border: 1px solid #dadada;
    margin: 5px 10px 0 0;
    text-align: center;
    padding: 6px 10px;
    min-width: 40px;
    cursor: pointer;
}
.product_point:hover{
    border: 1px solid #106f85;
}
.product_price{
    float: left;
    font-size: 22px;
    color: #d0021b;
    margin-bottom: 6px;
    font-weight: bold;
}
.product_discount{
    float: left;
    font-size: 18px;
    margin: 4px 0 0 10px;
    text-decoration: line-through;
    color: #666;
}
.product_percent{
    background: #d0021b;
    padding: 2px 5px;
    color: #fff;
    float: left;
    margin-left: 10px;
    margin-top: 4px;
    border-radius: 5px;
    font-size: 13px;
}
.decription_product{
    width: 500px;
    margin-top: 10px;
    clear: both;
    border-top: 1px dashed #ccc;
    padding: 10px 0;
}
.product_count{
    display: flex;
}
.count{
    width: 80px;
    text-align: center;
    border-radius: 4px;
    border: 1px solid #dadada;
    padding: 4px 10px;
    float: left;
}
.increase{
    width: 34px;
    padding: 4px 6px;
    border-radius: 4px;
    margin-right: 0px;
    cursor: pointer;
    box-sizing: border-box;
    text-align: center;
    -webkit-appearance: none;
    border: 1px solid #dadada;
    float: left;
    margin-left: 5px;
}
.increase:hover,.reduction:hover{
    background-color: #d0021b;
    color: #fff;
}
.reduction{
    width: 34px;
    padding: 4px 6px;
    border-radius: 4px;
    margin-right: 5px;
    cursor: pointer;
    -webkit-appearance: none;
    box-sizing: border-box;
    text-align: center;
    border: 1px solid #dadada;
    float: left;
    margin-left: 5px;
}
.product_count span{
    float: left;
    margin-top: 4px;
    font-style: italic;
}
.buynow{
    float: left;
    width: 180px;
    overflow: hidden;
    padding: 9px 0;
    margin: 10px 10px 0 0px;
    font-size: 16px;
    color: #fff;
    text-align: center;
    text-transform: uppercase;
    border: 1px solid #d97f00;
    border-radius: 4px;
    background: #f89406;
    cursor: pointer;
}
.intocart{
    float: left;
    width: 180px;
    overflow: hidden;
    padding: 9px 0;
    margin: 10px 0 0 0px;
    font-size: 16px;
    color: #f89406;
    text-align: center;
    text-transform: uppercase;
    border: 1px solid #f89406;
    border-radius: 4px;
    cursor: pointer;
    background: #fff;
}
a{
    text-decoration: none !important;
}
</style>
</head>
<body>
    
    <main>
    <?php require "../common/header_shop.php" ?>
        <div class="content1">
        <img src="../../Admin/QlSanPham/<?=$result['image']?>" alt="" class="product-img">
        <div class="description">
                <div class="product_decription">
                    <h1 class="decription-h1"><?php print_r($result['name']) ?></h1>
                </div>
                <div class="product_decription">
                    Mã hàng: <span class="product_status"><?php print_r($result['id']) ?></span> <br>
                </div>
                <div class="product_decription">
                    Trạng thái: <span class="product_status">Còn hàng</span> <br>
                </div>
                <div class="product_decription">
                    <span class="product_status">Chất liệu: </span>Kính cao cấp
                </div>
                <div class="product_decription">
                    <span class="product_status">Kích thước: </span> <br>
                    <span class="product_point">FREE SIZE</span>
                </div>
             
                <div class="product_decription">
                    <p class="product_price"><?php print_r(number_format($result['price_sale'])) ?>đ</p>
                  
                </div>
                <div class="product_decription">
                    <br><p class="decription_product"><?php print_r($result['detail_des']) ?></p>
                </div>
                <div class="product_decription">
                <a href="javascript:confirmDelete('../Cartchung/addcart.php?id=<?=$id_pro?>')" style="display:inline-block;min-width:100px;height:30px; background:blue;color:white; padding:5px 10px; border-radius: 10px; font-weight: 700"> <i class="fas fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                </div>
                <div class="product_decription">
            </div>
        </div>
        </div>
      
       
        <?php require "../common/footer_shop.php" ?>
    </main>
    <script >
        function confirmDelete(delUrl) {
        if (confirm("Thêm vào giỏ hàng?")) {
            document.location = delUrl;
        }
    }
    </script>
</body>
</html>