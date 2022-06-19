<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <P style="font-size: 25px; font-weight:700; text-align:center;">Bảng quản lý loại sản phẩm</p>
        <div class="row ">
            <div class="col">
                <a href="../QlLoaiSP/php/Form_AddLoaiSP.php"><button type="submit" class="btn btn-primary">Thêm loại sản phẩm</button></a>
            </div>
        </div>
    <table class="table table-striped">
        <head>
            <tr>
            <th scope="col">Mã sản phẩm</th>
            <th scope="col">Tên loại sản phẩm</th>
            <th scope="col">Sửa</th>
            <th scope="col">Xóa</th>
        </tr>
        </head>
        <body>
<?php
    include("Connect.php");
    $sql = "select * from loaisp";
    $result = mysqli_query($conn, $sql);
    while($r = mysqli_fetch_assoc($result)){
?>    
            <tr>
                <td><?=$r["id"]?></td>
                <td><?=$r["name"]?></td>
                <td>
                    <a href="../QlLoaiSP/php/Form_UpdateLoaiSP.php?id=<?=$r['id']?>"><button class="btn btn-primary">Sửa</button></a>
                </td>
                <td>
                    <a href="javascript:confirmDelete('../QlLoaiSP/php/Form_DeleteLoaiSP.php?id=<?=$r['id']?>')"><button class="btn btn-primary">Xóa</button></a>
                </td>
            </tr>
<?php  
    }
?>
        </body>
    </table>
    </div>
  
</body>
</html>