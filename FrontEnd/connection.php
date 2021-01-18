<?php
session_start();
$con=mysqli_connect("localhost","root","","ecom");
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/ecommerce/');   
define('SITE_PATH','http://localhost/ecommerce/'); 

define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'/admin/images/product/');  
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'/admin/images/product/'); 
?>