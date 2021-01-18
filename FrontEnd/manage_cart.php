<?php
require('connection.php');
require('functions.php');
require('add_to_cart.php');

$pid=$_POST['pid'];
$qty=$_POST['qty'];
$type=$_POST['type'];

$obj=new add_to_cart();
if($type=='add'){
    $obj->addProduct($pid,$qty);
}

if($type=='remove'){
    $obj->removeProduct($pid);
}

if($type=='update'){
    $obj->updateProduct($pid,$qty);
}
echo $obj->totalProduct();



?>