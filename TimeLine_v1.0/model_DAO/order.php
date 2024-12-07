<?php
include_once 'pdo.php';


// function create_order($user_id, $order_date, $total) {
//     $sql = "INSERT INTO DonHang (MaKhachHang, NgayDatHang, TongTien) VALUES (?, ?, ?)";
//     return pdo_execute_last_insert_id($sql, $user_id, $order_date, $total);
// }

// Hàm thêm chi tiết đơn hàng
function add_order_detail($order_id, $product_id, $quantity, $price) {
    $sql = "INSERT INTO ChiTietDonHang (MaDonHang, MaSanPham, SoLuong, GiaBan) VALUES (?, ?, ?, ?)";
    pdo_execute($sql, $order_id, $product_id, $quantity, $price);
}

// Hàm lấy chi tiết đơn hàng
function get_order_details($order_id) {
    $sql = "SELECT * FROM ChiTietDonHang WHERE MaDonHang = ?";
    return pdo_query($sql, $order_id);
}

function order_list() {
    $sql = "SELECT dh.MaDonHang, dh.NgayDatHang, dh.TongTien, dh.TrangThai, kh.HoTen, kh.SDT, kh.DiaChi 
            FROM donhang dh
            INNER JOIN khachhang kh ON dh.MaKhachHang = kh.MaKhachHang";
    return pdo_query($sql);

}

function order_delete($maDonHang) {
    //Xóa chi tiết các đơn hàng trước khi xóa đơn hàng
    $sqlDeleteDetails = "DELETE FROM chitietdonhang WHERE MaDonHang = ?";
    pdo_execute($sqlDeleteDetails, $maDonHang);

    // Sau đó xóa đơn hàng
    $sqlDeleteOrder = "DELETE FROM donhang WHERE MaDonHang = ?";
    pdo_execute($sqlDeleteOrder, $maDonHang);
}

function order_get($maDonHang) {
    $sql = "SELECT * FROM donhang WHERE MaDonHang = ?";
    return pdo_query_one($sql, $maDonHang);
}

function order_update_status($maDonHang, $trangThai) {
    $sql = "UPDATE donhang SET TrangThai = ? WHERE MaDonHang = ?";
    pdo_execute($sql, $trangThai, $maDonHang);
}

function order_list_by_user($maKhachHang) {
    $sql = "SELECT * FROM donhang WHERE MaKhachHang = ?";
    return pdo_query($sql, $maKhachHang);

}

function order_details($maDonHang) {
    $sql = "SELECT ct.*, sp.TenSanPham, sp.HinhAnh 
            FROM chitietdonhang ct 
            JOIN sanpham sp ON ct.MaSanPham = sp.MaSanPham 
            WHERE ct.MaDonHang = ?";
    return pdo_query($sql, $maDonHang);

}

?>