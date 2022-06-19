<?php
require "../common/csdl.php";
$user_id=$_GET["user_id"];
$created_date=$_GET["date"];
$type=$_GET["type"];
$status=$_GET["status"];
echo $type;
    function get_order_by_type($type,$status,$user_id,$created_date){
        global $conn;
        $sql="update tbl_order set type='$type', status='$status' where user_id='$user_id' and created_date='$created_date'"; 
        echo $sql;
        (mysqli_query($conn,$sql));
        
    }
    get_order_by_type($type,$status,$user_id,$created_date);
    header("Location: /phpadmin/order/interface_order_user_process.php");
?>