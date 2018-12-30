<?php
   // Kết nối đến CSDL
   include("../config/dbconfig.php");
   ?>
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
<div id="main-content-wp" class="add-cat-page">
   <div class="section" id="title-page">
      <div class="clearfix">
         <a href="?page=add_product" title="" id="add-new" class="fl-left">Thêm mới</a>
         <h3 id="index" class="fl-left">Sửa sản phẩm</h3>
      </div>
   </div>
   <div class="wrap clearfix">
      <?php require 'inc/sidebar.php'; ?>
      <div id="content" class="fl-right">
         <div class="section" id="detail-page">
            <div class="section-detail">
               <form method="POST" action="pages/change_product_perform.php" enctype="multipart/form-data">
                  <?php
                     // Bước 1: Kết nối đến CSDL
                      include("../config/dbconfig.php");
                      $id = $_GET["id"];
                     //Bước 2: Hiển thị các dữ liệu trong bảng ra đây
                      $sql = "select * from tbl_product where id = ".$id;
                      $run = mysqli_query($conn,$sql);
                      $row = mysqli_fetch_array($run);
                     ?>
                  <input type="hidden" name="id" value='<?php echo $row["id"];?>'>
                  <label for="product-name">Tên sản phẩm</label>
                  <input type="text" name="name" id="name" value="<?php echo $row["name"];?>">
                  <label for="product-code">Số lượng</label>
                  <input type="text" name="soluong" id="soluong" value="<?php echo $row["soluong"];?>">
                  <label for="price">Giá sản phẩm</label>
                  <input type="text" name="price" id="price" value="<?php echo $row["price"];?>">
                  <label for="price">Giá khuyến mại</label>
                  <input type="text" name="sale" id="price" value="<?php echo $row["sale"];?>">
                  <label for="desc">Mô tả ngắn</label>
                  <textarea name="mota" id="desc"><?php echo $row["mota"];?></textarea>
                  <label for="desc">Chi tiết</label>
                  <textarea name="chitiet" id="chitiet"><?php echo $row["chitiet"];?></textarea>
                  <script>
                     var chitiet = CKEDITOR.replace('chitiet');
                  </script>
                  <label>Hình ảnh</label>
                  <div id="uploadFile">
                     <input type="file" name="image" id="upload-thumb">
                     <img src="index.php/../../images/product/<?php echo $row["image"];?>" alt="">
                  </div>
                  <label>Danh mục sản phẩm</label>
                  <select name="category">
                     <?php              
                        //Hiển thị các dữ liệu trong bảng tbl_tl_sach ra đây
                        $sql1 = "select * from tbl_category";
                        $run1= mysqli_query($conn, $sql1);
                        while ($row1 = mysqli_fetch_array($run1)) {
                            if ($row['category'] == $row1['id']) {
                        ;?>
                           <option value="<?php echo $row["id"];?>" selected><?php echo $row1["title"];?></option>
                     <?php
                        }else{
                        ?>
                           <option value="<?php echo $row["id"];?>"><?php echo $row1["title"];?></option>
                     <?php
                        }}
                        ;?>
                  </select>
                  <button type="submit" name="btn-submit" id="btn-submit">Sửa đổi</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>