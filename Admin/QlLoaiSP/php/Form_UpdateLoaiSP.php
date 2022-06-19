<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../QlSanPham/Form_NhapSP.css" />
</head>
<?php
    include("Connect.php");
    $ma = $_GET['id'];
    $sql = "select * from loaisp where id = '$ma'";
    $re = mysqli_query($conn, $sql);
    $r = mysqli_fetch_assoc($re);
    $name = $r["name"];
?>
<body>
<div class="form_input">
        <div class="overlay"></div>
        <div class="form_body">
            <a href="Form_ShowLoaiSP.php"><img class="close_image" src="../../image_common/close.jpg" /></a>
            <form method="post" enctype="multipart/form-data" action="UpdateLoaiSP.php?id=<?=$ma?>">
                <p class="form_header">Form cập nhật sản phẩm</p>
                <div class="form-group">
                  <label>Tên loại SP:</label>
                  <input type="text" class="form-control name_input" value="<?=$name?>"  name="loaiSP">
                </div>
                <div class="form_btn">
                    <button type="submit" class="btn btn-primary update_btn">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>