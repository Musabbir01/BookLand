<?php
require('top.php');

$cart_total=0;
foreach($_SESSION['cart'] as $key=>$val){
    $productArr=get_product($con,'','',$key);
    $price=$productArr[0]['price'];
    $qty=$val['qty'];
    $cart_total=$cart_total+($price*$qty);
}

if(isset($_POST['submit'])){
    $f_name=$_POST['f_name'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $pincode=$_POST['pincode'];
    $mobile=$_POST['mobile'];
    $payment_type=$_POST['payment_type'];
    $user_id= $_SESSION['USER_ID'];
    $total_price=$cart_total;
    $payment_status='pending';
    if($payment_type=='cod'){
    $payment_status='success';
    }
    $order_status='1';
    $added_on=date('Y-m-d h:i:s');
    
    $sql="insert into order_info(user_id,f_name,address,city,postal_code,mobile,payment_type,total_price,payment_status,order_status,added_on) values('$user_id','$f_name','$address','$city','$pincode','$mobile','$payment_type','$total_price','$payment_status','$order_status','$added_on')";
    mysqli_query($con,$sql);
    $order_id=mysqli_insert_id($con);
    foreach($_SESSION['cart'] as $key=>$val){
        $productArr=get_product($con,'','',$key);
        $price=$productArr[0]['price'];
        $qty=$val['qty'];
        $cart_total=$cart_total+($price*$qty);
        mysqli_query($con,"insert into order_detail(order_id,product_id,qty,price) values('$order_id','$key','$qty','$price')");
    }
    unset($_SESSION['cart']);
    ?>
    <script>
        window.location.href="thank_you.php";
    </script>

  
    
<?php

}


?>
<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">  
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.html">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">checkout</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="checkout-wrap ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="checkout__inner">
                            <form method="post">
                            <div class="accordion-list">
                                <div class="accordion">
                                   
                                    <div class="accordion__title">
                                        Address Information
                                    </div>
                                    <div class="accordion__body">
                                        <div class="bilinfo">
                                            
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="single-input">
                                                            <input type="text" name='f_name' placeholder="First name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="single-input">
                                                            <input type="text" name='address' placeholder="Street Address">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-6">
                                                        <div class="single-input">
                                                            <input type="text" name='city'  placeholder="City/State">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="single-input">
                                                            <input type="text" name='pincode' placeholder="Post code/ zip">
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="col-md-6">
                                                        <div class="single-input">
                                                            <input type="text" name='mobile' placeholder="Phone number">
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                        </div>
                                    </div>
                                    <div class="accordion__title">
                                        payment information
                                    </div>
                                    <div class="accordion__body">
                                        <div class="paymentinfo">
                                            <div class="single-method">
                                                bKash <input type="radio" name='payment_type' value='bKash' required/>
                                               &nbsp;Cash on delivery <input type="radio" name='payment_type' value='COD' required/>
                                            </div>
                                           
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="single-method">
                                    <input type="submit" name='submit'/>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="order-details">
                            <h5 class="order-details__title">Your Order</h5>
                            <div class="order-details__item">
                            <?php
                                $cart_total=0;
                                foreach($_SESSION['cart'] as $key=>$val){
                                    
                                $productArr=get_product($con,'','',$key);
                                $pname=$productArr[0]['name'];
                                $mrp=$productArr[0]['mrp'];
                                $price=$productArr[0]['price'];
                                $image=$productArr[0]['image'];
                                $qty=$val['qty'];
                                $cart_total=$cart_total+($price*$qty);
                                
                                            

                            ?>
                                <div class="single-item">
                                    <div class="single-item__thumb">
                                        
                                        <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$image?>" />
                                    </div>
                                    <div class="single-item__content">
                                        <a href="#"><?php echo $pname?></a>
                                        <span class="price"><?php echo $price*$qty?></span>
                                    </div>
                                    
                                    
                                </div>
                                <?php }?>
                            </div>
                           
                            <div class="ordre-details__total">
                                <h5>Order total</h5>
                                <span class="price"><?php echo $cart_total?></span>
                            </div>
                        </div>
                        <div class="dark-btn">
                        <a href="cart.php">Back To Cart</a>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <!-- cart-main-area end -->
<?php
require('footer.php');
?>