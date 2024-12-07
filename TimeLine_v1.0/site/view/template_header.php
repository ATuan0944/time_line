<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Home</title>
    <link rel="stylesheet" href="../content/css/style-contact.css">
    <link rel="stylesheet" href="../content/css/style.css">
    <link rel="stylesheet" href="../content/css/style-sp.css">
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
                <li><a href="?mod=contact&act=contact">Liên hệ</a></li>
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