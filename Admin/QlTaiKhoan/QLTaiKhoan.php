<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="../QlTaiKhoan/styleql.css" /> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>
<body>
        
    <?php
        $local="localhost";
        $uname="root";
        $upass="";
        $dtb="n9php";
        $con=mysqli_connect($local,$uname,$upass,$dtb);
       
        if(!$con)
        {
            echo "Ket noi CSDL that bai";
        }
        else{
           $sql="SELECT * FROM taikhoan";
           $re=mysqli_query($con,$sql);
           echo '  <p style="font-size: 25px; font-weight: 700; margin-bottom: 16px; text-align: center;">Bảng quản lý tài khoản</p>';
           echo '<form  method="POST">';
           echo'<table class="table table-striped"style="text-align: center;">';
            //    tao tieu de
            echo`<tr class="table_row">`;
            echo'<th scope="col">';
            echo "MaKH";
            echo' </th>';
            echo'<th scope="col">';
            echo "Ten KH";
            echo' </th>';
            echo'<th>';
            echo "Mat khau";
            echo" </th>";
            echo'<th scope="col">';
            echo "Adress";
            echo'</th scope="col">';
            echo'<th scope="col">';
            echo "Phone";
            echo" </tr>";
            $res=mysqli_query($con,$sql);
            while($db=mysqli_fetch_row($res)){
            
                // ban du lieu
                echo'<tr class="table_row">';
                echo'<td scope="row">';
                echo $db[0];
                echo" </td>";
                echo"<td>";
                echo $db[1];
                echo" </td>";
                echo"<td>";
                echo $db[2];
                echo" </td>";
                echo'<td>';
                echo $db[3];
                echo'</td>';
                echo'<td>';
                echo $db[4];
                echo'</td>';
                ?>
                </tr>
                <?php
            }
    
            echo"</table>";
            
        }
        ?>
</body>
</html>