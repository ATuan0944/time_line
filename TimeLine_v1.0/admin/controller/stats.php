<?php
include_once '../model_DAO/stats.php';

if (isset($act)) {
    switch ($act) {
        case 'view':
            $totalOrders = getTotalOrders();
            $totalRevenue = getTotalRevenue();
            $totalCustomers = getTotalCustomers();
            $topProducts = getTopProducts();
            include_once 'view/template_header.php';
            include_once 'view/page_stats.php';
            include_once 'view/template_footer.php';
            break;
        default:
            echo "Chức năng không tồn tại.";
    }
}
?>