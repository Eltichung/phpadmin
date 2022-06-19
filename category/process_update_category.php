<?php
    require "../common/csdl.php";
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $status = $_POST['status'];

    $sql="INSERT INTO tbl_category(name,description,status)  VALUES('$name','$description','status')";
    $sql="UPDATE tbl_category SET name='$name',description='$description',status='status' WHERE id='$id'";
    mysqli_query($conn,$sql);
    header("location: ../table/category_interface.php");

?>