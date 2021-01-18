<?php
require('connection.php');

$name=$_POST['name'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$comment =$_POST['message'];
$added_on=date('Y-m-d h:i:s');
mysqli_query($con,"insert into contact_us(name,email,mobile,comment,added_on) values('$name','$email','$mobile','$comment','$added_on')");
echo "Thank you";
?>