<?php
include_once '../model_DAO/product.php';
 extract($_REQUEST);
 if(isset($act)){
    switch($act){
        case"add":
            $sp=product_one($id);
            if(!isset($SoLuong)){
                $SoLuong=1;
            }
            if(isset($_SESSION['cart'][$id])){
                $_SESSION['cart'][$id]['SL']+=$SoLuong;
            }else{
                $_SESSION['cart'][$id]=array(
                    'MaSanPham'=>$sp['MaSanPham'],
                    'TenSanPham'=>$sp['TenSanPham'],
                    'HinhAnh'=>$sp['HinhAnh'],
                    'Gia'=>$sp['Gia'],
                    'GiaKhuyenMai'=>$sp['GiaKhuyenMai'],
                    'SL'=>$SoLuong
                );
            }

            $data=product_one($id);
            if(!isset($SoLuong)){
                $SoLuong=0;
            }
            if(isset($_SESSION['cart'][$id])){
                $_SESSION['cart'][$id]['SL']+=$SoLuong;
            }else{
                $_SESSION['cart'][$id]=array(
                    'MaSanPham'=>$data['MaSanPham'],
                    'TenSanPham'=>$data['TenSanPham'],
                    'HinhAnh'=>$data['HinhAnh'],
                    'Gia'=>$data['Gia'],
                    'GiaKhuyenMai'=>$data['GiaKhuyenMai'],
                    'SL'=>$SoLuong
                );
            }
            
            
            
            include_once 'view/page_cart.php';
            include_once 'view/template_footer.php';
            break;
        case 'delete':
            unset($_SESSION['cart'] [$id]);
            header('location: ?mod=cart&act=list');
            break;
        case 'list':
            
            include_once 'view/page_cart.php';
            include_once 'view/template_footer.php';
            break;
        case 'increase':
            $_SESSION['cart'][$id]['SL']+=1;
            header('location: ?mod=cart&act=list');
            break;
        case 'decrease':
            if( $_SESSION['cart'][$id]['SL']>1){
                $_SESSION['cart'][$id]['SL']-=1;
            }else{
                unset($_SESSION['cart'] [$id]);
            }
            header('location: ?mod=cart&act=list');
            break;
    }
}
 


?>