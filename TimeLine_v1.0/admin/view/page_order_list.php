<div class="container">
    <h2>Danh sách đơn hàng</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Mã đơn hàng</th>
                <th>Tên khách hàng</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Ngày đặt hàng</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order) { ?>
                <tr>
                    <td><?= htmlspecialchars($order['MaDonHang']) ?></td>
                    <td><?= htmlspecialchars($order['HoTen']) ?></td>
                    <td><?= htmlspecialchars($order['SDT']) ?></td>
                    <td><?= htmlspecialchars($order['DiaChi']) ?></td>
                    <td><?= htmlspecialchars($order['NgayDatHang']) ?></td>
                    <td><?= htmlspecialchars($order['TongTien']) ?></td>
                    <td><?= htmlspecialchars($order['TrangThai']) ?></td>
                    <td>
                        <a href="?mod=order&act=edit&maDonHang=<?= htmlspecialchars($order['MaDonHang']) ?>" class="btn btn-warning">Sửa</a>
                        <a href="?mod=order&act=delete&maDonHang=<?= htmlspecialchars($order['MaDonHang']) ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
