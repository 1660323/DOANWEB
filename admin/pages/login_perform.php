<?php
//Khai báo sử dụng session
session_start();
    //Kết nối tới database
include('../../config/dbconfig.php');

$email = $_POST['email'];
$password = 123456;
$sql_check = mysqli_query($conn,"select * from tbl_user where email = '$email'");
$dem = mysqli_num_rows($sql_check);
if($dem == 0)
{
	$_SESSION['thongbaoloi'] = "Tài khoản không thồn tại";
	echo "
	<script language='javascript'>
		alert('Tài khoản không tồn tại');
		window.open('".$site_admin."?page=login','_self', 1);
	</script>
	";
}
else
{
	$sql_check2 = mysqli_query($conn,"select * from tbl_user where email = '$email' and password = '$password'");
	$dem2 = mysqli_num_rows($sql_check2);
	if($dem2 == 0)
		echo "
	<script language='javascript'>
		alert('Mật khẩu đăng nhập không đúng');
		window.open('".$site_admin."?page=login','_self', 1);
	</script>
	";
	else
	{
		$row = mysqli_fetch_array($sql_check2);

		$_SESSION['email'] = $email;

		echo "
		<script language='javascript'>
			alert('Đăng nhập thành công');
			window.open('".$site_admin."?page=list_order','_self', 1);
		</script>
		";

	}
}
?>