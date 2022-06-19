<?php 
require "../../common/csdl.php"; 
$id=$_SESSION['id'];
$sql="select * from tbl_users where id='$id'";
$result=mysqli_fetch_array(mysqli_query($conn,$sql));
$username=$result['username'];

function get_product($pro_id){
	global $conn;
	$sql="select * from tbl_products  where id='$pro_id'"; 
	$result=(mysqli_query($conn,$sql));
	
	return $result;
}
function get_order_id_by_type($type){
    global $conn;
    global $id;
    $sql="select id from tbl_order  where user_id='$id' and type='$type'"; 
    $result=(mysqli_query($conn,$sql));
    $order_id=array();
    foreach($result as $row){	
        
	array_push($order_id,$row);
    }
    return $order_id;
}
function get_order_by_type($type,$status){
    global $conn;
    global $id;
    $sql="select * from tbl_order as o inner join tbl_order_details as os on 
    o.id=os.order_id where o.user_id='$id' and type='$type' and o.status='$status'"; 
    $result=(mysqli_query($conn,$sql));
    $order=array();
    foreach($result as $row){
        //print_r($row);	
        array_push($order,$row);
    }
    return $order; 
}
$order_bought=get_order_by_type('bought',1);
$order_bought_id=get_order_id_by_type('bought');

$order_confirm=get_order_by_type('confirm',1);
$order_confirm_id=get_order_id_by_type('confirm');

$order_wait=get_order_by_type('wait',1);
$order_wait_id=get_order_id_by_type('wait');

$order_cancel=get_order_by_type('cancel',0);
$order_cancel_id=get_order_id_by_type('cancel');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhóm 24</title>
	
  <?php require "../common/link_shop.php" ?>
  <link rel="stylesheet" href="../asset/css/side_bar.css">
    <link rel="stylesheet" href="../asset/css/order.css">
