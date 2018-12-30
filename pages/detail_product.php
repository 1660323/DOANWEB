<div id="main-content-wp" class="detail-product-page">
    
    <div id="wrapper" class="wp-inner clearfix">
        <div id="content" class="fl-left">
            <div class="section" id="info-product-wp">
                <div class="section-detail clearfix">
                         <?php
                              // Bước 1: Kết nối đến CSDL
                               include("config/dbconfig.php");
                               $id = $_GET["id"];
                              //Bước 2: Hiển thị các dữ liệu trong bảng ra đây
                               $sql = "select * from tbl_product where id = ".$id;
                               $run = mysqli_query($conn,$sql);
                               $row = mysqli_fetch_array($run);
                               $cat = $row['category'];
                        ?>
                    <div class="thumb fl-left">
                        <img src="images/product/<?php echo $row["image"];?>" data-zoom-image="images/product/<?php echo $row["image"];?>"/>
                    </div>
                    <div class="thumb-respon fl-left">
                        <img src="index.php/images/product/<?php echo $row["image"];?>">
                    </div>
                    <div class="info fl-right">
                        
                        <input type="hidden" name="id" value='<?php echo $row["id"];?>'>
                        <h3 id="product-name"><?php echo $row["name"];?></h3>
                        <div class="price">
                            <span class="price-old"><?php echo number_format($row["sale"]);?> </span>
                            <span class="price-new"><?php echo number_format($row["price"]);?> </span>
                        </div>
                        <p id="desc-short"><?php 
                            echo($row['mota']);
                        ?></p>
                        
                        <a href="?page=add_cart&id=<?php echo $row['id'] ?>" title="" id="add-to-cart">Thêm vào giỏ</a>
                        <a href="?page=add_cart&id=<?php echo $row['id'] ?>" title="" id="buy-now">Mua ngay</a><br/>
                    </div>
                </div>
            </div>
            <div class="section" id="detail-product-wp">
                <div class="section-detail">
                    <div id="tab-wrapper">
                        <ul id="tab-menu" class="clearfix">
                            <li>
                                <a href="#detail-product" title="">Thông tin sản phẩm</a>
                            </li>
                            <li>
                                <a href="#comment-product" title="">Bình luận</a>
                            </li>
                        </ul>
                        <div id="tab-content">
                            <div id="detail-product" class="tabItem">
                                <?php echo $row["chitiet"];?>
                                <?php 
                                    if (isset($_POST['submit'])) {
                                        $idproduct = $row['id'];
                                        $namemember = $_POST['namemember'];
                                        $noidung = $_POST['noidung'];
                                        $sql1 = "insert into tbl_comment(idproduct, namemember, noidung) value('$idproduct', '$namemember', '$noidung')";
                                        $run1 = mysqli_query($conn, $sql1);
                                    }
                                 ?>
                            </div>
                            <div id="comment-product" class="tabItem" style="margin-top: 0px;">
                                        <?php 
                                            include("config/dbconfig.php");
                                              $sql2 = "SELECT * from tbl_comment where idproduct=".$row['id'];
                                              $run2 = mysqli_query($conn, $sql2);
                                              $i = 0;
                                              while ($row2 = mysqli_fetch_array($run2)) {
                                                $i++;
                                         ?>
                                         <div style="padding: 20px; border: 1px dotted gray; width: 100%; margin: 5px; border-radius: 10px;">
                                             <STRONG><?php echo $row2['namemember']; ?></STRONG>
                                             <hr>
                                             <p style="padding-left: 30px"><?php echo $row2['noidung']; ?></p>
                                         </div>
                                     <?php } ?>
                                        <form action="" method="POST" style="margin-top: 20px; border: 1px dotted gray; padding-left: 10px; padding-top: 5px; border-radius: 10px">
                                            <input style="margin-top: 10px;font-family: inherit; font-size: inherit; line-height: inherit; height: 40px;display: block;padding: 10px 10px;border: 1px solid #ddd;width: 35%;margin-bottom: 15px;" type="text" name="namemember" placeholder="Tên của bạn"><br>
                                            <textarea placeholder="Nội dung..." style="font-family: inherit; font-size: inherit; line-height: inherit; height: 50px;display: block;padding: 5px 10px;border: 1px solid #ddd;width: 95%;margin-bottom: 15px; resize: none;" name="noidung"></textarea><br>
                                            <input style="display: block;border: none;outline: none;background: #4fa327;color: #fff;padding: 8px 20px;margin-bottom: 50px;" type="submit" name="submit" value="Bình luận">
                                        </form>
                                    <div class="fb-comments" id="fb-comment" data-href="" data-numposts="5">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section" id="same-category-wp">
                <div class="section-head">
                    <h3 class="section-title">Cùng chuyên mục</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        <?php
                      include("config/dbconfig.php");
                      $sql = "SELECT * from tbl_product where category like '%$cat%'";
                      $run = mysqli_query($conn, $sql);
                      $i = 0;
                      while ($row = mysqli_fetch_array($run)) {
                        $i++;
                    ;?>
                        <li class="item">
                            <a href="?page=detail_product&id=<?php echo $row['id'];?>" title="" class="thumb">
                                <img src="index.php/../images/product/<?php echo $row['image']?>" alt="">
                            </a>
                            <div class="info">
                                <a href="?page=detail_product&id=<?php echo $row['id'];?>" title="" class="name-product"><?php echo $row['name']?></a>
                                <div class="price-wp">
                                    <span class="new"><?php echo number_format($row['sale']); ?></span>
                                    <span class="old"><?php echo number_format($row['price']); ?></span>
                                </div>
                                <a href="?page=add_cart&id=<?php echo $row['id'] ?>" title="" class="buy-now">Mua ngay</a>
                            </div>
                        </li>
                    <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <div id="sidebar" class="fl-right">
            <div class="section" id="category-wp">
                <div class="section-head">
                    <h3 class="section-title">Danh mục</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        <?php
                                  // $cat = $_GET['id'];
                              
                                  include("config/dbconfig.php");
                                  $sql = "SELECT * from tbl_category";
                                  $run = mysqli_query($conn, $sql);
                                  $i = 0;
                                  while ($row = mysqli_fetch_array($run)) {
                                    $i++;
                                ;?>
                        <li>
                            <a href="?page=category_product&id=<?php echo $row['id']?>" title=""><?php echo $row['title']?></a>
                        </li><?php } ?>
                    </ul>
                </div>
            </div>
            <div class="section" id="list-popular-wp">
                <div class="section-head">
                    <h1 class="section-title">Sản phẩm mới</h1>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        <?php 
                            include("config/dbconfig.php");
                            $sql1 = "SELECT * from tbl_product limit 6";
                            $run1 = mysqli_query($conn, $sql1);
                            $i = 0;
                            while ($row1 = mysqli_fetch_array($run1)) {
                            $i++;
                            ;?>
                        <li class="clearfix">
                            <a href="?page=detail_product&id=<?php echo $row1['id'];?>" title="" class="thumb fl-left">
                                <img src="index.php/../images/product/<?php echo $row1['image']?>" alt="">
                            </a>
                            <div class="info fl-right">
                                <a href="?page=detail_product&id=<?php echo $row1['id'];?>" title="" class="product-name"><?php echo $row1['name']?></a>
                                <span class="fee"><?php echo number_format($row1['sale']); ?> đ</span>
                                <a href="?page=detail_product&id=<?php echo $row1['id'];?>" title="" class="more">Xem chi tiết</a>
                            </div>
                        </li><?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>