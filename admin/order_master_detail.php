<?php
require('top.php');
$order_id=$_GET['id'];
if(isset($_POST['update_order_status'])){
    $update_order_status=$_POST['update_order_status'];
    echo $update_order_status;
    mysqli_query($con,"update order_info set order_status='$update_order_status' where id='$order_id'");
}


?>
<div class="content pb-0">
    <div class="orders">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                <h4 class="box-title">User Orders Details</h4>
                <h4 class="box-link"></h4>
                </div>
                <div class="card-body--">
                <div class="table-stats order-table ov-h">
                <table class="table">
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
                        
                        $res=mysqli_query($con,"select distinct(order_detail.id),order_detail.*,product.name,product.image from order_detail,product
                        ,order_info where order_detail.order_id='$order_id' and order_detail.product_id=product.id");
                        while($row=mysqli_fetch_assoc($res)){
                            
                           
                            $total_price= $total_price+($row['qty']*$row['price']);
                        ?>
                        <tr>
                            
                            <td class="product-name"><?php echo $row['name']?></td>
                            <td class="product-name"><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>" alt="product img" width="120" height="80" /><br/></td>
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
                <div class="address_details">
                  <?php
                  $res=mysqli_query($con,"select * from order_info where id='$order_id'");
                  $row=mysqli_fetch_assoc($res);
                            $address=$row['address'];
                            $city=$row['city'];
                            $postal_code=$row['postal_code'];
                            $order_status=$row['order_status'];
                            ?>
                    <strong>Address:</strong></br>
                    <?php echo $address?>
                    <?php echo $city?>
                    <?php echo $postal_code?><br/>
                    <strong>Status:</strong>
                    <?php
                      $order_status_arr=mysqli_fetch_assoc(mysqli_query($con,"select name from order_status where id='$order_status'"));
                      echo $order_status_arr['name'];
                    ?>
                </div>
                <br/>
                <div>
                    <form method="post">
                        <select class="form-control" name="update_order_status" id="">
                            <option>Select status</option>
                            <?php
                                   $res=mysqli_query($con,"select * from order_status");
                                   while($row=mysqli_fetch_assoc($res)){
                                       echo "<option value=".$row['id'].">".$row['name']."</option>";
                                   }
                                ?>
                        </select><br/>
                        <input type="submit" class="btn btn-primary btn-lg btn-block"></input>
                    </form>
                </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
<?php
require('footer.php');
?>