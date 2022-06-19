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
    
    $sql1 = "select * from sanpham where id = '$id'";
    $re = mysqli_query($conn, $sql1);
    $tmp = mysqli_fetch_assoc($re)['quantity'];
    if(isset( $_SESSION['cart'][$id]))
    {
        $_SESSION['cart'][$id]['quantity']+=1;

        if($_SESSION['cart'][$id]['quantity']>$tmp)
        {
            $_SESSION['cart'][$id]['quantity']=$tmp;
        }
    }  
    header("Location:view_cart.php");
?>