<?php

include_once '../model_DAO/order.php';
include_once '../model_DAO/user.php';

// Xử lý yêu cầu từ người dùng
extract($_REQUEST);

switch ($act) {
    case 'checkout':
        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
        if (empty($cart)) {
            echo "Giỏ hàng trống.";
            break;
        }

        include_once 'view/page_checkout.php';
        include_once 'view/template_footer.php';
        break;

    case 'confirm':
        include_once 'view/page_confirm.php';

        break;
    case 'list':
        $userId = $_SESSION['user']['MaKhachHang'];
        $orders = order_list_by_user($userId);

        include_once 'view/page_order_list.php';
        include_once 'view/template_footer.php';
        break;
    case 'detail':
        $orderId = $_GET['id'];
        $order = order_get($orderId);
        $orderDetails = order_details($orderId);

        include_once 'view/page_order_detail.php';
        include_once 'view/template_footer.php';
        break;
}