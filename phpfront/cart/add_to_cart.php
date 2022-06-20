<?php
    session_start();
    require "../../common/csdl.php";
    $id=$_GET['id_pro'];
    //unset($_SESSION['cart']);
   $id_u=$_SESSION['id'];
   $cart_id="cart".$id_u;
    if(empty($_SESSION[$cart_id][$id])){
        $sql="select * from tbl_products where id='$id'";
        $result=mysqli_query($conn,$sql);
        $each=mysqli_fetch_array($result);
       
       
        $_SESSION[$cart_id][$id]['id_user']=$_SESSION['id'];
        $_SESSION[$cart_id][$id]['id_product']=$each['id'];
        $_SESSION[$cart_id][$id]['name']=$each['title'];
        $_SESSION[$cart_id][$id]['quanlity']=1;
        $_SESSION[$cart_id][$id]['price']=$each['price'];
        $_SESSION[$cart_id][$id]['avatar']=$each['avatar'];
        
    }else{
        $_SESSION[$cart_id][$id]['quanlity']++;
    }
   
    setcookie($cart_id,json_encode($_SESSION[$cart_id]),time()+60*60*24*30);
    header("Location: ../../phpfront/cart/view_cart.php");
?>

