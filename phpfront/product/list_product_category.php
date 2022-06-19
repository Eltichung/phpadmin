
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
.content3-list{
    margin: 0px 30px;
    display: flex;
    justify-content: center;
    max-width:1300px;
    flex-wrap: wrap;
}
</style>
</head>
<body>
    <?php 
     require "../../common/csdl.php";
     $cate_id=$_GET['id_cate'];
     $sql="select * from tbl_products where category_id='$cate_id'";
     $result=(mysqli_query($conn,$sql));
      ?>
   
   
    <?php require "../common/header_shop.php" ?>
   <h3 style="color:cadetblue; margin:20px 30px;">Danh mục sản phẩm thuộc thể loại kính 3D</h3> <br>
    <div class="content3-list">
                <?php foreach($result as $product=>$value){ ?>
                    <div class="content3-item" style="width:284px;box-sizing: border-box;">
                        <a href="./product/details_product.php?id_pro=<?php  echo $value['id'] ?>"><img style="width:264;height:264px;" src="../../img/<?php  echo $value['avatar']?>" ?> </a>
                        <h4 ><p style="overflow-x: hidden;"><?php  echo $value['title'] ?></p></h4>
                        <h5><?php  echo $value['price'] ?></h5>
                        <div class="content3-emote">
                            <i class="far fa-heart"></i>
                            <i class="fas fa-eye"></i>
                            <?php if(isset($_SESSION['id'])){ ?>
                           <a href="./cart/add_to_cart.php?id_pro=<?php echo $value['id'] ?>"> <i class="fas fa-shopping-cart"></i></a>
                           <?php }?>
                        </div>
                    </div>
                    <?php }?>
                    
                </div>
   
        <?php require "../common/footer_shop.php" ?>
    
</body>
</html>