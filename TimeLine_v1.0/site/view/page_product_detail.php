<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../content/css/style.css">
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
            <li><a href="#">Địa chỉ liên hệ</a></li>
            <li><a href="#">Hotline trực tuyến</a></li>
            <li><a href="#">Shopee</a></li>
            <li><a href="#">Tiktok</a></li>
            <li><a href="#">Lazada</a></li>
        </ul>
    </nav>
    <div class="container">
        <div class="row ">

            <div class="col-md-6 text-center">
                <img class="img-fluid" src="../content/img/<?= $product_detail['HinhAnh'] ?>" alt="">
            </div>
            <div class="col-md-6">
                <h1><?= $product_detail['TenSanPham'] ?></h1>
                <p>Hàng chính hãng</p>
                <p>Giá khuyến mãi: <?= $product_detail['GiaKhuyenMai'] ?> đ</p>
                <p>Giá gốc: <?= $product_detail['Gia'] ?> đ </p>
                <p>Size: </p>
                <div class="d-flex flex-row mb-3">
                    <input type="radio" class="btn-check" name="options" id="option1" autocomplete="off" checked>
                    <label class="btn btn-outline-secondary me-2" for="option1">S</label>

                    <input type="radio" class="btn-check" name="options" id="option2" autocomplete="off">
                    <label class="btn btn-outline-secondary me-2" for="option2">M</label>

                    <input type="radio" class="btn-check" name="options" id="option3" autocomplete="off">
                    <label class="btn btn-outline-secondary me-2" for="option3">L</label>

                    <input type="radio" class="btn-check" name="options" id="option4" autocomplete="off">
                    <label class="btn btn-outline-secondary me-2" for="option4">XL</label>
                </div>
                <p>Màu:</p>
                <div class="d-flex flex-row mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1"
                            checked>
                        <label class="me-2">Màu xanh</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
                            checked>
                        <label class="me-2">Màu đỏ</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3">
                        <label class="me-2">Màu vàng</label>

                    </div>
                </div>
                <form method="post" action="?mod=cart&act=add&id=<?= $id ?>">
                    <p>Số lượng: <input type="number" value=1 min="1" width="10px" name="SoLuong"> </p>
                    <input type=submit class="btn btn-danger" name="product_add" value="Mua ngay">
                </form>
            </div>

        </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10 text-center">
                <br><br>
                <h2>Chi tiết sản phẩm</h2>
                <!-- <img src="../content/img/size.png" width="100%"> -->
                <?= $product_detail['MoTa'] ?>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>