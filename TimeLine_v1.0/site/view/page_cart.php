<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <link rel="stylesheet" href="../content/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<style>
    .cart-payment{
        width: 100%;
    }
    .bg-custom{
        background-color: #987263 !important;
      }
      .btn-danger{
        background-color: #987263;
        border: #987263;
      }
      .row{
        width: 100%;
        height: 100%;
      }
</style>
<body>
    <nav class="navbar">
        <ul>
            <li><a href="#">Địa chỉ liên hệ</a></li>
            <li><a href="#">Hotline trực tuyến</a></li>
            <li><a href="#">Shopee</a></li>
            <li><a href="#">Tiktok</a></li>
            <li><a href="#">Lazada</a></li>
            <li><a href="#">Instagram</a></li>
            <li><a href="?mod=page&act=user">Đăng Ký</a></li>
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
        <table id="cart" class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th style="width:20%">Tên sản phẩm</th>
                    <th style="width:20%">Hình ảnh</th>
                    <th style="width:10%">Kích thước</th>
                    <th style="width:10%">Màu sắc</th>
                    <th style="width:10%">Giá</th>
                    <th style="width:8%">Số lượng</th>
                    <th style="width:12%">Thành tiền</th>
                    <th style="width:10%"> Xóa </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['cart'] as $item): ?>
                    <tr>
                        <td data-th="Tên sản phẩm"><?= $item['TenSanPham'] ?></td>
                        <td data-th="Sản phẩm">
                            <img src="../content/img/<?= $item['HinhAnh'] ?>" alt="Sản phẩm 1" class="img-responsive"
                                width="100">
                        </td>
                        <td data-th="Kích thước">Size L</td>
                        <td data-th="Màu sắc">Màu xanh</td>
                        <td data-th="Giá"><?= $item['GiaKhuyenMai'] ?> đ</td>
                        <td data-th="Số lượng">
                            <div class="amount-product-buy d-flex justify-content-center">
                                <a href="?mod=cart&act=decrease&id=<?= $item['MaSanPham'] ?>"
                                    class="minus-product bg-dark bg-opacity-25  px-2">
                                    <i class="bi bi-dash fw-bolder text-dark fs-5"></i>
                                </a>
                                <div class="amount-product fs-5  px-2 border border-1"><?= $item['SL'] ?></div>
                                <a href="?mod=cart&act=increase&id=<?= $item['MaSanPham'] ?>"
                                    class="add-plus bg-dark bg-opacity-25 px-2">
                                    <i class="bi bi-plus-lg fw-bolder text-dark fs-5"></i>
                                </a>
                            </div>
                        </td>
                        <td data-th="Thành tiền">
                            <?php
                            // Tính toán thành tiền cho sản phẩm
                            $thanh_tien = $item['GiaKhuyenMai'] * $item['SL'];
                            // Hiển thị thành tiền
                            echo $thanh_tien; ?> đ
                        </td>
                        <td class="actions" data-th="">
                            <a href="?mod=cart&act=delete&id=<?= $item['MaSanPham'] ?>" class="btn btn-danger btn-sm"><i
                                    class="bi bi-trash3-fill"></i>
                            </a>
                        </td>
                    </tr>

                <?php endforeach; ?>
            </tbody>

        </table>
        <div class="cart-payment mt-5 sticky-bottom z-1 bg-white">
            <div class="row border border-1 py-4 align-items-center mt-3 shadow-lg">
                <div class="col-sm-6">
                    <div class="cart-payment-left d-flex hstack gap-3">
                        <a href="?mod=page&act=home" class="btn btn-warning"><i class="fa fa-angle-left"></i>
                            Tiếp tục mua hàng</a>

                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="cart-payment-right  d-flex align-items-center justify-content-between hstack gap-3">
                        <h6 class="mb-0 text-truncate">Tổng thanh toán: </h6>
                        <strong></strong>
                        <a href="?mod=order&act=checkout" class="btn btn-success btn-block">Thanh toán
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>