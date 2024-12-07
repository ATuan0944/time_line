<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <link rel="stylesheet" href="../content/css/style-contact.css">
    <link rel="stylesheet" href="../content/css/style.css">
    <link rel="stylesheet" href="../content/css/style-sp.css">
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
            <a href="#">
                <img src="../content/img/giohang.png" alt="Giỏ hàng">
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
    <main>
        <div class="row-col1">

            <div class="aslide">
                <ul>

                    <div class="aslide">
                        <div class="dmsp">
                            <h4>Danh mục sản phẩm</h4>
                        </div>
                        <li><a href="">Tai Nghe</a></li>
                        <li><a href="">Bàn Phím</a></li>
                        <li><a href="">Chuột</a></li>
                    </div>

                </ul>
            </div>
        </div>

        </div>
        <div class="menu22">
            <?php $dem = 0; ?>
            <div class="menu-sp">

                <?php foreach ($sp_dm as $sp): ?>

                    <div class="menu1">
                        <div class="img">
                            <img src="../content/img/<?= $sp['HinhAnh'] ?>" alt="">
                        </div>
                        <div class="ten">
                            <p><?= $sp['TenSanPham'] ?></p>
                        </div>
                        <div class="gia">
                            <span><?= $sp['Gia'] ?></span>
                        </div>
                        <div class="shop">
                            <a href="?mod=cart&act=add&id=<?= $sp['MaSanPham'] ?>"><button>THÊM GIỎ HÀNG</button></a>
                        </div>

                    </div>
                    <?php $dem++; ?>
                    <?php if ($dem == 8)
                        break; ?>
                <?php endforeach; ?>
                <?php foreach ($sp_dm as $sp): ?>

                    <div class="menu1">
                        <div class="img">
                            <img src="../content/img/<?= $sp['HinhAnh'] ?>" alt="">
                        </div>
                        <div class="ten">
                            <p><?= $sp['TenSanPham'] ?></p>
                        </div>
                        <div class="gia">
                            <span><?= $sp['Gia'] ?></span>
                        </div>
                        <div class="shop">
                            <a href="?mod=cart&act=add&id=<?= $sp['MaSanPham'] ?>"><button>THÊM GIỎ HÀNG</button></a>
                        </div>

                    </div>
                    <?php $dem++; ?>
                    <?php if ($dem == 8)
                        break; ?>
                <?php endforeach; ?>
            </div>
        </div>

    </main>