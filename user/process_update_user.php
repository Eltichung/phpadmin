<?php
    require "../common/csdl.php";
    $id = $_POST['id'];
    $name = $_POST['username'];
    $email = $_POST['email'];
    $status = $_POST['status'];


    
    $sql="UPDATE tbl_users SET username='$name',email='$email',status='status' WHERE id='$id'";
    mysqli_query($conn,$sql);
    header("location: ../table/user_interface.php");

?>