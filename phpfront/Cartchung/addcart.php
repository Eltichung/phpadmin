<?php
    //session_start();
    //session_destroy();
    //die();
    $local="localhost";
    $uname="root";
    $upass="";
    $dtb="n9php";
    $conn=mysqli_connect($local,$uname,$upass,$dtb);
    
    if(isset($_GET['id']))
    $id = $_GET['id'];
    $sql = "select * from sanpham where id='$id'";
    $re = mysqli_query($conn, $sql);
    $r = mysqli_fetch_assoc($re);
    //$nameType = mysqli_fetch_assoc($re)['name'];
    $type = $r['type'];
    $sql1 = "select * from loaisp where id = '$type'";
    $re = mysqli_query($conn, $sql1);
    $nameType = mysqli_fetch_assoc($re)['name'];
    
    $item=[
        'id'=>$r['id'],
        'name'=>$r['name'],
        'brand'=>$r['brand'],     
        'price_sale'=>$r['price_sale'],
        'type'=>$nameType,
        'quantity'=>1,
        'image'=>$r['image'],

    ];
    //them vao gio hang
    session_start();
    if(isset( $_SESSION['cart'][$id]))
        $_SESSION['cart'][$id]['quantity']+=1;
    else
        $_SESSION['cart'][$id]=$item;
    echo "<pre>";
    print_r($_SESSION['cart']);
    header("Location:../index.php");
?>