</head>
<body>
    <main>
    <?php require "../common/header_shop.php" ?>

    
        <div class="contenta" style="display: flex;justify-content: stretch;background-color: #edf0f4;">
	<div class="wrapper">
		  <!--Top menu -->
		<div class="sidebar">
		<div class="profile">
                <img src="/phpadmin/phpfront/image/user_avatar.PNG" alt="profile_picture">
                <h3><?php echo $username;?></h3>
                <p>Người dùng</p>
            </div>
           <!--profile image & text-->
            <!--menu item-->
			<ul>
                <li>
                    <a href="infomation.php" class="active">
                        <span class="icon"><i class="fas fa-user"></i></span>
                        <span class="item">Hồ sơ</span>
                    </a>
                </li>
                <li>
                    <a href="change_password.php">
                        <span class="icon"><i style="color:orange" class="fas fa-key"></i></span>
                        <span class="item">Đổi mật khẩu</span>
                    </a>
                </li>
                <li>
                    <a href="order_buy.php">
                        <span class="icon"><i  style="color:#0c7db1" class="fas fa-book"></i></span>
                        <span class="item">Đơn mua</span>
                    </a>
                </li>
              
               
            </ul>
        	</div>
		</div>

                <div class="content-user">
                   
                <div class="tab-check">
                    <!-- Tab links -->
				<div class="tab">
				<button class="tablinks active" onclick="openCity(event, 'all')">Đã mua</button>
				<button class="tablinks" onclick="openCity(event, 'confirm')">Chờ xác nhận</button>
				<button class="tablinks" onclick="openCity(event, 'wait-items')">Đang giao hàng</button>
				<button class="tablinks" onclick="openCity(event, 'cancel')">Đã hủy</button>
				</div>

				<!-- Tab content -->
				<div id="all" class="tabcontent " style="display:block" >
				
				<div class="list-cart">
               
					<?php
					
                    foreach($order_bought_id as $value_order){
                        ?>
                    
                        <div class="order_id">
                      <?php  $sum=0;
						foreach($order_bought as $key=>$value){?>
                          
                           <?php
                                if($value_order['id']===$value['order_id']){
                                   
                                    $result1=get_product($value['product_id']);
                                    $product_name;
                                    foreach($result1 as $value1){
                                    
                                    ?>
                                <div class="clear"></div>
                                    <div class="col-sp" id="">
                                    <div class="c1"><img src="../../img/<?php  print_r($value1['avatar']) ?>"/></div>
                                    <div class="c2" ><div class="c2-title" ><?php print_r ($value1['title']) ?></div> 
                                    <div class="c2-quality" >x<?php print_r($value['quality']) ?></div> 
                                    <div class="c2-days"> 7 ngày trả hàng</div></div>
                                    
                                    <div class="c4"><span id=""><?php print_r( number_format(($value1['price']*$value['quality']))) ?></span></div>
                                
                                </div>
                                
                                <?php 
                                $sum+=$value1['price']*$value['quality'];
                            
						            }
                    }
                        }?>
                       
                       <input id="giatong" name="" type="hidden" value="740000">
                        <div class="rbottom"><div id=""><span>Hóa đơn ngày: <?php echo $value['created_date'] ?></span><span style="float:right; padding-right:10px">TỔNG TIỀN: <span id="texttotal"><?php echo number_format($sum)?></span></span></div></div>
                        </div>
		        	<?php  }				?>
                   
                </div>
               
            </div>
				
				

				<div id="confirm" class="tabcontent">
                <div class="list-cart">
                   
                   <?php
                   
                   foreach($order_confirm_id as $value_order){
                   
                       ?>
                   
                       <div class="order_id">
                     <?php  $sum=0;
                       foreach($order_confirm as $key=>$value){
                          
                               if($value_order['id']===$value['order_id']){
                              
                                   $result1=get_product($value['product_id']);
                                   $product_name;
                                   foreach($result1 as $value1){
                                   
                                   ?>
                               <div class="clear"></div>
                                   <div class="col-sp" id="">
                                   <div class="c1"><img src="../../img/<?php  print_r($value1['avatar']) ?>"></div>
                                   <div class="c2" ><div class="c2-title" ><?php print_r ($value1['title']) ?></div> 
                                   <div class="c2-quality" >x<?php print_r($value['quality']) ?></div> 
                                   <div class="c2-days"> 7 ngày trả hàng</div></div>
                                   
                                   <div class="c4"><span id=""><?php print_r( number_format(($value1['price']*$value['quality']))) ?></span></div>
                               
                               </div>
                               
                               <?php 
                               $sum+=$value1['price']*$value['quality'];
                           
                                   }
                   }
                       }?>
                      
                      <input id="giatong" name="" type="hidden" value="740000">
                       <div class="rbottom"><div id=""><span>Hóa đơn ngày: <?php echo $value['created_date']; ?></span><a style="float: right; margin-right:20px;color:#0c7db1;font-size: 17px;" href="process_user_order_cancel.php?order_id=<?php echo  $value['id']; ?>">   Hủy</a><span style="float:right; padding-right:10px">TỔNG TIỀN: <span id="texttotal"><?php echo number_format($sum)?></span></span></div></div>
                       </div>
                   <?php  }				?>
                  
               </div>
                <!-- end confirm -->
				</div>

				<div id="wait-items" class="tabcontent">
                <div class="list-cart">
                   
                   <?php
                   
                   foreach($order_wait_id as $value_order){
                   
                       ?>
                   
                       <div class="order_id">
                     <?php  $sum=0;
                       foreach($order_wait as $key=>$value){
                          
                               if($value_order['id']===$value['order_id']){
                              
                                   $result1=get_product($value['product_id']);
                                   $product_name;
                                   foreach($result1 as $value1){
                                   
                                   ?>
                               <div class="clear"></div>
                                   <div class="col-sp" id="">
                                   <div class="c1"><img src="../../img/<?php  print_r($value1['avatar']) ?>"></div>
                                   <div class="c2" ><div class="c2-title" ><?php print_r ($value1['title']) ?></div> 
                                   <div class="c2-quality" >x<?php print_r($value['quality']) ?></div> 
                                   <div class="c2-days"> 7 ngày trả hàng</div></div>
                                   
                                   <div class="c4"><span id=""><?php print_r( number_format(($value1['price']*$value['quality']))) ?></span></div>
                               
                               </div>
                               
                               <?php 
                               $sum+=$value1['price']*$value['quality'];
                           
                                   }
                   }
                       }?>
                      
                      <input id="giatong" name="" type="hidden" value="740000">
                       <div class="rbottom"><div id=""><span>Hóa đơn ngày: <?php echo $value['created_date'] ?></span><span style="float:right; padding-right:10px">TỔNG TIỀN: <span id="texttotal"><?php echo number_format($sum)?></span></span></div></div>
                       </div>
                   <?php  }				?>
                  
               </div>
               <!-- end wait -->
				</div>
				<div id="cancel" class="tabcontent">
				<div class="list-cart">
                   
					<?php
					
                    foreach($order_cancel_id as $value_order){
                        ?>
                    
                        <div class="order_id">
                      <?php  $sum=0;
						foreach($order_cancel as $key=>$value){
                           
                                if($value_order['id']===$value['order_id']){
                                   
                                    $result1=get_product($value['product_id']);
                                    $product_name;
                                    foreach($result1 as $value1){
                                    
                                    ?>
                                <div class="clear"></div>
                                    <div class="col-sp" id="">
                                    <div class="c1"><img src="../../img/<?php  print_r($value1['avatar']) ?>"></div>
                                    <div class="c2" ><div class="c2-title" ><?php print_r ($value1['title']) ?></div> 
                                    <div class="c2-quality" >x<?php print_r($value['quality']) ?></div> 
                                    <div class="c2-days"> 7 ngày trả hàng</div></div>
                                    
                                    <div class="c4"><span id=""> <?php print_r( number_format(($value1['price']*$value['quality']))) ?></span></div>
                                
                                </div>
                                
                                <?php 
                                $sum+=$value1['price']*$value['quality'];
                            
						            }
                    }
                        }?>
                       
                       <input id="giatong" name="" type="hidden" value="740000">
                        <div class="rbottom"><div id=""><span style="float:right; padding-right:10px">TỔNG TIỀN: <span id="texttotal"><?php echo number_format($sum)?></span></span></div></div>
                        </div>
		        	<?php  }				?>
                   
                </div>
				</div>
				</div>
                </div>
				</div>

                <?php require "../common/footer_shop.php" ?>

    </main>
</body>
<script>
	function openCity(evt, cityName) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
</html>