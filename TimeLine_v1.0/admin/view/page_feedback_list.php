<div class="p-5">
    <p class="text-center">QUẢN LÝ BÌNH LUẬN</p>
    <!-- <a href="?mod=product&act=add" class="btn btn-primary">Thêm sản phẩm</a>     -->
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Mã bình luận</th>
                <th>Mã sản phẩm</th>
                
                <th>Mã khách hàng</th>
                <th class="text-center">Nội dung</th >
                <th>Ngày bình luận</th>
                
                <th>Hành động</th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach($feedback as $fb):?>
            <tr>
                <td><?=$fb['MaBinhLuan']?></td>
                <td><?=$fb['MaSanPham']?></td>
                
                <td><?=$fb['MaKhachHang']?></td>
                
                <td width="550px" ><?=$fb['NoiDung']?></td>
                <td><?=$fb['NgayBinhLuan']?></td>
                
                <td>
                    
                    <a href="?mod=feedback&act=delete&id=<?=$fb['MaBinhLuan']?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa bình luận này không?')">Xóa</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    


</div>