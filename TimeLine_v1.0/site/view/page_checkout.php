<?php
//  
ob_start();

try {
    $db = new PDO('mysql:host=localhost;dbname=webnoithat;charset=utf8', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Kết nối CSDL thất bại: ' . $e->getMessage();
}

function insertCustomer($db, $hoTen, $sdt, $diaChi)
{
    $stmt = $db->prepare("INSERT INTO khachhang (HoTen, SDT, DiaChi) VALUES (:hoTen, :sdt, :diaChi)");
    $stmt->bindParam(':hoTen', $hoTen);
    $stmt->bindParam(':sdt', $sdt);
    $stmt->bindParam(':diaChi', $diaChi);
    $stmt->execute();
    return $db->lastInsertId();
}


function insertOrder($db, $maKhachHang, $tongTien, $phuongThucGiaoHang, $phuongThucThanhToan)
{
    $stmt = $db->prepare("INSERT INTO donhang (MaKhachHang, TongTien, PhuongThucGiaoHang, PhuongThucThanhToan) VALUES (:maKhachHang, :tongTien, :phuongThucGiaoHang, :phuongThucThanhToan)");
    $stmt->bindParam(':maKhachHang', $maKhachHang);
    $stmt->bindParam(':tongTien', $tongTien);
    $stmt->bindParam(':phuongThucGiaoHang', $phuongThucGiaoHang);
    $stmt->bindParam(':phuongThucThanhToan', $phuongThucThanhToan);
    $stmt->execute();
    return $db->lastInsertId();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['hoTen']) && isset($_POST['sdt']) && isset($_POST['diaChi']) && isset($_POST['shipping-method']) && isset($_POST['payment-method'])) {
        $hoTen = $_POST['hoTen'];
        $sdt = $_POST['sdt'];
        $diaChi = $_POST['diaChi'];
        $shippingMethod = $_POST['shipping-method'];
        $paymentMethod = $_POST['payment-method'];

        $maKhachHang = insertCustomer($db, $hoTen, $sdt, $diaChi);

        $sum = 0;
        foreach ($_SESSION['cart'] as $item) {
            $sum += $item['GiaKhuyenMai'] * $item['sl'];
        }
        $shippingCost = ($shippingMethod === 'ghn') ? 40000 : (($shippingMethod === 'hoa-toc') ? 50000 : 30000);
        $tongTien = $sum + $shippingCost;

        $maDonHang = insertOrder($db, $maKhachHang, $tongTien, $shippingMethod, $paymentMethod);


        $_SESSION['maDonHang'] = $maDonHang;


        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- icon boostrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../content/css/style-contact.css">
    <link rel="stylesheet" href="../content/css/style.css">
    <link rel="stylesheet" href="../content/css/style-sp.css">
    <style>
        .bg-custom {
            background-color: #987263 !important;
        }

        .btn-danger {
            background-color: #987263;
            border: #987263;
        }

        .row {
            width: 100%;
            height: 100%;
        }

        /* .category-header {
    height: 60px; /* Adjust based on your needs */


        .product {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
            /* Make sure all product containers have the same height */
        }

        .checkout-section {
            padding: 40px 0;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        #payment-image {
            width: 300px;
            height: 300px;
        }

        .diachi {
            background-color: #f5f5f5;
            padding: 15px;
            border: 1px solid #ddd;
            margin-bottom: 20px;
        }

        .diachi p {
            margin: 0;
        }

        h3 {
            color: #cea679;

        }

        h3:hover {
            color: #987263;
        }

        .m a {
            color: #ffffff;
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <ul>
            <li><a href="#">Địa chỉ liên hệ</a></li>
            <li><a href="#">Hotline trực tuyến</a></li>
            <li><a href="https://shopee.vn/">Shopee</a></li>
            <li><a href="https://www.tiktok.com/">Tiktok</a></li>
            <li><a href="#">Lazada</a></li>
            <li><a href="#">Instagram</a></li>
            <li>

                <?php if (isset($_SESSION['user'])): ?>
                    <a class="text-decoration-none text-white " href="?mod=user&act=info">
                        <img class="rounded rounded-5" src="../content/img/<?= $_SESSION['user']['Anh'] ?>" height=30px
                            width=33px border-radius="15px" alt=""></a>
                <?php else: ?>
                    <a href="?mod=user&act=login">Đăng Nhập</a>
                </li>
            <?php endif; ?>
        </ul>

    </nav>


    <header class="nav1">
        <div class="logo">
            <img src="../content/img/TimeLine.png" alt="Logo">
            <span>TIMELINE</span>
        </div>
        <nav class="menu">
            <ul>
                <li><a href="?mod=page&act=home">Trang Chủ</a></li>
                <li><a href="?mod=page&act=category&id=1">Sản Phẩm</a></li>
                <li><a href="?mod=page&act=contact">Liên hệ</a></li>
                <li><a href="?mod=page&act=home">Thông tin</a></li>
            </ul>
        </nav>
        <div class="search-bar">
            <input type="text" placeholder="Bạn cần tìm gì?">
        </div>
        <div class="cart">
            <a href="?mod=cart&act=list">
                <img src="../content/img/giohang.png" alt="Giỏ hàng">
                <?php if (isset($_SESSION['cart'])): ?>
                    <?= count($_SESSION['cart']) ?>
                <?php else: ?>
                    0
                <?php endif; ?>
                </span>
                <span>Giỏ hàng</span>
            </a>
        </div>
    </header>
    <nav class="navbar">
        <ul>
            <li><a href="#">Đăng Nhập</a></li>
            <li><a href="#">Xem Sản Phẩm </a></li>
            <li><a href="#">Shopee</a></li>
            <li><a href="#">Tiktok</a></li>
            <li><a href="#">Lazada</a></li>
        </ul>
    </nav>
    <div class="checkout-section">
        <div class="container">
            <div class="m">
                <a href="?mod=user&act=login">
                    <h3> Đăng nhập nếu bạn đã có tài khoản!</h3>
                </a>
                <p></p>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <form id="checkout-form" class="checkout-form" method="POST" action="">
                        <div class="row row-40">
                            <div class="col-12 mb-60">
                                <h4 class="checkout-title">Thông tin khách hàng</h4>
                                <div class="form-group">
                                    <label for="hoTen">Họ Tên:</label>
                                    <input type="text" id="hoTen" name="hoTen" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="sdt">SĐT:</label>
                                    <input type="text" id="sdt" name="sdt" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="diaChi">Địa Chỉ:</label>
                                    <input type="text" id="diaChi" name="diaChi" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-12 mb-30">
                                <div class="form-group">
                                    <label for="shipping-method">Chọn Phương Thức Giao Hàng:</label>
                                    <select class="form-control" id="shipping-method" name="shipping-method"
                                        onchange="changeShippingCost()">
                                        <option value="ghtk">GHTK (Giao Hàng Tiết Kiệm)</option>
                                        <option value="ghn">GHN (Giao Hàng Nhanh)</option>
                                        <option value="hoa-toc">Hỏa Tốc</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 mb-30">
                                <div class="form-group">
                                    <label for="payment-method">Chọn Phương Thức Thanh Toán:</label>
                                    <select class="form-control" id="payment-method" name="payment-method">
                                        <option value="cash">Thanh toán tiền mặt khi nhận hàng</option>
                                        <!-- <option value="wallet">Thanh toán qua ví điện tử</option>
                                        <option value="bank">Thanh toán qua ngân hàng</option> -->
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 mb-30">
                                <a href="?mod=order&act=confirm" id="place-order" class="btn btn-lg btn-round"
                                    style="background-color: #cea679; color: black;">Đặt hàng</a>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <div class="col-12 mb-30">
                        <h4 class="checkout-title">Tổng Giỏ Hàng</h4>
                        <!-- <div class="diachi">
                            <h4>Thông tin:</h4>
                            <p id="customerName"></p>
                            <p id="customerPhone"></p>
                            <p id="customerAddress"></p>
                        </div> -->
                        <div class="checkout-cart-total">
                            <h4>Sản Phẩm <span>Tổng</span></h4>
                            <ul>
                                <?php
                                $sum = 0;
                                foreach ($_SESSION['cart'] as $item):
                                    $productTotal = $item['GiaKhuyenMai'] * $item['SL'];
                                    $sum += $productTotal;
                                    ?>
                                    <li><?= $item['TenSanPham'] ?> X <?= $item['SL'] ?>
                                        <span><?= number_format($productTotal, 0, ",", ".") ?> VND</span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <p>Tổng Cộng <span><?= number_format($sum, 0, ",", ".") ?> VND</span></p>
                            <p>Phí Giao Hàng: <span id="shipping-cost">30,000 VND</span></p>
                            <h4>Tổng Thanh Toán <span id="total-payment"><?= number_format($sum + 30000, 0, ",", ".") ?>
                                    VND</span></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function changeShippingCost() {
            var shippingMethod = document.getElementById("shipping-method").value;
            var shippingCost = 30000;
            if (shippingMethod === "ghn") {
                shippingCost = 40000;
            } else if (shippingMethod === "hoa-toc") {
                shippingCost = 50000;
            }
            document.getElementById("shipping-cost").innerText = shippingCost.toLocaleString() + " VND";
            var sum = <?= $sum ?>;
            var totalPayment = sum + shippingCost;
            document.getElementById("total-payment").innerText = totalPayment.toLocaleString() + ' VND';
        }

        document.addEventListener("DOMContentLoaded", function () {
            changeShippingCost();
            document.getElementById("shipping-method").addEventListener("change", changeShippingCost);

            document.getElementById("place-order").addEventListener("click", function () {
                var form = document.getElementById("checkout-form");
                var formData = new FormData(form);

                fetch("", {
                    method: "POST",
                    body: formData
                })
                    .then(response => response.json())
                    .then(data => {
                        console.log("Server response:", data); // Thêm dòng này để kiểm tra response từ server
                        if (data.status === "success") {
                            document.getElementById("order-id").innerText = data.maDonHang;
                            $('#checkoutModal').modal('show');
                        } else {
                            alert("Có lỗi xảy ra: " + data.message);
                        }
                    })
                    .catch(error => console.error("Error:", error));
            });
        });
    </script>
</body>

</html>

<style>
    .checkout-section {
        padding: 40px 0;
    }

    img {
        max-width: 100%;
        height: auto;
    }

    #payment-image {
        width: 300px;
        height: 300px;
    }

    .diachi {
        background-color: #f5f5f5;
        padding: 15px;
        border: 1px solid #ddd;
        margin-bottom: 20px;
    }

    .diachi p {
        margin: 0;
    }

    h3 {
        color: #cea679;
    }
</style>