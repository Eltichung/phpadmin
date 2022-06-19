
<?php 
//session_start();
    //session_destroy();
    //die();
require "../common/csdl.php";
 $sql="select * from sanpham";
 $result_hot = mysqli_query($conn,$sql);
 $sql="select * from sanpham";
 $result_noi_bat = mysqli_query($conn,$sql);

 $result_ban_chay=(mysqli_query($conn,$sql));

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>PHP</title>
    <style> 
        .slick-slide {
            width: 280px!important; 
        }
        .content1 {
            margin: 0 auto;overflow: hidden;width: 1175px;
        }
        .img {
            max-height: 292px;
            object-fit: cover;
            padding-left: 20px;
        }
        
    </style>
  <?php require "./common/link_shop.php" ?>
</head>
<body>
    <main>
    <?php require "./common/header_shop.php" ?>
        
        <div class="content">
            <div class="content-header">
                <img src="./image/banner.PNG" alt="" class="content-header-img">
            </div>
            <div class="content1">
                <img class="img" src="./image/thoitrang7.PNG" alt="">
                <img class="img" src="./image/thoitrang3.PNG" alt="">
                <img class="img" src="./image/thoitrang4.PNG" alt="">
                <img class="img" src="./image/thoitrang5.PNG" alt="">
            </div>
            <div class="content2">
                <div class="content2-1">
                    <span class="content2-1-1">SẢN PHẨM</span>
                    <span class="content2-1-2">NỔI BẬT</span>
                </div>
                <div class="content2-2">
                    <span>Kính unisex</span>
                    <span>Kính mắt nam</span>
                    <span>Kính mắt nữ</span>
                </div>
                <div class="content3-list" style = "display: flex; justify-content:center; ">
                    <?php while($r = mysqli_fetch_assoc($result_noi_bat)){ ?>
                    <div class="content3-item" style="width:284px;box-sizing: border-box; ">
                        <a href="./product/details_product.php?id_pro=<?=$r['id']?>"><img style="width:264px ;height:264px;" src="<?="../Admin/QlSanPham/".$r['image']?>" alt=""></a>
                        <h4 ><p style="overflow-x: hidden;"><?=$r['name'] ?></p></h4>
                        <span style="margin: 10px 4px 10px 0px; display:inline-block; text-decoration: line-through;"><?=$r['price_sale']?></span><span><?=$r['price_sale'] - ($r['price_sale'] * $r['discount'] / 100)?></span>
                        <div class="content3-emote">
                            <i class="far fa-heart"></i>
                            <i class="fas fa-eye"></i>
                            
                           <a href="javascript:confirmDelete('./Cartchung/addcart.php?id=<?=$r['id']?>')"> <i class="fas fa-shopping-cart"></i></a>
                           
                        </div>
                    </div>
                    <?php } ?>
                    
                </div>
            </div>
            <div class="content4">
                <div class="content4-left">
                    <div class="content4-left-list">
                        <div class="content4-left-item">
                           
                        </div>
                    </div>
                </div>
                <div class="content4-right">
                <img src="../img/1652520051.jpg" alt="" class="content4-right-img">
                    <div class="content4-right-right">
                        <div class="content4-right-page">
                            <a href="" class="content4-right-btn">
                                <i class="content4-right-btn-icon1 fas fa-angle-left"></i>
                            </a>
                            <a href="" class="content4-right-btn">
                                <i class="content4-right-btn-icon2 fas fa-angle-right"></i>
                            </a>
                        </div>
                        <h4>Mắt kính thời trang Nữ Dora 7148-C2</h4>
                        <h5>258000₫</h5>
                        <h6>Chất liệu gọng kính : Kim loại</h6>
                        <h6>Hết hạn</h6>
                        <button class="header-btn3">Thêm vào giỏ hàng</button>
                    </div>
                </div>
            </div>
            <div class="content2">
                <div class="content5-1">
                    <span class="content2-1-1">SẢN PHẨM</span>
                    <span class="content2-1-2">HOT</span>
                </div>
                <div class="content2-2">
                    <span>Kính unisex</span>
                    <span>Kính mắt nam</span>
                    <span>Kính mắt nữ</span>
                </div>
                
                <div class="content3-list">
                    <?php while($h = mysqli_fetch_assoc($result_hot)){ ?>
                    <div class="content3-item" >
                    <a href="./product/details_product.php?id_pro=<?=$h['id']?>"><img style="width:264;height:264px;" src="<?="../Admin/QlSanPham/".$h['image']?>" alt=""></a>
                        <h4 ><p style="overflow-x: hidden;"><?=$h['name'] ?></p></h4>
                        <span style="margin: 10px 4px 10px 0px; display:inline-block; text-decoration: line-through;"><?=$h['price_sale']?></span><span><?=$h['price_sale'] - ($h['price_sale'] * $h['discount'] / 100)?></span>
                        <div class="content3-emote">
                            <i class="far fa-heart"></i>
                            <i class="fas fa-eye"></i>
                            
                           <a href="javascript:confirmDelete('./Cartchung/addcart.php?id=<?=$h['id']?>')"> <i class="fas fa-shopping-cart"></i></a>
                           
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="content5">
                <img src="https://bizweb.dktcdn.net/100/369/704/themes/741072/assets/reviews_4_img.jpg?1638842751333" alt="" class="content5-img">
                <div class="content5-review">
                    <span>" Lần đầu đến mua tiệm thấy rất gọn gàng, sáng sủa, thoáng mát dễ chịu. Nhân viên nói chuyện nhỏ nhẹ, lịch sự, rất tôn trọng khách. "</span>
                    <h2>Thùy Dương - Người mẫu</h2>
                </div>
            </div>
            <div class="content6">
            <div class="content-sell">
                        <div class="content6-1">
                            <span class="content2-1-1">BÁN</span>
                            <span class="content2-1-2">CHẠY</span>
                        </div>
                        <div class="content6-page">
                            <a href="" class="content4-right-btn">
                                <i class="content4-right-btn-icon1 fas fa-angle-left"></i>
                            </a>
                            <a href="" class="content4-right-btn">
                                <i class="content4-right-btn-icon2 fas fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                <div class="content6-list" style="width:auto">
                    
                <?php while($h = mysqli_fetch_assoc($result_ban_chay)){ ?>
                    <div class="content6-item">
                        <img  class="content6-img" src="<?="../Admin/QlSanPham/".$h['image']?>" alt="">
                        <div class="content6-right">
                        <h4><?=$h['name']?></h4>
                        <h5><?=$h['price_sale']?></h5>
                        </div>
                    </div>
                <?php } ?> 
                    
                </div>
            </div>
            <div class="content6-bottom">
                <div class="content6-bottom-img">
                    <img src="https://bizweb.dktcdn.net/100/369/704/themes/741072/assets/brand1.png?1638842751333" alt="">
                    <img src="https://bizweb.dktcdn.net/100/369/704/themes/741072/assets/brand2.png?1638842751333" alt="">
                    <img src="https://bizweb.dktcdn.net/100/369/704/themes/741072/assets/brand3.png?1638842751333" alt="">
                    <img src="https://bizweb.dktcdn.net/100/369/704/themes/741072/assets/brand4.png?1638842751333" alt="">
                    <img src="https://bizweb.dktcdn.net/100/369/704/themes/741072/assets/brand5.png?1638842751333" alt="">
                    <img src="https://bizweb.dktcdn.net/100/369/704/themes/741072/assets/brand6.png?1638842751333" alt="">
                </div>
            </div>
            
            <?php require "./common/footer_shop.php" ?>
    </main>
</body>
<script>
     function confirmDelete(delUrl) {
        if (confirm("Thêm vào giỏ hàng?")) {
            document.location = delUrl;
        }
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js" integrity="sha512-eP8DK17a+MOcKHXC5Yrqzd8WI5WKh6F1TIk5QZ/8Lbv+8ssblcz7oGC8ZmQ/ZSAPa7ZmsCU4e/hcovqR8jfJqA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    $(document).ready(function(){
    $('.content3-list').slick({
        slidesToShow: 4,
        slidesToScroll: 2,
        autoplay: true,
        autoplaySpeed: 2000,
    });
});
</script>
</html>