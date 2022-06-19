
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
    .large-9{
        margin-left: 220px;
        margin-top: 50px;
        margin-right: 50px;
    }
    .page-inner {
        margin-right: 50px;
    }
    .entry-header {

    }
    .entry-title {

    }
    .intro {
        
    margin-top: 20px;
    margin-bottom: 20px;

    }
    .header-contact{

    }
    .list {
        margin-top: 20px;
        margin-bottom: 20px;
    }
    .item {
        margin-left: 17px;

    }
</style>
</head>
<body>
    
    <main>
    <?php session_start(); require "../common/header_shop.php";
    ?>
    <div class="large-9 col khung-noidung khung-noidung-left">
			<div class="page-inner">
				
                <header class="entry-header">
                <h2 class="entry-title mb uppercase">Liên hệ</h2>
                </header><!-- .entry-header -->									
                <p class = "intro"> Website bán kính thời trang này nhằm giúp khách hàng tiếp cận nhanh hơn những mặt hàng kính đa dạng có trong cửa hàng. Cũng  như giúp người quản lý cập nhật và thông kê sản phẩm , doanh thu,… một cách nhanh chóng .</p>
                <h2 class = "header-contact">Mọi thông tin xin liên hệ</h2>
                <ul class = "list">
                <li class = "item">Địa chỉ: số 46 – ngõ 6 Vũ Hữu – Đường Tố Hữu – Thanh Xuân</li>
                <li class = "item">Hotline:&nbsp;0363 280 183</li>
                <li class = "item">Zalo : 0363 280 183</li>
                <li class = "item">dtn.cntt@gmail.com</li>
                </ul>
                <div class="mapouter"><div class="gmap_canvas"><iframe class="gmap_iframe" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=1071&amp;height=400&amp;hl=en&amp;q=Hà Nội&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://mcpepro.com/">MCPEPRO</a></div><style>.mapouter{position:relative;text-align:right;width:1071px;height:400px;}.gmap_canvas {overflow:hidden;background:none!important;width:1071px;height:400px;}.gmap_iframe {width:1071px!important;height:400px!important;}</style></div>

						
				</div><!-- .col-inner -->
		</div>
      
       
        <?php require "../common/footer_shop.php" ?>
    </main>
</body>
</html>