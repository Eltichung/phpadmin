<?php 
    require "../../common/csdl.php";
   
    $id_u=$_SESSION["id"];
    $cart_id="cart".$id_u;
   // setcookie($cart_id,-1);
  
    if((empty($_COOKIE[$cart_id]))){
      
    }else{
        $each=json_decode($_COOKIE[$cart_id],true);
        $keys=array_keys((array)$each);
        // dem so lượng sản phẩm có trong giỏ hàng
        $count=0;
        foreach($keys as $value){
            $count++;
        }
        
        $_SESSION['count_cart']=$count;
    }
   
   
    $i=0;
    $sum=0;
   
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
 .content1{
    width: 1035px;
    margin-left: 188px;
    display:block;
}
.order_cart{
    margin-top: 0px;
    text-align: center;
    padding: 20px 0;
}
.titlecart{
    font-size: 20px;
    font-weight: normal;
    clear: both;
    margin-bottom: 20px;
    text-align: left;
    color: #106f85;
}
.vitri{
    width: 26px;
    height: 26px;
    border-radius: 100%;
    background: #106f85;
    text-align: center;
    float: left;
    margin-right: 10px;
    color: #fff;
    font-size: 14px;
    padding-top: 3px;
}
.list-cart{
    border: 1px solid #ddd;
    font-size: 14px;
}
.rhead{
    background: #106f85;
    color: #fff;
    padding: 5px;
    overflow: hidden;
}
.col-sp{
    border-bottom: 1px solid #ccc;
    padding: 10px 0;
    overflow: hidden;
}

.c1{
    float: left;
    width: 10%;
}
.c1 img{
    max-width: 100%;
    max-height: 50px;
}
.c2{
    float: left;
    width: 40%;
}
.c3{
    float: left;
    width: 20%;
}
.c3 a{
    text-decoration: none;
}
.c4{
    float: left;
    width: 15%;
    color: #106f85;
    font-weight: bold;
}
.c5{
    float: left;
    width: 5%;
    text-align: left;
}
.c5 a{
    text-decoration: none;
}
.c5 input{
    border: 0;
    padding: 2px 9px;
    border-radius: 3px;
    background: #666;
    color: #fff;
    font-size: 10px;
    cursor: pointer;
}
.c6{
    float: left;
    width: 10%;
    text-align: left;
    color: #106f85;
}
.rbottom{
    text-align: left;
    padding: 5px 0;
    color: #106f85;
    padding-left: 10px;
    overflow: hidden;
    background: #f9f9f9;
}
.cart-row{
    width: 100%;
    display: inline-block;
    clear: both;
    margin-bottom: 8px;
}
.cart-label{
    float: left;
    width: 16%;
    text-align: right;
    font: 14px Arial,Helvetica,sans-serif;
    color: #888;
    padding: 11px 0;
    margin-right: 15px;
}
.cart-input{
    border: 1px solid #888;
    padding: 8px;
    float: left;
    width: 68%;
    border-radius: 5px;
    font-size: 12px;
   
}
.cart-input input{
    border: none;
    width: 100%;   
    height:30px;
}
.cart-input input ::focus-inner{
   border: none;
}
.order_product input{
   
    background: #ff4e00;
    color: #fff;
    padding: 8px 20px;
    border-radius: 4px;
    text-transform: uppercase;
    font-size: 13px;
    cursor: pointer;
}
</style>
</head>
<body>
    
    <main>
    <?php  require "../common/header_shop.php" ?>
        <div class="content1">
            <div class="order_cart">
                <div class="titlecart">
                    <span class="vitri">1</span>Xác nhận đơn hàng 
                   
                </div>
              <div style="text-align: left;"> <a style="color:#106f85"  href="../index.php">Thêm sản phẩm </a></div> 
          
              <div class="list-cart">
                    <div class="rhead">
                        <div class="c1">Hình ảnh</div>
                        <div class="c2">Sản phẩm</div>
                        <div class="c6" style="color:#fff">Giá bán</div>
                        <div class="c3">Số lượng</div>
                        <div class="c4" style="color:#fff; font-weight:normal">Thành tiền</div>
                        <div class="c5">Xóa</div>
                    </div>
                    <?php if(!empty($each)){
                     foreach ($each as $cart){ $sum+=$cart['quanlity']*$cart['price']?>
            
                    <div class="clear"></div>
                        <div class="col-sp" id="">
                        <div class="c1"><img src="../../img/<?php  print_r($cart['avatar']) ?>"></div>
                        <div class="c c2"><span><?php print_r($cart['name'])  ?></span></div>
                        <div class="c c6"><span id=""><?php print_r( number_format($cart['price']) ) ?></span></div>
                        <div class="c c3"><a href="update_quanlity_product.php?id_pro=<?php echo $keys[$i];?>&type=decrea">-</a>
                    <?php print_r($cart['quanlity'])?>
                    <a href="update_quanlity_product.php?id_pro=<?php echo $keys[$i];?>&type=increa">+</a></div>
                        <div class="c4"><span id=""><?php print_r( number_format($cart['quanlity']*$cart['price']));?></span></div>
                        <div class="c5"><a href="remove.php?id_pro=<?php echo $keys[$i];?>"  class="delete" >X</a></div>
                    </div>
                    <?php $i++; } }else{ }?>
                    <input id="giatong" name="" type="hidden" value="740000">
                    <div class="rbottom"><div id=""><span style="float:right; padding-right:10px">TỔNG TIỀN: <span id="texttotal"><?php echo number_format($sum);?> đ</span></span></div></div>
                </div>
            </div>
            <div class="order-info ">
                <div class="titlecart"><span class="vitri">2</span>Thông tin khách hàng</div>
                <div class="clear"></div>
                <form action="process_order_in_cart.php" method="post">
                <div class="cart-row">
                    <label class="cart-label">Địa chỉ email</label>
                    <div class="cart-input"><input type="text" value="" name="sEmail" placeholder="Nhập địa chỉ email"></div>
                </div>
                <div class="cart-row">
                    <label class="cart-label">Họ &amp; tên</label>
                    <div class="cart-input"><input type="text" value="" name="sName" placeholder="Nhập họ tên của bạn" onkeyup="saveinput('hoten',this.value);"></div>
                </div>
                <div class="cart-row">
                    <label class="cart-label">Điện thoại của bạn</label>
                    <div class="cart-input"><input type="text" value="" name="sPhone" placeholder="Mời nhập điện thoại"></div>
                </div>
                <div class="cart-row">
                    <label class="cart-label">Địa chỉ đầy đủ</label>
                    <div class="cart-input"><input type="text" value="" name="sAddress" placeholder="Số nhà,tên Đường,Thôn/Phường/Xã,Quận/Huyện,Tỉnh/TP"></div>
                </div>
               <input type="hidden" name="total" value=<?php echo $sum;?>>
                <div class="cart-row">
                    <label class="cart-label"></label>
                    <div class="order_product"><input type="submit" name="BtnSubmit" value="Đặt hàng"></div>
                </div>
                </form>
            </div>
        </div>
      
       
        <?php require "../common/footer_shop.php" ?>
    </main>
</body>
</html>