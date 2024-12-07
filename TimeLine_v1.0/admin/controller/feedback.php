<?php
include_once '../model_DAO/feedback.php';
extract($_REQUEST);

if(isset($act)){
    switch($act){
        case 'list':
            $feedback = feedback_list();
            include_once 'view/template_header.php';
            include_once 'view/page_feedback_list.php';
            include_once 'view/template_footer.php';
            break;
    
        case 'delete':
            $id = $_GET['id'];
            feedback_delete($id);
            header('location: ?mod=feedback&act=list');
            break;
        
        case 'edit':
            $id = $_GET['id'];
            $feedbacks = feedback_get($id);
            include_once 'view/template_header.php';
            include_once 'view/page_feedback_edit.php';
            include_once 'view/template_footer.php';
            break;
        
        default:
            echo "Chức năng không tồn tại.";
    }
}

?>