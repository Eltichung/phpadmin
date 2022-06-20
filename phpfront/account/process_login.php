<?php
    
    $phone=$_POST['phone'];
    $pass=$_POST['pass'];
    $check=true;
        $local="localhost";
        $uname="root";
        $upass="";
        $dtb="n9php";
        $con=mysqli_connect($local,$uname,$upass,$dtb);
        $sql="SELECT phone,pass,id,name FROM taikhoan";
        $re=mysqli_query($con,$sql);
        while($db=mysqli_fetch_row($re)){
            if($phone==$db[0]&&$pass==$db[1]){
                $check=false;
                break;
            }
        }
        if($check){
            echo'<script>alert("Số điện thoại hoặc mật khẩu không đúng!")</script>';
            echo "<script>setTimeout(\"location.href = 'log_in.php';\",5);</script>";
        }
        else{
            session_start();
            $_SESSION['id']=$db[2];
            $_SESSION['name']=$db[0];
        }
        if($phone=="admin"&&$pass==="admin"){
            header("Location: ../../Admin/GdAdmin/index.php");
        }
        else{
            if(isset($_SESSION['id'])){
                if ( $phone=='123456789'&&$pass=='123456789'){
                    header('Location: ../../Admin/GdAdmin/index.php');
                }
                else
                header("Location: ../index.php");
            }
        }
?>
<script>
</script>