<?php
include_once 'pdo.php';

function getTotalOrders() {
    $sql = "SELECT COUNT(*) AS total_orders FROM donhang";
    return pdo_query_one($sql);
}

function getTotalRevenue() {
    $sql = "SELECT SUM(TongTien) AS total_revenue FROM donhang";
    return pdo_query_one($sql);
}

function getTotalCustomers() {
    $sql = "SELECT COUNT(*) AS total_customers FROM khachhang";
    return pdo_query_one($sql);
}

function getTopProducts() {
    $sql = "SELECT sp.TenSanPham, SUM(ct.SoLuong) AS total_quantity
            FROM chitietdonhang ct
            JOIN sanpham sp ON ct.MaSanPham = sp.MaSanPham
            GROUP BY sp.TenSanPham
            ORDER BY total_quantity DESC
            LIMIT 5";
    return pdo_query($sql);
}
?>