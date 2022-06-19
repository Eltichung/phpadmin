<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authority</title>
    <link rel="stylesheet" href="../common/crud.css">
    <?php require "../common/link.html";?>
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.1.1/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .table-responsive {
            overflow: hidden;
        }
        .clearfix {
            transform: translateX(-10%);
            position: relative;
            left: 50%;
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
        .action_icon .view {
            color: #495057;
        }
        .action_icon .delete {
            color:red;
        }
        .action_icon .edit {
            color: blue;
        }
    </style>
</head>
<body>
<?php 
        require "../common/csdl.php";
        $sql="select * from tbl_order_details";
        $ket_qua=mysqli_query($conn,$sql);
        mysqli_close($conn);
    ?>
<div class="container-xxl position-relative bg-white d-flex p-0">
    <?php require "../common/menu.html";?>
    <div class="container-xl" style="width:100%">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Order Details</h2></div>
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
                        <th>Product Id</th>
                        <th>Quantity </i></th>
                        <th>Created Date</th>
                        <th>Status</th>
                      
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($ket_qua as $kq){?>
                    <tr>
                       
                        <td><?php echo $kq['order_id']?></td>
                        <td><?php echo $kq['product_id']?></td>
                        <td><?php echo $kq['quality']?></td>
                        <td><?php echo $kq['created_date']?></td> 
                        <td><?php echo $kq['status']?></td>
                      
                    </tr>
                    <?php }?>
                   
                       
                       
                </tbody>
            </table>
         
        </div>
     
</div>   
    </div>
    <?php require "../common/footer.html";?>
    <?php require "../common/jsAdmin.html"?>
</div>
</body>
</html>
