<?php
$msg="";
 require('top.php');
 if(isset($_POST['submit'])){
   $categories=get_safe_value($con,$_POST['categories']);
   $id=get_safe_value($con,$_GET['id']);
   //checking whether exist or not
   $check_sql="select * from categories where categories='$categories'";
   $res=mysqli_query($con,$check_sql);
   $check=mysqli_num_rows($res);
   if($check>0){
      $msg="Category already exist";

   }else{

   mysqli_query($con,"update categories set categories='$categories' where id='$id'");
   header('location:categories.php');
   die();
 }
}       
 
    $id=get_safe_value($con,$_GET['id']);
    $sql="select categories from categories where id='$id'";
    $res=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($res);
    $prev_categories=$row['categories'];
 ?>
 
 <div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                     
                        <div class="card-header"><strong>Categories</strong><small>Form</small></div>
                        <div class="card-body card-block">
                           <form method="post">
                           <div class="form-group"><label for="categories" class=" form-control-label">Categories</label><input type="text" name="categories" placeholder="<?php echo $prev_categories?>" class="form-control" required></div>
                        
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