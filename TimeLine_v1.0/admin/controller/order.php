<?php
include_once '../model_DAO/order.php';
extract($_REQUEST);

if (isset($act)) {
    switch ($act) {
        case 'list':
            $orders = order_list();
            include_once 'view/template_header.php';
            include_once 'view/page_order_list.php';
            include_once 'view/template_footer.php';
            break;

        case 'delete':
            $maDonHang = $_GET['maDonHang'];
            order_delete($maDonHang);
            header('Location: ?mod=order&act=list');
            break;

        case 'edit':
            $maDonHang = $_GET['maDonHang'];
            $order = order_get($maDonHang);
            include_once 'view/template_header.php';
            include_once 'view/page_order_edit.php';
            include_once 'view/template_footer.php';
            break;

        case 'update':
            $maDonHang = $_POST['maDonHang'];
            $trangThai = $_POST['trangThai'];
            order_update_status($maDonHang, $trangThai);
            header('Location: ?mod=order&act=list');
            break;

        default:
            echo "Chức năng không tồn tại.";
    }
}
?>
