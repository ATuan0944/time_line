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
</head>
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
    text-align: center;
    margin: 0 auto;

  }

  .text-center {
    color: #009966;
  }

  .btn {
    background-color: #009966;
  }
</style>

<body>
  <div class="container vh-100 ">
    <h2 class="text-center">ĐĂNG KÝ</h2>
    <form method="post" action="" enctype="multipart/form-data" class="form p-3">
      <div class="login-form">
        <div class="form-login ">
          <div class="form-login__group-action">
            <label class="form-login__email-text"></label>
            <input name="name" type="text" class="form-login__email" placeholder="Họ Tên" required />
          </div>
          <div class="form-login__group-action">
            <label class="form-login__email-text"></label>
            <input name="email" type="email" class="form-login__email" placeholder="Email" required />
          </div>
          <div class="form-login__group-action">
            <label class="form-login__email-text"></label>
            <input name="pass" type="password" class="form-login__email" placeholder="Mật Khẩu" required />
          </div>
          <div class="form-login__group-action">
            <label class="form-login__email-text"></label>
            <input name="repass" type="password" class="form-login__email" placeholder="Nhập Lại Mật Khẩu" required />
          </div>
          <div class="form-login__group-action">
            <label class="form-login__email-text"></label>
            <input name="address" type="text" class="form-login__email" placeholder="Địa Chỉ" />
          </div>
          <div class="form-login__group-action">
            <label class="form-login__email-text"></label>
            <input name="phone" type="text" class="form-login__email" placeholder="Số Điện Thoại" />
          </div>
          <div class="form-login__group-action">
            <label class="form-login__email-text"></label>
            <input name="image" type="file" class="form-login__email" />
          </div>
          <?php if (isset($data)): ?>
            <div class="alert alert-warning" role="alert">
              <?= $data; ?>
            </div>
          <?php endif;
          unset($data); ?>
          <div class="text-center fs-1">
            <input name="register_submit" type="submit" class="btn btn-danger btn-lg" value="Đăng ký">
          </div>
          <div class="mt-3">
            <p class="mb-0  text-center">Bạn đã có tài khoản? <a href="?mod=user&act=login"
                class="text-primary fw-bold">Đăng Nhập</a></p>
          </div>
        </div>
      </div>
  </div>
  </div>

  </div>