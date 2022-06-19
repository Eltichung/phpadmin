<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="./Form_NhapSP.css" />
    <title>Document</title>
</head>
<body>
    <div class="form_input">
        <div class="overlay"></div>
        <div class="form_body">
            <a href="Form_ShowSP.php"><img class="close_image" src="../image_common/close.jpg" /></a>
            <form method="post" enctype="multipart/form-data" action="NhapSP.php">
                <p class="form_header">Form nhập sản phẩm</p>
                <div class="form-group">
                  <label>Tên SP:</label>
                  <input type="text" class="form-control name_input" placeholder="Enter name" name="name">
                </div>
                <div class="form-group">
                    <label>Loại SP:</label>
                    <select name="type" class="form-control type_selection" >
                        <?php
                            include("Connect.php");
                            $sql = "select * from loaisp";
                            $re = mysqli_query($conn, $sql);
                            while($r = mysqli_fetch_assoc($re)){
                        ?>
                                <option value="<?=$r['id']?>"><?=$r['name']?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Thương hiệu:</label>
                    <input type="text" class="form-control brand_input" placeholder="Enter brand" name="brand" />
                </div>
                <div class="form-group">
                    <label>Giá nhập:</label>
                    <input type="text" class="form-control price_input" placeholder="Enter price" name="price" />
                </div>
                <div class="form-group">
                    <label>Giá bán:</label>
                    <input type="text" class="form-control price_input" placeholder="Enter price" name="price_sale" />
                </div>
                <div class="form-group">
                    <label>Chiết khấu:</label>
                    <input type="text" class="form-control price_input" placeholder="Enter discount" name="discount" />
                </div>
                <div class="form-group">
                    <label>Số lượng:</label>
                    <input type="number" class="form-control quantily_input" placeholder="Enter quantily" name="quantity" />
                </div>
                <div class="form-group">
                    <label>Mô tả:</label>
                    <input type="text" class="form-control description_input" placeholder="Enter description" name="description" />
                </div>
                <div class="form-group">
                    <label>Mô tả chi tiết:</label>
                    <input type="text" class="form-control description_input" placeholder="Enter description" name="detail_des" />
                </div>
                <div class="form-group">
                    <label>Ảnh:</label>
                    <input type="file" name="image"/>
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