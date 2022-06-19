<?php
    //session_start();
    //session_destroy();
    //die();
    $local="localhost";
    $uname="root";
    $upass="";
    $dtb="n9php";
    $conn=mysqli_connect($local,$uname,$upass,$dtb);
    session_start();
    if(isset($_GET['id']))
    $id = $_GET['id'];
    if(isset( $_SESSION['cart'][$id]))
    $_SESSION['cart'][$id]['quantity']-=1;
   
    header("Location:view_cart.php");
?>