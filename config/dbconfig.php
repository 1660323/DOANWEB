<?php
	$tenmaychu="localhost";
	$tentaikhoan="root";
	$pass="";
	$csdl="loitruong";
	$site_url = 'http://localhost:8080/storeonline/';
	$site_admin = 'http://localhost:8080/storeonline/admin/';
	$conn=mysqli_connect($tenmaychu, $tentaikhoan, $pass, $csdl) or die("Không kết nối được");
	mysqli_set_charset($conn,"utf8");
?>