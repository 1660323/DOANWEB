<div id="footer-wp">
    <div id="foot-body">
        <div class="wp-inner clearfix">
            <div class="block" id="about-us">
                <h3 class="title">Về chúng tôi</h3>
                <div class="detail">
                    <ul class="list-item">
                        <li>
                            <a href="mailto:truongcongloi1998@gmail.com">truongcongloi1998@gmail.com</a>
                        </li>
                        <li>
                            <p class="tel">0868.31.32.05</p>
                        </li>
                        <li>
                            <p class="phone">0868.31.32.05 - 0911.855.369</p>
                        </li>
                    </ul>
                    <a href="" title="" id="read-more">Xem thêm</a>
                </div>
            </div>
            <div class="block" id="category-product">
                <h3 class="title">Danh mục sản phẩm</h3>
                <div class="detail">
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
                        </li>
                    <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="block" id="top-selling">
                <h3 class="title">Danh mục hot</h3>
                <div class="detail">
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
                        </li>
                    <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="block" id="fanpage">
                <div class="detail">
                    <div class="fb-page" data-href="https://www.facebook.com/Share-Source-Code-Website-189970988225280/" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Share-Source-Code-Website-189970988225280/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Share-Source-Code-Website-189970988225280/">Share Source Code Website</a></blockquote></div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div id="menu-respon">
    <a href="?page=home" title="" class="logo">
        <img src="public/images/logo-ft.png" alt="">
    </a>
    <div id="menu-respon-wp">
        <ul class="" id="main-menu-respon">
            <li>
                <a href="?page=home" title>Trang chủ</a>
            </li>
            <li>
                <a href="" title>Về chúng tôi</a>
            </li>
            <li>
                <a href="?page=category_product" title>Sản phẩm</a>
                <ul class="sub-menu">
                    <li>
                        <a href="?page=category_product" title="">Đồ chơi cho trẻ dưới 1 tuổi</a>
                    </li>
                    <li>
                        <a href="?page=category_product" title="">Đồ chơi cho trẻ từ 1 đến 3 tuổi</a>
                    </li>
                    <li>
                        <a href="?page=category_product" title="">Đồ chơi cho trẻ trên 3 tuổi</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="?page=category_product" title>Kiến thức & Mẹo vặt</a>
            </li>
            <li>
                <a href="?page=category_product" title>Liên hệ</a>
            </li>
        </ul>
    </div>
</div>
</div>
<div id="btn-top">
    <img src="public/images/icon-to-top.png" alt="">
</div>

</body>
</html>