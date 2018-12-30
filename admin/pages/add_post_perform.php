<?php
//  Kết nối đến CSDL
include("../../config/dbconfig.php");

//Lấy các dữ liệu bên trang Thêm mới bài viết
$title   = $_POST['title'];
$content = $_POST['content'];
$mota    = $_POST['mota'];

// Upload hình ảnh
$image      = $_FILES["image"]["name"];
$fileanhtam = $_FILES["image"]["tmp_name"];
$result     = move_uploaded_file($fileanhtam, '../../images/post/' . $image);
if (!$result) {
    $image = NULL;
}

// Chèn dữ liệu vào bảng tbl_product
$sql = "insert into tbl_post (title,content,image, mota) value('$title','$content','$image', '$mota')";

// Cho thực thi câu lệnh SQL trên
$run = mysqli_query($conn, $sql);
echo '
		<script type="text/javascript">
			alert("Thêm mới bài viết thành công!!!");
			window.location.href="' . $site_admin . '?page=list_post";
		</script>';
;
?>