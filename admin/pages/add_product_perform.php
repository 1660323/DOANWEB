<?php
//  Kết nối đến CSDL
include("../../config/dbconfig.php");

//Lấy các dữ liệu bên trang Thêm mới bài viết
$name     = $_POST['name'];
$soluong  = $_POST['soluong'];
$price    = $_POST['price'];
$sale     = $_POST['sale'];
$category = $_POST['category'];
$chitiet  = $_POST['chitiet'];
$mota     = $_POST['mota'];

// Upload hình ảnh
$image      = $_FILES["image"]["name"];
$fileanhtam = $_FILES["image"]["tmp_name"];
$result     = move_uploaded_file($fileanhtam, '../../images/product/' . $image);
if (!$result) {
    $image = NULL;
}

// Chèn dữ liệu vào bảng tbl_product
$sql = "insert into tbl_product (name,price,image,category, chitiet,sale, mota) value('$name','$price','$image','$category','$chitiet', '$sale', '$mota')";

// Cho thực thi câu lệnh SQL trên
$run = mysqli_query($conn, $sql);
echo '
		<script type="text/javascript">
			alert("Thêm mới sản phẩm thành công!!!");
			window.location.href="' . $site_admin . '?page=list_product";
		</script>';
;
?>