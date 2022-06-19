<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../QlSanPham/Form_NhapSP.css" />
    <title>Document</title>
</head>
<body>
    <div class="form_input">
        <div class="overlay"></div>
        <div class="form_body">
            <a href="Form_ShowLoaiSP.php"><img class="close_image" src="../../image_common/close.jpg" /></a>
            <form method="post" enctype="multipart/form-data" action="AddLoaiSP.php">
                <p class="form_header">Form nhập loại sản phẩm</p>
                <div class="form-group">
                  <label>Tên loại SP:</label>
                  <input type="text" class="form-control name_input" placeholder="Enter name" name="loaiSP">
                </div>
                <div class="form_btn">
                    <button type="submit" class="btn btn-primary add_btn">Thêm</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>