<?php
include_once '../model_DAO/user.php';
extract($_REQUEST);
if (isset($act)) {
    switch ($act) {
        case 'login':
            if (isset($login_submit)) {
                $data = check_login($email, $pass);
                if ($data) {
                    // print_r($data);
                    $_SESSION['user'] = $data;
                    header('location: ?mod=page&act=home');
                } else {
                    $data = "Đăng nhập thất bại";
                }
            }

            include_once 'view/page_login.php';
            include_once 'view/template_footer.php';
            break;
        case 'info':
            $id = $_SESSION['user']['MaKhachHang'];
            $user = user_one($id);

            include_once 'view/page_info.php';
            include_once 'view/template_footer.php';
            break;
        case 'logout':
            unset($_SESSION['user']);
            header('location: ?mod=page&act=home');
            break;
        case 'register':
            if (isset($register_submit)) {
                if ($pass != $repass) {
                    $data = "Nhập mật khẩu không khớp";
                } else {
                    user_register($name, $email, $pass, $address, $phone, $_FILES['image']['name']);
                    move_uploaded_file($_FILES['image']['tmp_name'], '../content/img/' . $_FILES['image']['name']);
                    header('location: ?mod=user&act=login');

                }
            }

            include_once 'view/page_register.php';
           
            break;
        case 'edit':
            $user = user_one($id);
            if (isset($edit_submit)) {
                if ($_FILES['image']['name'] != null) {
                    user_edit($id, $name, $email, $address, $phone, $_FILES['image']['name']);
                    move_uploaded_file($_FILES['image']['tmp_name'], '../content/img/' . $_FILES['image']['name']);
                } else {
                    user_edit($id, $name, $email, $address, $phone, $user['Anh']);
                }
                $_SESSION['user'] = user_one($id);
                header('location: ?mod=user&act=info');
            }
            include_once 'view/template_header.php';
            include_once 'view/page_user_update.php';
            include_once 'view/template_footer.php';
            break;
    }
}

?>