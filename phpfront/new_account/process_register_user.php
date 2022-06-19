<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include("register.php");
    $name=$_POST['name'];
    $pass=$_POST['pass'];
    $adress=$_POST['adress'];
    $phone=$_POST['phone'];
        $check=true;
        $local="localhost";
        $uname="root";
        $upass="";
        $dtb="n9php";
        $con=mysqli_connect($local,$uname,$upass,$dtb);
        $sql="SELECT phone FROM taikhoan";
        $re=mysqli_query($con,$sql);
        while($db=mysqli_fetch_row($re)){
            if($phone==$db[0]){
                $check=false;
                break;
            }
        }
        if($check){
            $sql="INSERT INTO taikhoan values (null,'$name','$pass','$adress','$phone')";
            $re=mysqli_query($con,$sql);
            echo'<script>alert("Dang ki thanh cong")</script>';
        }
        else{
            echo'<script>alert("So dien thoai da ton tai")</script>';
        }
    ?>
</body>
</html>