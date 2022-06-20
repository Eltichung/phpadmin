<?php 
    require "../../common/csdl.php";
   
     $id=$_SESSION['id'];
     $name=$_POST['sName'];
     $phone=$_POST['sPhone'];
     $email=$_POST['sEmail'];
     $address=$_POST['sAddress'];
     $total=floatval($_POST['total']);
     

     $id_u=$_SESSION["id"];
     $cart_id="cart".$id_u;
    
     $each=json_decode($_COOKIE[$cart_id],true);
   
    $i=0;
    $keys=array_keys((array)$each);
   
    $created_date=date('Y-m-d H:i:s');
    
        
            //echo $created_date;
            
          
        $sql="INSERT INTO tbl_order(user_id,customer_name,customer_address,customer_phone,cutomer_email,total,created_date,type)
        VALUES($id,'$name','$address','$phone','$email','$total','$created_date','confirm')";
        mysqli_query($conn,$sql);
        
      
        $sql="select * from tbl_order where created_date='$created_date'";
        $oder_id=mysqli_fetch_array(mysqli_query($conn,$sql))['id'];
        print_r($oder_id);
        foreach($each as $cart){
            $product_id=$keys[$i];
            $quanlity=$cart['quanlity'];
            $sql="insert into tbl_order_details(order_id,product_id,quality)
        values('$oder_id',$product_id,$quanlity);";
        mysqli_query($conn,$sql);
        $i++;
        }
        $id_u=$_SESSION['id'];
        $cart_id="cart".$id_u;
        unset($_SESSION[$cart_id]);
        setcookie($cart_id,-1);
        setcookie('count_cart',0);
        mysqli_close($conn);
       
        header("Location: ../../phpfront/account/order_buy.php");

?>