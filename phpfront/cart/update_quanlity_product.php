<?php 
    $id=$_GET['id_pro'];
    session_start();
    $id_u=$_SESSION['id'];
    $cart_id="cart".$id_u;
    $quanlity=$_SESSION[ $cart_id][$id]['quanlity'];
    $type=$_GET['type'];
    if($type == "decrea"){
        if($quanlity===1){
            $SESSION[ $cart_id][$id]['quanlity']=1;
        }else{
        $_SESSION[ $cart_id][$id]['quanlity']--;
        }
    }
    if($type == "increa"){
        $_SESSION[ $cart_id][$id]['quanlity']++;
      
    }
    setcookie($cart_id,json_encode($_SESSION[$cart_id]),time()+60*60*24*30);
    header('location: view_cart.php');
?>