<?php 
    $id=$_GET['id_pro'];
    session_start();
    $id_u=$_SESSION['id'];
    $cart_id="cart".$id_u;
    unset($_SESSION[$cart_id][$id]);
    print_r($_SESSION[$cart_id]); 
    setcookie($cart_id,json_encode($_SESSION[$cart_id]),time()+60*60*24*30);
    header('location: view_cart.php');
    ?>