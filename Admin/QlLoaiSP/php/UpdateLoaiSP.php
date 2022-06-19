<?php
    include("Connect.php");
    $name = $_POST['loaiSP'];
    $ma = $_GET["id"];
    if($name == ""){
        echo "<script>alert('Loại sản phẩm không được để trống.')</script>";
        echo "<script>setTimeout(\"location.href = '../QlLoaiSP/php/Form_UpdateLoaiSP.php?id=$ma';\",500);</script>";
    }
    else{
        $sql = "update loaisp set name = '$name' where id = '$ma'";
        $re = mysqli_query($conn, $sql);
        if($re){
            echo "<script>alert('Cập nhật thành công.')</script>";
            echo "<script>setTimeout(\"location.href = '../../GdAdmin/index.php';\",500);</script>";
        }
        else{
            echo "<script>alert('Cập nhật thất bại')</script>";
            echo "<script>setTimeout(\"location.href = ../QlLoaiSP/php/Form_UpdateLoaiSP.php?id=$ma';\",500);</script>";
        }
    }
?>