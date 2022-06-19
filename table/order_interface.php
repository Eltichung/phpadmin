<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
    <link rel="stylesheet" href="./common/crud.css">
    <?php require "../common/link.html";?>
    <style>
              .table-responsive {
            overflow: hidden;
        }
        .clearfix {
            transform: translateX(-10%);
            position: relative;
            left: 50%;
        }
        .action_icon .view {
            color: #495057;
        }
        .action_icon .delete {
            color:red;
        }
        .action_icon .edit {
            color: blue;
        }
        .search-box {
            display: flex;
            align-items: center;
            border: 1px solid;
            border-radius: 3px;
            padding: 2px 5px;
        }
        .search-box input {
            border: none;
            outline: none;
        }
        .search-box i {
            color: #495057;
        }
    </style>
</head>
<body>
<?php 
        require "../common/csdl.php";
        $sql="select * from tbl_order";
        $ket_qua=mysqli_query($conn,$sql);
        mysqli_close($conn);
    ?>
<div class="container-xxl position-relative bg-white d-flex p-0">
    <?php require "../common/menu.html";?>
    <div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Order</h2></div>
                    <div class="col-sm-4">
                        <div class="search-box">
                        <i class="fas fa-search"></i>
                            <input type="text" class="form-control" placeholder="Search&hellip;">
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                    <th>Order Id</th>
                        <th>User ID</th>
                        <th>Customer Name</th>
                        <th>Customer Address</th>
                        <th>Customer Phone</th>
                        <th>Total</th>
                        <th>Type</th>
                        <th>Status</th>
                       
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($ket_qua as $kq){?>
                    <tr>
                        <td><?php echo $kq['id']?></td>
                        <td><?php echo $kq['user_id']?></td>
                        <td><?php echo $kq['customer_name']?></td>
                        <td><?php echo $kq['customer_address']?></td>
                        <td><?php echo $kq['customer_phone']?></td>
                        <td><?php echo number_format($kq['total']);?>đ</td>
                        <td><?php echo $kq['type']?></td>
                        <td><?php echo $kq['status']?></td>
                       
                    </tr>     
                    <?php }?>               
                </tbody>
            </table>
          
     
</div>   
    </div>
    <?php require "../common/footer.html";?>
    <?php require "../common/jsAdmin.html"?>
</div>
</body>
</html>