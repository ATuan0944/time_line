<div class="p-5 vh-100">
    <h3 class="text-center">Quản lý người dùng</h3>
    <div >
        <!-- <a class="btn btn-primary" href="?mod=category&act=add">Thêm danh mục</a> -->
    </div>
    
    <table class="table table-hover ">
        
        <tr>
            <th>Mã Khách Hàng</th>
            <th>Họ tên</th>
            <th>Email</th>
            <th>Hành động</th>
        </tr>
        
            <?php foreach($dsuser as $user) :?>

            
            <tr>
                <td><?=$user['MaKhachHang']?></td>
                <td><?=$user['HoTen']?></td>
                
                <td><?=$user['Email']?></td>
                <td>
                    <a class="btn btn-primary" href="?mod=user&act=edit&id=<?=$user['MaKhachHang']?>">Sửa</a>
                    <a class="btn btn-danger" href="?mod=user&act=delete&id=<?=$user['MaKhachHang']?>">Xóa</a>
            </tr>
            <?php endforeach;   ?>
        
    </table>
</div>