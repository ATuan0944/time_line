<?php
extract($_REQUEST);

if (isset($act)) {
    switch ($act) {
        case 'form':
            include_once 'view/template_header.php'; 
            include_once 'view/contact.php';        
            include_once 'view/template_footer.php'; 
            break;
        default:
            header('location: ?mod=contact&act=form'); 
            break;
    }
} else {
    header('location: ?mod=contact&act=form'); 
}
?>
