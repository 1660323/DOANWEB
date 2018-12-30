<script type="text/javascript" src="pages/cart.js"></script>
<div id="main-content-wp" class="cart-page">
   <div class="section" id="breadcrumb-wp">
      <div class="wp-inner">
         <div class="section-detail clearfix">
            <h3 class="title fl-left">Giỏ hàng</h3>
            <ul class="list-breadcrumb fl-right">
               <li>
                  <a href="?page=home" title="">Trang chủ</a>
               </li>
               <li>
                  <a href="" title="">Giỏ hàng</a>
               </li>
            </ul>
         </div>
      </div>
   </div>
   <div id="wrapper" class="wp-inner clearfix">
      <div class="section" id="info-cart-wp">
         <div class="section-detail table-responsive">
            <table class="table">
               <?php 
                  if (!isset($_SESSION['cart'])) {
                      $flag = false;
                  }else {
                      $flag = true;
                  }
                  if ($flag == true) {
                                      
                  ?>
               <thead>
                  <tr>
                     <td>Ảnh sản phẩm</td>
                     <td>Tên sản phẩm</td>
                     <td>Giá sản phẩm</td>
                     <td>Số lượng</td>
                     <td colspan="2">Thành tiền</td>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <?php 
                        include("config/dbconfig.php");
                        $tongtien = 0;
                        foreach ($_SESSION['cart'] as $idproduct=>$soluong) {
                        $sql = "SELECT * from tbl_product where id=".$idproduct;
                        $run = mysqli_query($conn, $sql);
                        $i = 0;
                        while ($row = mysqli_fetch_array($run)) {
                            $i++;
                        ?>
                     <input type="hidden" name="id" value='<?php echo $row["id"];?>'>
                     <td>
                        <a href="" title="" class="thumb">
                        <img src="index.php/../images/product/<?php echo $row['image']?>" alt="">
                        </a>
                     </td>
                     <td>
                        <a href="?page=detail_product&id=<?php echo $row["id"];?>" title="" class="name-product"><?php echo $row['name']?></a>
                     </td>
                     <td><?php echo number_format($row['sale'])?></td>
                     <td>
                        <select style="width: 50px; height: 50px;" class="num-order" data-idproduct="<?php echo $row['id']; ?>">
                        <?php 
                           $i=1;
                           $soluong = $_SESSION['cart'][$idproduct];
                           for ($i; $i <= 100; $i++) {
                               if ($i == $soluong) {
                                   echo "<option value='$i' selected='selected'>$i</option>";
                               }else{
                                   echo "<option value='$i'>$i</option>";
                               }
                           }
                           ?>
                        </select>
                     </td>
                     <td><?php 
                        $thanhtien = $soluong*$row['sale'];
                        echo number_format($thanhtien); 
                        $tongtien += $thanhtien;
                        ?></td>
                     <td>
                        <form action="pages/delete_cart.php">
                           <input type="hidden" name="id" value="<?php echo($row['id']);?>">
                           <input style="border: 0px;background: white;color: #b4666c;" type="submit" name="" class="del-product" value="<?php echo 'Xóa'?>">
                        </form>
                     </td>
                  </tr>
                  <?php } }?>
               </tbody>
               <tfoot>
                  <tr>
                     <td colspan="7">
                        <div class="clearfix">
                           <p id="total-price" class="fl-right">Tổng giá: <?php echo number_format($tongtien); 
                              ?><span>
                              </span>
                           </p>
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td colspan="7">
                        <div class="clearfix">
                           <div class="fl-right">
                              <?php 
                                 echo "<a href='?page=cart' title='' id='update-cart'>Cập nhật giỏ hàng</a>";
                                 echo "<a href='?page=checkout' title='Thanh toán' id='checkout-cart'>Thanh toán</a>";
                                 }else {
                                     echo "<a href='#' title='Giỏ hàng trống' id='checkout-cart'>Giỏ hàng trống</a>";
                                 }
                                 ?>
                           </div>
                        </div>
                     </td>
                  </tr>
               </tfoot>
            </table>
         </div>
      </div>
      <div class="section" id="action-cart-wp">
         <div class="section-detail">
            <a href="?page=home" title="" id="buy-more">Mua tiếp</a><br/>
            <a href="pages/home_delete.php" title="" id="delete-cart">Xóa giỏ hàng</a>
         </div>
      </div>
      <br>
   </div>
</div>
<?php $_SESSION['tongtien']=$tongtien; ?>