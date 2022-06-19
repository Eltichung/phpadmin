<?php
session_start();
unset($_SESSION['id']);
unset($_SESSION['name']);
unset($_SESSION['email']);
unset($_SESSION['address']);
unset($_SESSION['cart']);
unset($_SESSION['order']);
setcookie('token','',-1);
header('Location: ../../phpfront/index.php')
?>