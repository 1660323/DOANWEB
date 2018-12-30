<?php
session_start();
if (isset($_POST['ok'])) {
    include("../config/dbconfig.php");
    $tenkhachhang = $_POST['tenkhachhang'];
    $email        = $_POST['email'];
    $diachi       = $_POST['diachi'];
    $phone        = $_POST['phone'];
    $note         = $_POST['note'];
    $hinhthuc     = $_POST['payment-method'];
    $tongtien     = $_SESSION['tongtien'];
    $tinhtrang    = 'Chờ duyệt';
    $queryy       = "SELECT max(id) from tbl_oder";
    $maxid        = mysqli_query($conn, $queryy);
    $data         = mysqli_fetch_assoc($maxid);
    $id           = $data['max(id)'] + 1;
    $sql1         = "INSERT into tbl_oder(id, tenkhachhang,email,diachi,phone,note, hinhthuc, tongtien, tinhtrang) value('$id','$tenkhachhang','$email','$diachi','$phone','$note', '$hinhthuc', '$tongtien', '$tinhtrang')";
    
    $run1 = mysqli_query($conn, $sql1);
    
    foreach ($_SESSION['cart'] as $idproduct => $soluong) {
        $sql2 = "INSERT into tbl_oder_detail(maOder, idproduct, soluong) value('$id', '$idproduct', '$soluong')";
        
        $run2 = mysqli_query($conn, $sql2);
        $sql3 = "UPDATE tbl_product SET soluong = (soluong - '$soluong')  WHERE id = '$idproduct'";
        
        $run3 = mysqli_query($conn, $sql3);
    }
    session_destroy();
    echo '<script type="text/javascript">
                alert("Mua hàng thành công");
                window.location.href="' . $site_url . '?page=home";
            </script>';
}
?>