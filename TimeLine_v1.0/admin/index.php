<?php
extract($_REQUEST);
if(isset($mod)){
    switch($mod){
    case 'category':
        include_once 'controller/category.php';
        break;
    case 'product':
        include_once 'controller/product.php';
        break;
    case 'user':
        include_once 'controller/user.php';
        break;
    case 'order':
        include_once 'controller/order.php';
        break;
    case 'feedback':
        include_once 'controller/feedback.php';
        break;
    case 'stats':
        include_once 'controller/stats.php';
        break;
    }

}




?>
