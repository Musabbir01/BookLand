<?php
require('top.php');
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
                                               
                                                <th class="product-thumbnail">Order ID</th>
                                                <th class="product-name"><span class="nobr">Order Date</span></th>
                                                <th class="product-price"><span class="nobr"> Address </span></th>
                                                <th class="product-stock-stauts"><span class="nobr"> Payment Type </span></th>
                                                <th class="product-add-to-cart"><span class="nobr">Payment Status</span></th>
                                                <th class="product-add-to-cart"><span class="nobr">Order Status</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $uid=$_SESSION['USER_ID'];
                                            $res=mysqli_query($con,"select order_info.*,order_status.name as order_status_str from order_info,
                                            order_status where order_info.user_id='$uid' and order_status.id=order_info.order_status");
                                            while($row=mysqli_fetch_assoc($res)){
                                            ?>
                                            <tr>
                                                <td class="product-add-to-cart"><a href="my_order_detail.php?id=<?php echo $row['id']?>"><?php echo $row['id']?></a></td>
                                                <td class="product-name"><?php echo $row['added_on']?></td>
                                                <td class="product-name"><?php echo $row['address']?><br/>
                                                <?php echo $row['city']?><br/>
                                                <?php echo $row['postal_code']?><br/>
                                                <?php echo $row['address']?>
                                             
                                                </td>
                                                <td class="product-name"><?php echo $row['payment_type']?></td>
                                                <td class="product-name"><?php echo $row['payment_status']?></td>
                                                <td class="product-name"><?php echo $row['order_status_str']?></td>
                                                
                                                
                                            </tr>
                                            <?php } ?>
                                          
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