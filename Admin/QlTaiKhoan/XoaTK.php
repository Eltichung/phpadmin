
<?php
    $local="localhost";
    $uname="root";
    $upass="";
    $dtb="n9php";
    $con=mysqli_connect($local,$uname,$upass,$dtb);
    $id=$_GET['id'];
    $sql = "DELETE FROM taikhoan WHERE Id = $id";
	mysqli_query($con,$sql);
	header("Location: ../GdAdmin/index.php");
?>
</body>
</html>