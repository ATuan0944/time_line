<?php
include_once 'pdo.php';

function check_login($email,$pass){
    $sql="SELECT * FROM KhachHang WHERE Email=? AND MatKhau=?";
    return pdo_query_one($sql,$email,$pass);
}

function user_one($id){
    $sql="SELECT * FROM KhachHang WHERE MaKhachHang=?";
    return pdo_query_one($sql,$id);
}

function user_register($name, $email, $pass, $address, $phone, $image){
    $sql = "INSERT INTO KhachHang(HoTen, Email, MatKhau, DiaChi, SDT, Anh)
            VALUES (?, ?, ?, ?, ?, ?)";
    return pdo_execute($sql, $name, $email, $pass, $address, $phone, $image);
}

function user_edit($id,$name,$email,$address,$phone,$image){
    $sql="UPDATE KhachHang SET HoTen=?, Email=?, DiaChi=?, SDT=?, Anh=?
    WHERE MaKhachHang=?";
    return pdo_execute($sql,$name,$email,$address,$phone,$image,$id);
}

function user_list() {
    $sql= "SELECT * FROM KhachHang";
    return pdo_query($sql);
}

function user_delete($id) {
    $sql = "DELETE  FROM KhachHang WHERE MaKhachHang = ?";
    return pdo_execute($sql,$id);
}

// function insertCustomer( $name,  $phone, $address){
//     $sql = "INSERT INTO KhachHang (HoTen, SDT, DiaChi) VALUES (?, ?, ?)";
//     try {
//         pdo_execute($sql, $name, $phone, $address);
//         return pdo_last_insert_id();
//     } catch (PDOException $e) {
//         error_log('Failed to insert customer: ' .$name .', ' . $phone . ', ' . $address);
//         return false;
//     }
// }

?>  