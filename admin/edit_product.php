<?php
require('top.php');
$msg="";
$categories_id='';
$name='';
$mrp='';
$price='';
$qty='';
$shortdes='';
$des='';
$metatitle='';
$metades='';
$metakey='';
$image='';

 
 if(isset($_POST['submit'])){
    $categories_id=get_safe_value($con,$_POST['categories_id']);
    $name=get_safe_value($con,$_POST['name']);
    $mrp=get_safe_value($con,$_POST['mrp']);
    $price=get_safe_value($con,$_POST['price']);
    $qty=get_safe_value($con,$_POST['qty']);
    $shortdes=get_safe_value($con,$_POST['short_desc']);
    $des=get_safe_value($con,$_POST['description']);
    $metatitle=get_safe_value($con,$_POST['meta_title']);
    $metades=get_safe_value($con,$_POST['meta_desc']);
    $metakey=get_safe_value($con,$_POST['meta_keyword']);
    $image=$_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'],'images/product/'.$image);
   $id=get_safe_value($con,$_GET['id']);
   //checking whether exist or not
//    $check_sql="select * from categories where categories='$categories'";
//    $res=mysqli_query($con,$check_sql);
//    $check=mysqli_num_rows($res);
//    if($check>0){
//       $msg="Category already exist";

//    }else{

   mysqli_query($con,"update product set categories_id='$categories_id',name='$name',mrp='$mrp',price='$price',qty='$qty',
   short_desc='$shortdes',description='$des',meta_title='$metatitle',meta_desc='$metades',meta_keyword='$metakey',image='$image' where id='$id'");
   header('location:product.php');
   die();
 
}       
 
    $id=get_safe_value($con,$_GET['id']);
    $sql="select * from product where id='$id'";
    $res=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($res);
    $prev_categories_id=$row['categories_id'];
    $prev_name=$row['name'];
    $prev_mrp=$row['mrp'];
    $prev_price=$row['price'];
    $prev_qty=$row['qty'];
    $prev_shortdes=$row['short_desc'];
    $prev_des=$row['description'];
    $prev_metatitle=$row['meta_title'];
    $prev_metades=$row['meta_desc'];
    $prev_metakey=$row['meta_keyword'];
    $cat_name_sql="select * from categories where id='$prev_categories_id'";
    $fe=mysqli_query($con,$cat_name_sql);
    $row_name=mysqli_fetch_assoc($fe);
 ?>
 
 <div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                     
                        <div class="card-header"><strong>Categories</strong><small>Form</small></div>
                        <div class="card-body card-block">
                           <form method="post" enctype="multipart/form-data">
                           <div class="form-group"><label for="categories" class=" form-control-label">Categories</label>
                           <select class="form-control" name="categories_id" id="">
                                <option value=""><?php echo $row_name['categories']?></option>
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
                               <input type="text" name="name" placeholder="<?php echo $prev_name?>" class="form-control" required>
                            </div>
                           <div class="form-group">
                               <label for="mrp" class=" form-control-label">MRP</label>
                               <input type="text" name="mrp" placeholder="<?php echo $prev_mrp?>" class="form-control" required>
                            </div>
                           <div class="form-group">
                               <label for="categories" class=" form-control-label">Price</label>
                               <input type="text" name="price" placeholder="<?php echo $prev_price?>" class="form-control" required>
                            </div>
                           <div class="form-group">
                               <label for="categories" class=" form-control-label">Quantity</label>
                               <input type="text" name="qty" placeholder="<?php echo $prev_qty?>" class="form-control" required>
                            </div>
                           <div class="form-group">
                               <label for="categories" class=" form-control-label">Image</label>
                               <input type="file" name="image" class="form-control" required>
                            </div>
                            <div class="form-group">
                               <label for="categories" class=" form-control-label">Short Description</label>
                               <textarea name="short_desc" placeholder="<?php echo $prev_shortdes?>" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                               <label for="categories" class=" form-control-label">Long Description</label>
                               <textarea name="description" placeholder="<?php echo $prev_des?>" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                               <label for="categories" class=" form-control-label">Meta Title</label>
                               <textarea name="meta_title" placeholder="<?php echo $prev_metatitle?>" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                               <label for="categories" class=" form-control-label">Meta Description</label>
                               <textarea name="mata_desc" placeholder="<?php echo $prev_metades?>" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                               <label for="categories" class=" form-control-label">Meta Keyword</label>
                               <textarea name="meta_keyword" placeholder="<?php echo $prev_metakey?>" class="form-control"></textarea>
                            </div>
                        
                           <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
                           <span id="payment-button-amount">Submit</span>
                           </button>
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
