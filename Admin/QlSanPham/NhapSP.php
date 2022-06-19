<?php
    if(isset($_POST)){
        include("Connect.php");
        $name = $_POST["name"];
        $type = $_POST["type"];
        $brand = $_POST["brand"];
        $price = $_POST["price"];
        $price_sale = $_POST["price_sale"];
        $discount = $_POST["discount"];
        $quantity = $_POST["quantity"];
        $description = $_POST["description"];
        $detail_des = $_POST["detail_des"];
        $path = 'images/';
        $file = $path.basename($_FILES['image']['name']);
        if($name == "" || $type == "" || $brand == "" || $price =="" || $price_sale =="" || $discount =="" || $quantity == "" || $description=="" || $detail_des =="" || $file == ""){
            echo "<script>alert('Các trường không được để trống.')</script>";
            echo "<script>setTimeout(\"location.href = '../QlSanPham/Form_NhapSP.php';\",500);</script>";
        }
        else{
            
            if(!is_numeric($price) || !is_numeric($price_sale) || !is_numeric($discount)){
                echo "<script>alert('Giá, chiết khấu phải là số.')</script>";
                echo "<script>setTimeout(\"location.href = '../QlSanPham/Form_NhapSP.php';\",500);</script>";
            }
            else{
                if(!file_exists($file)){
                    $rs = move_uploaded_file($_FILES['image']['tmp_name'], $file);
                }
                $sql = "insert into sanpham (name, type, brand, image, price, price_sale, discount, quantity, description, detail_des, is_hot) values('$name', '$type', '$brand', '$file', '$price', '$price_sale', '$discount', '$quantity', '$description', '$detail_des', 0)";
                mysqli_query($conn, $sql);
                echo "<script>setTimeout(\"location.href = '../GdAdmin/index.php';\",500);</script>";
                echo "<script>alert('Thêm thành công.')</script>";
            }
        }
    }
?>