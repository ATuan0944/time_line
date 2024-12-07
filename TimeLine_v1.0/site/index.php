<?php
session_start();
extract($_REQUEST);
if (isset($mod)) {
    switch ($mod) {
        case 'page':
            include_once 'controller/page.php';
            break;
        case 'cart':
            include_once 'controller/cart.php';
            break;
        case 'user':
            include_once 'controller/user.php';
            break;
        case 'product':
            include_once 'controller/product.php';
            break;
        case 'order':
            include_once 'controller/order.php';
            break;
        case 'contact':
            include_once 'controller/contact.php';
            break;    
    }
} else {
    header('location: ?mod=page&act=home');
}
?>