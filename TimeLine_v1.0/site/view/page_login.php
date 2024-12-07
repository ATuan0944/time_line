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
    .form-login__group-action {
      position: relative;
    }

    .form-login__email-text {
      position: absolute;
      top: 0px;

      left: 12px;
      font-size: 13px;
      color: #2d7b2d;
      transition: transform 0.5s;

    }

    .form-login__email {
      width: 80%;

    }

    .form-login__group-action input:focus~.form-login__email-text {
      transform: translateY(-20px);
    }

    form {
      margin-top: 20px;
    }

    form label {
      display: block;
      margin: 10px 0 5px;
    }

    form input {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      outline: none;
      border-color: transparent transparent #00b300 transparent;
      border: bottom style 2px;
    }

    .login-form {
      background-color: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
      width: 600px;
      height: 400px;
      text-align: center;
      margin-top: 50px;

    }

    h3 {
      color: #009966;
    }

    .btn {
      background-color: #009966;
    }

    .button {
      width: 100%;
    }

    .button button {
      width: 70%;
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
          <a class="text-decoration-none text-white" href="?mod=user&act=info">
            <img class="rounded rounded-5" src="../content/img/<?= $_SESSION['user']['Anh'] ?>" height=30px width=25px
              alt=""></a>
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
  <div id="account"
    class="d-flex justify-content-center align-items-center rounded-circle bg-black bg-opacity-10  mx-2 px-2 py-1">
    <?php if (isset($_SESSION['user'])): ?>
      <a class="text-decoration-none text-white" href="?mod=user&act=info">
        <img class="rounded rounded-5" src="../content/img/<?= $_SESSION['user']['Anh'] ?>" height=30px width=25px
          alt=""></a>
    <?php else: ?>
      <a class="text-decoration-none text-white" href="?mod=user&act=login">
        <i class="bi bi-person-circle fw-bolder fs-5 text-secondary"></i></a>
    <?php endif; ?>
  </div>
  <div class=" d-flex justify-content-center align-items-center">
    <div class="login-form ">
      <h3 class="text-center mb-4">ĐĂNG NHẬP</h3>
      <form method="post" action="" class="form-login">
        <div class="form-login__group-action">
          <label for="exampleInputEmail1" class="form-login__email-text"></label>
          <input type="email" class="form-login__email" name="email" placeholder="Địa chỉ email"
            aria-describedby="emailHelp">
        </div>
        <div class="form-login__group-action">
          <label for="exampleInputPassword1" class="form-login__email-text"></label>
          <input type="password" class="form-login__email" placeholder="Mật khẩu" name="pass">
        </div>
        <p class="small"><a class="text-primary" href="forget-password.html">Quên mật khẩu?</a></p>
        <div class="button">
          <button class="btn btn-danger" type="submit" name="login_submit">Đăng nhập</button>
        </div>
      </form>
      <div class="mt-3">
        <p class="mb-0  text-center">Chưa có tài khoản? <a href="?mod=user&act=register"
            class="text-primary fw-bold">Đăng ký</a></p>
      </div>
      <?php if (isset($data)): ?>
        <div class="alert alert-warning" role="alert">
          <?= $data; ?>
        </div>
      <?php endif;
      unset($data); ?>
    </div>

  </div>