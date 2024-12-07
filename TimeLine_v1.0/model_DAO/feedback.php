<?php
include_once 'pdo.php';
function feedback_list_id($id){
    $sql="SELECT * FROM BinhLuan bl INNER JOIN KhachHang kh
    ON bl.MaKhachHang=kh.MaKhachHang WHERE MaSanPham=?";
    return pdo_query($sql,$id);
}
function feedback_add($idKH,$feedback,$id){
    $sql="INSERT  INTO BinhLuan(MaKhachHang,NoiDung,MaSanPham)
    VALUES (?,?,?)";
    return pdo_execute($sql,$idKH,$feedback,$id);
}

function feedback_list() {
    $sql = "SELECT * FROM BinhLuan";
    return pdo_query($sql);
}

function feedback_delete($id) {
    $sql = "DELETE FROM BinhLuan WHERE MaBinhLuan = ?";
    pdo_execute($sql, $id);
}

function feedback_update($id, $noidung) {
    $sql = "UPDATE BinhLuan SET NoiDung = ? WHERE MaBinhLuan = ?";
    pdo_execute($sql, $noidung, $id);
}

function feedback_get($id) {
    $sql = "SELECT * FROM BinhLuan WHERE MaBinhLuan = ?";
    return pdo_query_one($sql, $id);
}

?>