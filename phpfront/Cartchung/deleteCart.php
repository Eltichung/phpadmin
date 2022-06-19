<?php
session_start();
 $local="localhost";
 $uname="root";
 $upass="";
 $dtb="n9php";
 $conn=mysqli_connect($local,$uname,$upass,$dtb);

 if(isset($_GET['id']))
    $id = $_GET['id'];
    
    $cart =  $_SESSION['cart'] ;
    unset($_SESSION['cart'][$id]);
    print_r($_SESSION['cart']);
    header("Location:view_cart.php");
?>