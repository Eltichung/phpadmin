<?php
require "../../common/csdl.php"; 
$id=$_GET['id'];
$sql="select * from taikhoan where id=$id";
$result=mysqli_fetch_row(mysqli_query($conn,$sql));
$username=$result[1];
$phone=$result[4];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhóm 24</title>
	<link rel="stylesheet" href="../asset/css/side_bar.css">
  <?php require "../common/link_shop.php" ?>
  

<style type="text/css">
.content-user{
    display: flex;
    justify-content: center;
}
.content-user >div{
    margin-left: 100px;
}
.form-style-2{
	max-width: 500px;
	padding: 20px 12px 10px 20px;
	font: 13px Arial, Helvetica, sans-serif;
}
.form-style-2-heading{
	font-weight: bold;
	font-style: italic;
	border-bottom: 2px solid #ddd;
	margin-bottom: 20px;
	font-size: 15px;
	padding-bottom: 3px;
}
.form-style-2 label{
	display: block;
	margin: 0px 0px 15px 0px;
}
.form-style-2 label > span{
	width: 300px;
	font-weight: bold;
	color:gray;
	float: left;
	padding-top: 8px;
	padding-right: 5px;
}
.form-style-2 span.required{
	color:red;
}
.form-style-2 .tel-number-field{
	width: 40px;
	text-align: center;
}
.form-style-2 input.input-field, .form-style-2 .select-field{
	width: 70%;	
}
.form-style-2 input.input-field, 
.form-style-2 .tel-number-field, 
.form-style-2 .textarea-field, 
 .form-style-2 .select-field{
	box-sizing: border-box;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	border: 1px solid #C2C2C2;
	box-shadow: 1px 1px 4px #EBEBEB;
	-moz-box-shadow: 1px 1px 4px #EBEBEB;
	-webkit-box-shadow: 1px 1px 4px #EBEBEB;
	border-radius: 3px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	padding: 7px;
	outline: none;
}
.form-style-2 .input-field:focus, 
.form-style-2 .tel-number-field:focus, 
.form-style-2 .textarea-field:focus,  
.form-style-2 .select-field:focus{
	border: 1px solid #0C0;
}
.form-style-2 .textarea-field{
	height:100px;
	width: 55%;
  
}
.form-style-2 input[type=submit],
.form-style-2 input[type=button]{
	border: none;
	padding: 8px 15px 8px 15px;
	background: #FF8500;
	color: #fff;
	box-shadow: 1px 1px 4px #DADADA;
	-moz-box-shadow: 1px 1px 4px #DADADA;
	-webkit-box-shadow: 1px 1px 4px #DADADA;
	border-radius: 3px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
}
.form-style-2 input[type=submit]:hover,
.form-style-2 input[type=button]:hover{
	background: #EA7B00;
	color: gray;
}
</style></head>
<body>
    <main>
    <?php require "../common/header_shop.php" ?>

    
        <div class="contenta" style="margin-top:20px;display: flex;justify-content: stretch;">
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
                    <a href="infomation.php?id=<?=$id?>" class="active">
                        <span class="icon"><i class="fas fa-user"></i></span>
                        <span class="item">Hồ sơ</span>
                    </a>
                </li>
                <li>
                    <a href="change_password.php?id=<?=$id?>">
                        <span class="icon"><i style="color:orange" class="fas fa-key"></i></span>
                        <span class="item">Đổi mật khẩu</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i  style="color:#0c7db1" class="fas fa-book"></i></span>
                        <span class="item">Đơn mua</span>
                    </a>
                </li>
              
               
            </ul>
        	</div>
		</div>
	
      
       
		
                <div class="content-user" style="display: flex;margin-top: 100px;">
                   
                   
                    <div class="form-style-2 form-user">
                        <div class="form-style-2-heading">Thông tin cá nhân
                            <br>
                            <p style="font-weight: 100;color:gray">Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
                        </div>
                        <h3 style=" color:green"><?php if(isset($_GET['error'])){echo $_GET['error'];} ?></h3>
                        <form action="process_update_infor.php" method="post">
                        <label for="field1"><span>Tên tài khoản </span></span><input type="text" class="input-field" name="username" value="<?php echo $username ?>" /></label>
                        <label for="field2"><span>Số điện thoại </span></span><input type="text" class="input-field" name="phone"value=<?php echo $phone ?>  /></label>
                        
                       <input style="display:none;" name="id" value=<?=$id?>   />

                        <label><span> </span><input type="submit" value="Sửa thông tin" /></label>
                        </form>
                 </div>
				 <div class="image-user">
                        <img  style="width:150px;border-radius: 55%;align-items: center;" src="/phpadmin/phpfront/image/user_avatar.PNG" alt="">
                    </div>
              
                </div>
				</div>

                <?php require "../common/footer_shop.php" ?>

    </main>
</body>
</html>