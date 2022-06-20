<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authority</title>
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

function get_order_by_type($type,$status){
    global $conn;
    global $id;
    $sql="select * from tbl_order as o  where  type='$type' and o.status='$status'"; 
    $result=(mysqli_query($conn,$sql));
    $order=array();
    foreach($result as $row){
        //print_r($row);	
        array_push($order,$row);
    }
    return $order; 
}
$order_confirm=get_order_by_type('confirm',1);


?>
<div class="container-xxl position-relative bg-white d-flex p-0">
    <?php require "../common/menu.html";?>
    <div class="container-xl" style="width:100%">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Accept Order</h2></div>
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
                        <th>User Id</th>
                        <th>Order Code</th>
                        <th>UserName</th>
                        <th>Created Date </i></th>
                        <th>Total </i></th>
                        <th>Accept</th>
                    </tr>
                </thead>
                <tbody>
                    
                <?php foreach($order_confirm as $value_order){
                        $sum=0;
						  ?>
                            <tr>
                                <td><?php print_r($value_order['user_id']) ?></td>
                                <td><?php print_r($value_order['code']) ?></td>
                                <td><?php print_r($value_order['customer_name']) ?></td>
                                <td><?php print_r($value_order['created_date']) ?></td>
                                <td><?php print_r(number_format($value_order['total'])) ?>đ</td>
                                <td class="action_icon">
                                    <a href="process_order_user.php?user_id=<?php print_r($value_order['user_id'])  ?>&date=<?php print_r($value_order['created_date'])  ?>&type=wait&status=1"  style="padding-right: 10px;text-align: center;color:green"class="view" title="Accept" data-toggle="tooltip"><i class="fas fa-check"></i></a>
                                    <a href="process_order_user.php?user_id=<?php print_r($value_order['user_id'])  ?>&date=<?php print_r($value_order['created_date'])  ?>&type=cancel&status=0" class="delete" title="Cancel" data-toggle="tooltip"><i class="fas fa-window-close"></i></a>
                                   
                                </td>
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