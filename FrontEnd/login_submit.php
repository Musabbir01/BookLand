<?php
require('connection.php');
require('functions.php');



$email=$_POST['email'];
$password =$_POST['password'];
$res=mysqli_query($con,"select * from user_info where email='$email' and password='$password'");
$check_user=mysqli_num_rows($res);
if($check_user>0){
    $row=mysqli_fetch_assoc($res);
    $_SESSION['USER_LOGIN']='yes';
    $_SESSION['USER_ID']=$row['id'];
    $_SESSION['USER_EMAIL']=$row['email'];
    $_SESSION['USER_NAME']=$row['user_name'];
    echo "valid";
}else{
    echo "wrong";
}
?>