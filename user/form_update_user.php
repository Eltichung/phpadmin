<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Category</title>
    <style type="text/css">
.form-style-1 {
	margin:10px auto;
	max-width: 400px;
	padding: 20px 12px 10px 20px;
	font: 13px "Lucida Sans Unicode", "Lucida Grande", sans-serif;
}
.form-style-1 li {
	padding: 0;
	display: block;
	list-style: none;
	margin: 10px 0 0 0;
}
.form-style-1 label{
	margin:0 0 3px 0;
	padding:0px;
	display:block;
	font-weight: bold;
}
.form-style-1 input[type=text], 
.form-style-1 input[type=date],
.form-style-1 input[type=datetime],
.form-style-1 input[type=number],
.form-style-1 input[type=search],
.form-style-1 input[type=time],
.form-style-1 input[type=url],
.form-style-1 input[type=email],
textarea, 
select{
	box-sizing: border-box;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	border:1px solid #BEBEBE;
	padding: 7px;
	margin:0px;
	outline: none;	
}
.form-style-1 input[type=text]:focus, 
.form-style-1 input[type=date]:focus,
.form-style-1 input[type=datetime]:focus,
.form-style-1 input[type=number]:focus,
.form-style-1 input[type=search]:focus,
.form-style-1 input[type=time]:focus,
.form-style-1 input[type=url]:focus,
.form-style-1 input[type=email]:focus,
.form-style-1 textarea:focus, 
.form-style-1 select:focus{
	-moz-box-shadow: 0 0 8px #88D5E9;
	-webkit-box-shadow: 0 0 8px #88D5E9;
	box-shadow: 0 0 8px #88D5E9;
	border: 1px solid #88D5E9;
}
.form-style-1 .field-divided{
	width: 49%;
}

.form-style-1 .field-long{
	width: 100%;
}
.form-style-1 .field-select{
	width: 100%;
}
.form-style-1 .field-textarea{
	height: 100px;
}
.form-style-1 input[type=submit], .form-style-1 input[type=button]{
	background: #4B99AD;
	padding: 8px 15px 8px 15px;
	border: none;
	color: #fff;
}
.form-style-1 input[type=submit]:hover, .form-style-1 input[type=button]:hover{
	background: #4691A4;
	box-shadow:none;
	-moz-box-shadow:none;
	-webkit-box-shadow:none;
}
.form-style-1 .required{
	color:red;
}
</style>
<?php require "../common/link.html";?>
</head>
<body>
<div class="container-xxl position-relative bg-white d-flex p-0">
<?php require "../common/menu.html";?>
<p style="text-align: center;margin-top: 30px; font-size: 25px;color:#88D5E9"> Update User</p>

<?php 
$servername = "localhost";
$username = "root";
$password = "YES";

// Create connection
$conn = new mysqli($servername, $username, '','website_qlbh');
mysqli_set_charset($conn,'utf8');
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
	$id=$_GET['id'];

	$sql="select * from tbl_users where id='$id'";
	$line=mysqli_fetch_array(mysqli_query($conn,$sql));
	mysqli_close($conn);
?>

<form method="POST" action="process_update_user.php">
<input type="hidden" name="id" value="<?php echo $line['id']; ?>">
<ul class="form-style-1">
		<li>
			<label>UserName <span class="required">*</span></label>
			<input type="text" name="username" class="field-divided" placeholder="UserName" value="<?php echo $line['username'];?>" /> 
		</li>
		<li>
    	    <label>Email <span class="required">*</span></label>
        	<input type="text" name="email" class="field-long" value="<?php echo $line['email'];  ?>" />
    	</li>
    	<li>
        	<label>Status <span class="required">*</span></label>
        	<input type="text" name="status" class="field-long" value="<?php echo $line['status'];  ?>" />
    	</li>
	
    	<li>
        	<input type="submit" value="Update" />
    	</li>
</ul>
</form>
<?php require "../common/footer.html";?>
<?php require "../common/jsAdmin.html"?>
</div>
</body>
</html>