<?php
include("../../config/dbconfig.php");
$id         = $_POST['id'];
$name       = $_POST['name'];
$soluong    = $_POST['soluong'];
$price      = $_POST['price'];
$sale       = $_POST['sale'];
$category   = $_POST['category'];
$chitiet    = $_POST['chitiet'];
$mota       = $_POST['mota'];
// Upload hình ảnh
$image      = $_FILES["image"]["name"];
$fileanhtam = $_FILES["image"]["tmp_name"];
$result     = move_uploaded_file($fileanhtam, '../../images/product/' . $image);
if (!$result) {
    $image = NULL;
}
// Bước 2: Chèn dữ liệu vào bảng
if ($id == '' || $name == '' || $price == '' || $category == '') {
    echo '
		<script type="text/javascript">
			alert("Sửa bài viết lỗi. Vui lòng điền đầy đủ thông tin!!!");
			window.location.href="' . $site_admin . '?page=change_product&id=$id";
		</script>';
} else {
    if ($image == NULL) {
        $sql = "UPDATE tbl_product SET name = '$name', price = '$price', category = '$category', sale = '$sale', chitiet = '$chitiet', mota = '$mota', soluong = '$soluong'  WHERE id = '$id'";
    } else {
        $sql = "UPDATE tbl_product SET name = '$name', price = '$price', category = '$category', image = '$image', sale = '$sale', chitiet = '$chitiet', mota = '$mota', soluong = '$soluong' WHERE id = '$id'";
    }
}
// Cho thực thi câu lệnh SQL trên
$run = mysqli_query($conn, $sql);
echo '
		<script type="text/javascript">
			alert("Sửa sản phẩm thành công!!!");
			window.location.href="' . $site_admin . '?page=list_product";
		</script>';
;
?>