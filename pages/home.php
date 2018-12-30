<div id="main-content-wp" class="home-page">
    <div id="slider-wp">
        <?php 
        include("config/dbconfig.php");
        $sql = "SELECT * from tbl_banner  where active = 1 limit 3";
        $run = mysqli_query($conn, $sql);
        $i = 0;
        while ($row = mysqli_fetch_array($run)) {
        $i++;
        ;?>
        
         <img src="index.php/../images/banner/<?php echo $row['image']?>" alt="">
        
         <?php } ?>
         
    </div>
    <div class="section" id="intro-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <p class="content fl-left">Free ship nội thành</p>
                        <div class="icon fl-right"><i class="fa fa-shopping-cart" aria-hidden="true"></i></div>
                    </li>
                    <li>
                        <p class="content fl-left">Tặng thẻ thành viên</p>
                        <div class="icon fl-right"><i class="fa fa-gift" aria-hidden="true"></i></i></div>
                    </li>
                    <li>
                        <p class="content fl-left">Luôn đặt khách hàng lên đầu</p>
                        <div class="icon fl-right"><i class="fa fa-paper-plane" aria-hidden="true"></i></div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="section" id="product-discount-wp">
        <div class="wp-inner">
            <div class="section-head">
                <h3 class="section-title">Sản phẩm khuyến mại</h3>
            </div>
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <?php
                      // $cat = $_GET['id'];
                    
                    include("config/dbconfig.php");
                    $sql = "SELECT * from tbl_product order by id desc limit 8";
                    $run = mysqli_query($conn, $sql);
                    $i = 0;
                    while ($row = mysqli_fetch_array($run)) {
                        $i++;
                        ;?>
                        <li>
                            <a href="?page=detail_product&id=<?php echo $row['id'];?>" title="" class="thumb">
                                <img src="index.php/../images/product/<?php echo $row['image']?>" alt="">
                            </a>
                            <div class="info">
                                <div class="discount-tag"><?php echo number_format((int)(($row['price']-$row['sale'])/$row['price']*100)); ?>%</div>
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
<?php
  include("config/dbconfig.php");
  $cat = "SELECT * from tbl_category order by id desc";
  $runcat = mysqli_query($conn, $cat);
  $c = 0;
  while ($rowcat = mysqli_fetch_array($runcat)) {
    $category =$rowcat['id'];
    $c++;
;?>
    <div class="section" id="list-product-wp">
        <div class="wp-inner">
            <div class="section-head clearfix">
            <h3 class="section-title fl-left"><?php echo $rowcat['title']?></h3>
            <a href="?page=category_product&id=<?php echo $category?>" title="" class="see-more fl-right">Xem thêm</a>
            </div>
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <?php
                    include("config/dbconfig.php");
                    $sql = "SELECT * from tbl_product where category = '$category' order by id asc limit 8";
                    $run = mysqli_query($conn, $sql);
                    $i = 0;
                    while ($row = mysqli_fetch_array($run)) {
                        $i++;
                        ;?>
                        <li>
                            <a href="?page=detail_product&id=<?php echo $row['id'] ?>" title="" class="thumb">
                                <img src="index.php/../images/product/<?php echo $row['image']?>" alt="">
                            </a>
                            <div class="info">
                                <a href="?page=detail_product&id=<?php echo $row['id'] ?>" title="" class="name-product"><?php echo $row['name']?></a>
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
    </div><?php } ?>
    <div class="section" id="blog-wp">
        <div class="wp-inner">
            <div class="section-head">
                <h3 class="section-title">Thông tin</h3>
            </div>
            <div class="section-detail">
                <div id="blog-list">
                    <ul class="list-item">
                        <?php 
                            include("config/dbconfig.php");
                          //Bước 2: Hiển thị các dữ liệu trong bảng ra đây
                           $sql = "select * from tbl_post";
                           $run = mysqli_query($conn, $sql);
                                $i = 0;
                                while ($row = mysqli_fetch_array($run)) {
                                  $i++;
                     ?>
                        <li class="item">
                            <a href="?page=detail_news&id=<?php echo $row['id']; ?>" title="" class="thumb">
                                <img src="index.php/../images/post/<?php echo $row['image'] ?>" alt="">
                            </a>
                            <a href="?page=detail_news&id=<?php echo $row['id']; ?>" title="" class="title"><?php echo $row['title'] ?></a>
                            <p class="desc"><?php echo $row['mota']; ?></p>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div style="margin-top: 30px;"></div>
</div>