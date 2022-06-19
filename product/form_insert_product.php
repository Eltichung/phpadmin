<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product</title>
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
	<?php 
	 require "../common/csdl.php";
	  $sql = "SELECT * FROM tbl_category";
	  $query = mysqli_query($conn, $sql);
	  mysqli_close($conn);
	
	?>
<div class="container-xxl position-relative bg-white d-flex p-0">
<?php require "../common/menu.html";?>
<p style="text-align: center;margin-top: 30px; font-size: 25px; color:#88D5E9"> Insert Product</p>
<form method = "post" action = "./process_insert_product.php" enctype="multipart/form-data">
<ul class="form-style-1">
    <li><label>Title <span class="required">*</span></label><input type="text" name="title" class="field-divided" placeholder="Title" /> 
    <li>
        <label>Details Description <span class="required">*</span></label>
        <input type="text" name="detail_description" class="field-long"placeholder="Details Description" />
    </li>
	<li>
        <label>Short Description <span class="required">*</span></label>
        <input type="text" name="short_description" class="field-long" placeholder="Short Description"/>
    </li>
	<li>
        <label>Avatar <span class="required">*</span></label>
        <input type="file" name="avatar" class="field-long"placeholder="Avatar" />
    </li>
	<li>
        <label>Price <span class="required">*</span></label>
        <input type="text" name="price" class="field-long"placeholder="Price" />
    </li>
    <li>
        <label>Category Id</label>
		<select name="category_id">
			<?php  foreach (($query) as $line){
			 ?>
			<option value=<?php echo $line['id']?>><?php echo $line['name'] ?></option>
			<?php }?>
		</select>
    </li>
    <li>
        <input type="submit" value="Insert" />
    </li>
</ul>
</form>
<?php require "../common/footer.html";?>
    <?php require "../common/jsAdmin.html"?>
    </div>
</body>
</html>