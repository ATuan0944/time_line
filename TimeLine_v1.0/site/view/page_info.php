<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../content/css/style-contact.css">
    <link rel="stylesheet" href="../content/css/style.css">
    <link rel="stylesheet" href="../content/css/style-sp.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- icon boostrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
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

        .btn-primary {
            background-color: #987263;
            border: #987263;
        }

        .btn-primary:hover {
            background-color: #e0e0e0;
            color: black;

        }

        .btn-success {
            background-color: #987263;
            border: #987263;
        }

        .text-center {}

        .text-center img {
            width: 200px;
            height: 200px;
            /* Đảm bảo ảnh là hình vuông */
            object-fit: cover;
            /* Đảm bảo nội dung ảnh vừa khít */
            border-radius: 100%;
            /* Biến ảnh thành hình tròn */
            border: 2px solid #ccc;
            /* Thêm viền nếu cần */
        }

        .product {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
            /* Make sure all product containers have the same height */
        }

        /* Định dạng cho hàng chứa avatar và thông tin */
        .info-row {
            display: flex;
            align-items: center;
            /* Căn giữa theo chiều dọc */
            justify-content: flex-start;
            /* Avatar nằm bên trái, thông tin nằm bên phải */
            gap: 20px;
            /* Khoảng cách giữa avatar và thông tin */
        }

        .info-avatar img {
            width: 200px;
            height: 200px;
            object-fit: cover;
            /* Đảm bảo ảnh không bị méo */
            border-radius: 50%;
            /* Làm tròn avatar */
            border: 2px solid #ccc;
            /* Viền xung quanh ảnh */
        }

        .info-details p {
            margin: 5px 0;
            /* Giảm khoảng cách giữa các dòng thông tin */
        }

        /* Định dạng cho hàng chứa các nút */
        .button-row {
            display: flex;
            flex-wrap: wrap;
            /* Để xuống dòng khi màn hình nhỏ */
            gap: 10px;
            /* Khoảng cách giữa các nút */
            justify-content: flex-start;
            /* Canh trái cho các nút */
            align-items: center;
            /* Căn giữa theo chiều dọc */
        }

        .button-row a {
            flex: 1;
            /* Đảm bảo các nút có cùng chiều rộng */
            text-align: center;
            /* Căn giữa văn bản trong nút */
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <ul>
            <li><a href="#">Địa chỉ liên hệ</a></li>
            <li><a href="#">Hotline trực tuyến</a></li>
            <li><a href="#">Shopee</a></li>
            <li><a href="#">Tiktok</a></li>
            <li><a href="#">Lazada</a></li>
            <li><a href="#">Instagram</a></li>
            <li>

                <?php if (isset($_SESSION['user'])): ?>
                    <a class="text-decoration-none text-white"  href="?mod=user&act=info">
                        <img class="rounded rounded-5" src="../content/img/<?= $_SESSION['user']['Anh'] ?>" height=30px
                            width=33px border-radius="15px" alt=""></a>
                <?php else: ?>
                    <a href="?mod=user&act=login">Đăng Ký</a>
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
            <li><a href="#">Địa chỉ liên hệ</a></li>
            <li><a href="#">Hotline trực tuyến</a></li>
            <li><a href="#">Shopee</a></li>
            <li><a href="#">Tiktok</a></li>
            <li><a href="#">Lazada</a></li>
        </ul>
    </nav>
    <div class="container my-3">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center">THÔNG TIN KHÁCH HÀNG</h4>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md-6 text-center">
                <img width="200px" src="../content/img<?= $user['Anh'] ?>" alt="">
            </div>
            <div class="col-md-6">
                <p><b>Họ tên: </b><?= $user['HoTen'] ?></p>
                <p><b>Email: </b><?= $user['Email'] ?></p>
                <p><b>Số điện thoại: </b><?= $user['SDT'] ?></p>
                <p><b>Địa chỉ: </b><?= $user['DiaChi'] ?></p>
                <div class="row">
                    <div class="col-md-4">
                        <a href="?mod=user&act=edit&id=<?= $user['MaKhachHang'] ?>" class="btn btn-primary">Sửa thông
                            tin</a>
                    </div>
                    <?php if ($user['Admin'] == 1): ?>
                        <div class="col-md-4">
                            <a href="../admin/?mod=category&act=list" class="btn btn-success">Trang Admin</a>
                        </div>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['user'])): ?>
                        <div class="col-md-4">
                            <a class="btn btn-success" href="?mod=order&act=list">Đơn hàng của tôi</a>
                        </div>
                    <?php endif; ?>

                    <div class="col-md-4">
                        <a href="?mod=user&act=logout" class="btn btn-danger">Đăng xuất</a>

                    </div>
                </div>
            </div>
        </div>
    </div>