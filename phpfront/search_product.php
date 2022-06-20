
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require "./common/link_shop.php" ?>
</head>
<body>
<?php require "./common/header_shop.php" ?>

    <div class="allSP" style="display: flex; flex-wrap: wrap; justify-content: center;">
    <?php
     require "./showAllSP/Connect.php";
     $search=$_GET['search'];
     $sql="select * from sanpham where name like '%$search%'";
     $result = mysqli_query($conn, $sql);
     while($r = mysqli_fetch_assoc($result)){
 ?>
         <div class="content3-item" style="width:284px;box-sizing: border-box; ">
             <a href="./product/details_product.php?id_pro=<?=$r['id']?>"><img style="width:264px ;height:264px;"  src="<?="../Admin/QlSanPham/".$r['image']?>" alt=""></a>
             <h4 ><p style="overflow-x: hidden;"> <?=$r['name']?></p></h4>
             <span style="margin: 10px 4px 10px 0px; display:inline-block; text-decoration: line-through;"><?=$r['price_sale']?></span> <span><?=$r['price_sale'] - ($r['price_sale'] * $r['discount'] / 100)?></span>
             <div class="content3-emote">
                 <i class="far fa-heart"></i>
                 <i class="fas fa-eye"></i>
                 
                <a href="javascript:confirmAdd('./Cartchung/addcart.php?id=<?=$r['id']?>')"> <i class="fas fa-shopping-cart"></i></a>
                
             </div>
         </div>
 <?php     
     }
 ?>
     </div>
     <?php require "./common/footer_shop.php" ?>
     <script>
         function confirmAdd(delUrl) {
         if (confirm("Thêm vào giỏ hàng?")) {
             document.location = delUrl;
         }
     }
     </script>
 </body>
 </html>