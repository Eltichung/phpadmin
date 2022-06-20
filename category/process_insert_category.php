<?php
    require "../common/csdl.php";
    $name = $_POST['name'];
    $description = $_POST['description'];
    $status = $_POST['status'];

    $sql="INSERT INTO tbl_category(name,description,status)  VALUES('$name','$description','$status')";
    mysqli_query($conn,$sql);
    header("location: ../table/category_interface.php");
?>