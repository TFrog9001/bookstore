<?php
	$tenmaychu='localhost';
	$tentaikhoan='root';
	$pass='';
	$csdl='bookstore';
	$conn=mysqli_connect($tenmaychu,$tentaikhoan,$pass,$csdl) or die('Ko kết nối được');
	mysqli_select_db($conn, $csdl)
?>