<?php
include_once '../model_DAO/user.php';
extract($_REQUEST);

if (isset($act)) {
    switch ($act) {

        case 'list':
            $dsuser = user_list();
            include_once 'view/template_header.php';
            include_once 'view/page_user_list.php';
            include_once 'view/template_footer.php';
            break;

        case 'logout':
            unset($_SESSION['user']);
            header('location: ../site/index.php?mod=page&act=home');
            break;

        case 'delete':
            $id = $_GET['id']; // Lấy giá trị 'id' từ query string của URL
            if ($id == 1) {
                echo "Không thể xóa admin chính!";
                exit; // Dừng thực thi mã PHP
            }
            user_delete($id); // Gọi hàm xóa user với ID tương ứng
            header('Location: ?mod=user&act=list'); // Chuyển hướng về trang danh sách user
        
        }
        
    }
?>