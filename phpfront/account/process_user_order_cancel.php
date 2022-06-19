<?php
require "../../common/csdl.php";

$order_id=$_GET["order_id"];
echo $type;
    function get_order_by_type($order_id){
        global $conn;
        $sql="update tbl_order set type='cancel', status='0' where id='$order_id'";      
        (mysqli_query($conn,$sql));
        
    }
    get_order_by_type($order_id);
    header("Location: /phpadmin/phpfront/account/order_buy.php");
?>