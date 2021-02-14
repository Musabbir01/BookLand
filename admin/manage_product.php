<?php
 
 require('top.php');
 $msg="";
 $categories_id="";
 $name="";
 $mrp="";
 $short_desc="";
 $description="";
 $meta_title="";
 $meta_desc="";
 $meta_keyword="";
 $img_msg="";
  
 if(isset($_POST['submit'])){
   $categories_id=get_safe_value($con,$_POST['categories_id']);
   $name=get_safe_value($con,$_POST['name']);
   $mrp=get_safe_value($con,$_POST['mrp']);
   $price=get_safe_value($con,$_POST['price']);
   $qty=get_safe_value($con,$_POST['qty']);
   $short_desc=get_safe_value($con,$_POST['short_desc']);
   $description=get_safe_value($con,$_POST['description']);
   $meta_title=get_safe_value($con,$_POST['meta_title']);
   $meta_desc=get_safe_value($con,$_POST['meta_desc']);
   $meta_keyword=get_safe_value($con,$_POST['meta_keyword']);
   
   // $check_sql="select * from product where categories='$categories'";
   // $res=mysqli_query($con,$check_sql);
   // $check=mysqli_num_rows($res);
   // if($check>0){
   //    $msg="Category already exist";

   // }else{
  
   $image=$_FILES['image']['name'];
   move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
   mysqli_query($con,"insert into product(categories_id,name,mrp,price,qty,short_desc,description,meta_title,meta_desc,meta_keyword,status,image) values('$categories_id','$name','$mrp','$price','$qty','$short_desc','$description','$meta_title','$meta_desc','$meta_keyword','1','$image')");
   
   header('location:product.php');
   die();
    }
   
 
?>
 
 <div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                     
                        <div class="card-header"><strong>Product</strong><small>Form</small></div>
                        <div class="card-body card-block">
                           <form method="post" enctype="multipart/form-data">
                           <div class="form-group"><label for="categories" class=" form-control-label">Categories</label>
                           <select class="form-control" name="categories_id" id="">
                                <option value="">Select Categories</option>
                                <?php
                                   $res=mysqli_query($con,"select id,categories from categories order by categories asc");
                                   while($row=mysqli_fetch_assoc($res)){
                                       echo "<option value=".$row['id'].">".$row['categories']."</option>";
                                   }
                                ?>


                           </select>
                           <p></p>
                           <div class="form-group">
                               <label for="Product Name" class=" form-control-label">Product Name</label>
                               <input type="text" name="name" placeholder="Enter product name" class="form-control" required>
                            </div>
                           <div class="form-group">
                               <label for="mrp" class=" form-control-label">MRP</label>
                               <input type="text" name="mrp" placeholder="Enter product mrp" class="form-control" required>
                            </div>
                           <div class="form-group">
                               <label for="categories" class=" form-control-label">Price</label>
                               <input type="text" name="price" placeholder="Enter product price" class="form-control" required>
                            </div>
                           <div class="form-group">
                               <label for="categories" class=" form-control-label">Quantity</label>
                               <input type="text" name="qty" placeholder="Enter quantity" class="form-control" required>
                            </div>
                           <div class="form-group">
                               <label for="categories" class=" form-control-label">Image</label>
                               <input type="file" name="image" class="form-control" required>
                               
                               
                            </div>
                            <div class="form-group">
                               <label for="categories" class=" form-control-label">Short Description</label>
                               <textarea name="short_desc" placeholder="Enter Short Description" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                               <label for="categories" class=" form-control-label">Long Description</label>
                               <textarea name="description" placeholder="Enter long Description" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                               <label for="categories" class=" form-control-label">Meta Title</label>
                               <textarea name="meta_title" placeholder="Enter Meta Title" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                               <label for="categories" class=" form-control-label">Meta Description</label>
                               <textarea name="meta_desc" placeholder="Enter Meta Description" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                               <label for="categories" class=" form-control-label">Meta Keyword</label>
                               <textarea name="meta_keyword" placeholder="Enter Meta keyword" class="form-control"></textarea>
                            </div>

                           <p></p>
                        
                           <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">

                           <span id="payment-button-amount">Submit</span>
                           </button>
                           <div class="field_error"><?php echo $msg?></div>
                           <div class="field_error"><?php echo $msg?></div>

                           </form>
                        </div>
                     </div>
                     
                  </div>
               </div>
            </div>
         </div>

 <?php
 require('footer.php');
 ?>