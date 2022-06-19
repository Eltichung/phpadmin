<?php
    session_start();
     include("../QlSanPham/Connect.php");
        if(isset($_POST))
        {
            $value= $_POST["discount"];
            if($value<100)
            {
                $_SESSION['discount']=$value;
                $sql = "select * from sanpham";
                $result = mysqli_query($conn, $sql);
                while ($r = mysqli_fetch_assoc($result))
                {
                    $id=$r['id'];
                    $priceNew=$r['price_sale']*((100-$value)/100);  
                    $sql1="update sanpham set price_sale='$priceNew' where id= '$id'";
                    mysqli_query($conn, $sql1);
                }                  
            }
            else
            echo "<script>alert('Thành công')</script>";
            echo "<script>setTimeout(\"location.href = '../GdAdmin/index.php';\",500);</script>";
        }
?>