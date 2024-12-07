<?php
// session_start();

// Kết nối đến cơ sở dữ liệu
try {
    $db = new PDO('mysql:host=localhost;dbname=webnoithat;charset=utf8', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Kết nối CSDL thất bại: ' . $e->getMessage();
    die();
}

function generateRandomOrderId($db) {
    // Tạo mã đơn hàng ngẫu nhiên
    $maDonHang = mt_rand(100000000, 999999999);

    // Kiểm tra xem mã đơn hàng đã tồn tại trong cơ sở dữ liệu chưa
    $sqlCheckExistence = "SELECT COUNT(*) AS count FROM donhang WHERE MaDonHang = :maDonHang";
    $stmtCheckExistence = $db->prepare($sqlCheckExistence);
    $stmtCheckExistence->bindParam(':maDonHang', $maDonHang);
    $stmtCheckExistence->execute();
    $result = $stmtCheckExistence->fetch(PDO::FETCH_ASSOC);

    // Nếu mã đã tồn tại, thì tạo lại mã mới
    if ($result['count'] > 0) {
        return generateRandomOrderId($db);
    }

    return $maDonHang;
}

// Sử dụng hàm để tạo mã đơn hàng
$maDonHang = generateRandomOrderId($db);

// Lấy thời gian thực
$ngayDatHang = date('Y-m-d H:i:s');

// Tính tổng tiền của giỏ hàng (tạm thời sử dụng giá trị cố định)
$sum = 0;
foreach ($_SESSION['cart'] as $item) {
    $productTotal = $item['GiaKhuyenMai'] * $item['SL'];
    $sum += $productTotal; // Cộng dồn tổng tiền sản phẩm vào $sum
}

$sum += 30000;

// Lấy thông tin khách hàng từ session
if (isset($_SESSION['user']['MaKhachHang'])) {
    $maKhachHang = $_SESSION['user']['MaKhachHang'];
} else {
    // Xử lý nếu không có thông tin khách hàng trong session
    echo "Không có thông tin khách hàng trong session.";
    die();
}

try {

    // Lấy thông tin khách hàng từ cơ sở dữ liệu
    $sqlGetCustomerInfo = "SELECT * FROM khachhang WHERE MaKhachHang = :maKhachHang";
    $stmtGetCustomerInfo = $db->prepare($sqlGetCustomerInfo);
    $stmtGetCustomerInfo->bindParam(':maKhachHang', $maKhachHang);
    $stmtGetCustomerInfo->execute();
    $customerInfo = $stmtGetCustomerInfo->fetch(PDO::FETCH_ASSOC);

    // Bắt đầu giao dịch
    $db->beginTransaction();

    // Thêm thông tin đơn hàng vào bảng donhang
    $sqlInsertDonHang = "INSERT INTO donhang (MaDonHang, NgayDatHang, MaKhachHang, TongTien, TrangThai, GhiChu)
                  VALUES (:maDonHang, :ngayDatHang, :maKhachHang, :tongTien, 'Đang chờ xử lý', NULL)";

    $stmtInsertDonHang = $db->prepare($sqlInsertDonHang);

    // Bind các tham số
    $stmtInsertDonHang->bindParam(':maDonHang', $maDonHang);
    $stmtInsertDonHang->bindParam(':ngayDatHang', $ngayDatHang);
    $stmtInsertDonHang->bindParam(':maKhachHang', $maKhachHang);
    $stmtInsertDonHang->bindParam(':tongTien', $sum);

    // Thực thi truy vấn
    $stmtInsertDonHang->execute();

    // Lấy mã đơn hàng vừa thêm
    $maDonHangInserted = $db->lastInsertId();

    // Thêm thông tin chi tiết đơn hàng vào bảng chitietdonhang
    foreach ($_SESSION['cart'] as $item) {
        $maSanPham = $item['MaSanPham'];
        $soLuong = $item['SL'];
        $giaBan = $item['GiaKhuyenMai'];

        $sqlInsertChiTiet = "INSERT INTO chitietdonhang (MaDonHang, MaSanPham, SoLuong, GiaBan)
                             VALUES (:maDonHang, :maSanPham, :soLuong, :giaBan)";

        $stmtInsertChiTiet = $db->prepare($sqlInsertChiTiet);

        $stmtInsertChiTiet->bindParam(':maDonHang', $maDonHang); // Sử dụng mã đơn hàng đã tạo
        $stmtInsertChiTiet->bindParam(':maSanPham', $maSanPham);
        $stmtInsertChiTiet->bindParam(':soLuong', $soLuong);
        $stmtInsertChiTiet->bindParam(':giaBan', $giaBan);
        $stmtInsertChiTiet->execute();

        // Cập nhật số lượng sản phẩm trong bảng sanpham
        $sqlUpdateSoLuong = "UPDATE sanpham SET SoLuong = SoLuong - :soLuong WHERE MaSanPham = :maSanPham";
        $stmtUpdateSoLuong = $db->prepare($sqlUpdateSoLuong);
        $stmtUpdateSoLuong->bindParam(':soLuong', $soLuong);
        $stmtUpdateSoLuong->bindParam(':maSanPham', $maSanPham);
        $stmtUpdateSoLuong->execute();
    }

    // Commit giao dịch
    $db->commit();

} catch (PDOException $e) {
    // Rollback giao dịch nếu có lỗi
    $db->rollBack();
    echo 'Kết nối CSDL thất bại: ' . $e->getMessage();
    die();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- icon boostrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
      .bg-custom{
        background-color: #987263 !important;
      }
      .btn-danger{
        background-color: #987263;
        border: #987263;
      }
      body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
      .row{
        width: 100%;
        height: 100%;
      }
      .payment-success {
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .continue-shopping-btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            text-decoration: none;
            color: #fff;
            background-color: #987263;
            border-radius: 5px;
            transition: background-color 0.3s;
            margin-right: 10px;
        }

        .continue-shopping-btn:hover {
            background-color: #2980b9;
        }

        .order-info {
            margin-top: 20px;
            font-size: 18px;
        }

        .order-info p {
            margin: 5px 0;
        }

    </style>
</head>
<body>
    

    <div class="payment-success">
        <h1>Thanh toán thành công!</h1>
        <p>Cảm ơn bạn đã mua hàng</p>
        
        <div class="order-info">
            <p>Mã đơn hàng: <?php echo $maDonHangInserted; ?></p>
            <p>Tổng tiền: <?php echo $sum; ?></p>
            <p>Tên khách hàng: <?php echo htmlspecialchars($customerInfo['HoTen']); ?></p>
            <p>Số điện thoại: <?php echo htmlspecialchars($customerInfo['SDT']); ?></p>
            <p>Địa chỉ: <?php echo htmlspecialchars($customerInfo['DiaChi']); ?></p>
        </div>

        <a href="../index.php" class="continue-shopping-btn">Tiếp tục mua sắm</a>
        <a href="?mod=order&act=list" class="continue-shopping-btn">Xem đơn hàng</a>
    </div>


    