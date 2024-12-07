<?php
include_once '../model_DAO/product.php';
include_once '../model_DAO/feedback.php';
extract($_REQUEST);
if(isset($act)){
    switch($act){
        case 'detail':
            $product_detail=product_one($id);
            $feedback_list=feedback_list_id($id);
            if(isset($feedback_submit)){
                feedback_add($_SESSION['user']['MaKhachHang'],$feedback,$id);
                header('location: ?mod=product&act= detail&id='.$id);
            }
            
            include_once 'view/page_product_detail.php';
            include_once 'view/page_feedback.php';
            include_once 'view/template_footer.php';
            break;

        case 'edit':
            $id = $_GET['id'];
            $feedbacks = feedback_get($id);
            include_once 'view/template_header.php';
            include_once 'view/page_feedback_edit.php';
            include_once 'view/template_footer.php';
            break;

        case 'save':
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $MaBinhLuan = $_POST['MaBinhLuan'];
                $NoiDung = $_POST['NoiDung'];
                feedback_update($MaBinhLuan, $NoiDung);
                header('location: ?mod=product&act=detail&id='.$id);
            }
            break;
    }
}

?>