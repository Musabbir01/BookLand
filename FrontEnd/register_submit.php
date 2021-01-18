<?php
require('connection.php');
require('functions.php');


$name=$_POST['name'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$password =$_POST['password'];

$check_user=mysqli_num_rows(mysqli_query($con,"select * from user_info where email='$email'"));
if($check_user>0){
    echo "exists";
}else{
    $added_on=date('Y-m-d h:i:s');
    mysqli_query($con,"insert into user_info(user_name,email,password,user_mobile,added_on) values('$name','$email','$password','$mobile','$added_on')");
    echo "inserted";
}
?>