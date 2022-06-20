<?php
session_start();
?>
<div class="header">
            <div class="header-logo">
          <a href="/phpadmin/phpfront/index.php"> <img style="width:200px;height:250px" src="/phpadmin/phpfront/image/Quang-Thang.png" alt=""></a>
            </div>
            <div class="header-search">
                <form method="get" action="/phpadmin/phpfront/search_product.php" style="width: 100%;">
                <input type="text" name="search" class="header-search-input" placeholder="Tìm kiếm...">
                
                </form>
            </div>
            <?php if(isset($_SESSION['id'])){ ?>
            <div class="header-bag">
            <a href="/phpadmin/phpfront/Cartchung/view_cart.php"><img src="https://bizweb.dktcdn.net/100/369/704/themes/741072/assets/icon_cart.png?1638842751333" alt="" class="header-bag-img"></a>
                       

                
            </div>
            <?php }?>
            <div class="header-btn">
              
                <?php
                if(!isset($_SESSION['id'])){?>             
                <button class="header-btn2">
                    TÀI KHOẢN
                    <ul class="login-signup">
                        <li><a href="./account/log_in.php">ĐĂNG NHẬP</a></li>
                        <li><a href="./new_account/register.php">ĐĂNG KÝ</a></li>
                    </ul>
                </button>
                 <?php  }else{ 
                    $id=$_SESSION['id']?>
                   <button class="header-btn2" style="font-size:20px;text-align: center;
                   align-content: center;display: flex;justify-content: center;"><img style="width: 30px;height: 30px;border-radius: 50%;margin-right: 5px;" src="/phpadmin/phpfront/image/user_avatar.PNG" alt="profile_picture"><?php echo $_SESSION['name']?>
                   <ul class="login-signup" style="font-size: 15px;text-align: left;">
                        <li><a href="/phpadmin/phpfront/account/infomation.php?id=<?=$id?>">Tài khoản của tôi</a></li>
                        <li><a href="/phpadmin/phpfront/account/order_buy.php">Đơn mua</a></li>
                        <li><a href="/phpadmin/phpfront/account/process_logout.php">Đăng xuất</a></li>
                    </ul>
                    </button>
                   <?php } ?>
            </div>
          
        </div>
        <div class="category">
            <ul class="category-list">
                <li class="category-item-sp">
                    <a href="">
                        <i class="fas fa-list"></i>
                        DANH MỤC SẢN PHẨM
                    </a>
                    <ul class="category-sp-list">
                        <li class="category-sp-item">
                            <a href="/phpadmin/phpfront/product/list_product_category.php?id_cate=2">
                                <i class="fas fa-chevron-right"></i>Kinh mắt 3D
                            </a>
                        </li>
                        <li class="category-sp-item">
                            <a href="">
                                <i class="fas fa-chevron-right"></i>Kính chuyên dụng
                            </a>
                        </li>
                       
                        <li class="category-sp-item">
                            <a href="">
                                <i class="fas fa-chevron-right"></i>Kính chuyên dụng
                            </a>
                        </li>
                        <li class="category-sp-item">
                            <a href="">
                                <i class="fas fa-chevron-right"></i>Kính cận nam
                            </a>
                        </li>
                        <li class="category-sp-item">
                            <a href="">
                                <i class="fas fa-chevron-right"></i>Kính cận nữ
                            </a>
                        </li>
                     
                      
                    </ul>
                </li>
                <li class="category-item"><a href="/phpadmin/phpfront/">TRANG CHỦ</a></li>
                <li class="category-item-sp"><a href="">NHÃN HIỆU</a>
                    <ul class="category-sp-list">
                        <li class="category-sp-item">
                            <a href="/phpadmin/phpfront/showAllSP.php?brand=dora" class="sub-category-link">
                                <i class="fas fa-chevron-right"></i>DORA</a></li>
                        <li class="category-sp-item">
                            <a href="/phpadmin/phpfront/showAllSP.php?brand=philippe" class="sub-category-link">
                                <i class="fas fa-chevron-right"></i>PHILIPPE</a></li>
                        <li class="category-sp-item">
                            <a href="/phpadmin/phpfront/showAllSP.php?brand=prada" class="sub-category-link">
                                <i class="fas fa-chevron-right"></i>PRADA</a></li>
                        <li class="category-sp-item">
                            <a href="/phpadmin/phpfront/showAllSP.php?brand=owndays" class="sub-category-link">
                                <i class="fas fa-chevron-right"></i>OWNDAYS</a></li>
                        <li class="category-sp-item">
                            <a href="/phpadmin/phpfront/showAllSP.php?brand=mango" class="sub-category-link">
                                <i class="fas fa-chevron-right"></i>MANGO</a></li>
                    </ul>
                </li>
                <li class="category-item"><a href="/phpadmin/phpfront/showAllSP.php">SẢN PHẨM</a></li>
                <li class="category-item-sp"><a href="">GIÁ BÁN</a>
                    <ul class="category-sp-list">
                        <li class="category-sp-item">
                            <a href="/phpadmin/phpfront/showAllSP.php?price=1" class="sub-category-link">
                                <i class="fas fa-chevron-right"></i>Dưới 2 triệu</a></li>
                        <li class="category-sp-item">
                            <a href="/phpadmin/phpfront/showAllSP.php?price=2" class="sub-category-link">
                                <i class="fas fa-chevron-right"></i>Từ 2 - 4 triệu</a></li>
                        <li class="category-sp-item">
                            <a href="/phpadmin/phpfront/showAllSP.php?price=3" class="sub-category-link">
                                <i class="fas fa-chevron-right"></i>Trên 4 triệu</a></li>
                        
                    </ul>
                </li>
               
                <li class="category-item"><a href="/phpadmin/phpfront/contact/contact.php">LIÊN HỆ</a></li>
            </ul>
        </div>