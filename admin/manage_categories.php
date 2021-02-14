 <?php
 $msg="";
 require('top.php');
 if(isset($_POST['submit'])){
   $categories=get_safe_value($con,$_POST['categories']);
   $check_sql="select * from categories where categories='$categories'";
   $res=mysqli_query($con,$check_sql);
   $check=mysqli_num_rows($res);
   if($check>0){
      $msg="Category already exist";

   }else{
   mysqli_query($con,"insert into categories(categories,status) values('$categories','1')");
   header('location:categories.php');
   die();
    }
 }
?>
 
 <div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                     
                        <div class="card-header"><strong>Categories</strong><small>Form</small></div>
                        <div class="card-body card-block">
                           <form method="post">
                           <div class="form-group"><label for="categories" class=" form-control-label">Categories</label><input type="text" name="categories" placeholder="Enter your categories name" class="form-control" required></div>
                        
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