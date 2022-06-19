<?php
    $name = $_POST["loaiSP"];
    if($name == ""){
        echo "<script>alert('Loại sản phẩm không được để trống.')</script>";
        echo "<script>setTimeout(\"location.href = 'Form_AddLoaiSP.php';\",500);</script>";
    }
    else{
        include("Connect.php");
        $sql = "insert into loaisp (name) values ('$name')";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo "<script>alert('Thêm thành công.')</script>";
            echo "<script>setTimeout(\"location.href = '../../GdAdmin/index.php';\",500);</script>";
        }
        else{
            echo "<script>alert('Thêm thất bại.')</script>";
            echo "<script>setTimeout(\"location.href = '../QlLoaiSP/php/Form_AddLoaiSP.php';\",500);</script>";
        }
    }
?>