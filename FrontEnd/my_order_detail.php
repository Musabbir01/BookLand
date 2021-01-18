<?php
require('top.php');
$order_id=$_GET['id'];

?> 
<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/3.jpg) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- wishlist-area start -->
<div class="wishlist-area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="wishlist-content">
                            <form action="#">
                                <div class="wishlist-table table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                               
                                                <th class="product-thumbnail">Product Name</th>
                                                <th class="product-name"><span class="nobr">Image</span></th>
                                                <th class="product-price"><span class="nobr">Quantity</span></th>
                                                <th class="product-stock-stauts"><span class="nobr">Price</span></th>
                                                <th class="product-add-to-cart"><span class="nobr">Total Price</span></th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $total_price=0;
                                            $uid=$_SESSION['USER_ID'];
                                            $res=mysqli_query($con,"select distinct(order_detail.id),order_detail.*,product.name,product.image from order_detail,product
                                            ,order_info where order_detail.order_id='$order_id' and order_info.user_id='$uid' and order_detail.product_id=product.id");
                                            while($row=mysqli_fetch_assoc($res)){
                                                $total_price= $total_price+($row['qty']*$row['price']);
                                            ?>
                                            <tr>
                                               
                                                <td class="product-name"><?php echo $row['name']?></td>
                                                <td class="product-name"><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>" alt="product img" width="100" height="150" /><br/></td>
                                                <td class="product-name"><?php echo $row['qty']?></td>
                                                <td class="product-name"><?php echo $row['price']?></td>
                                                <td class="product-name"><?php echo $row['qty']*$row['price']?></td>
                                                
                                                
                                            </tr>
                                            <?php } ?>
                                            <tr>
                                               
                                                <td colspan="3"></td>
                                                <td class="product-name">Total Price</td>
                                              
                                                <td class="product-name"><?php echo $total_price?></td>
                                                
                                                
                                            </tr>
                                          
                                        </tbody>
                                       
                                    </table>
                                </div>  
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- wishlist-area end -->
<?php
require('footer.php');
?>