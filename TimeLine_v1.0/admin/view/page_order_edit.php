<div class="container">
    <h2>Chỉnh sửa đơn hàng</h2>
    <form action="?mod=order&act=update" method="post">
        <input type="hidden" name="maDonHang" value="<?= htmlspecialchars($order['MaDonHang']) ?>">
        <div class="form-group">
            <label for="trangThai">Trạng thái</label>
            <select name="trangThai" id="trangThai" class="form-control">
                <option value="Đang chờ xử lý" <?= $order['TrangThai'] == 'Đang chờ xử lý' ? 'selected' : '' ?>>Đang chờ xử lý</option>
                <option value="Đang giao hàng" <?= $order['TrangThai'] == 'Đang giao hàng' ? 'selected' : '' ?>>Đang giao hàng</option>
                <option value="Đã giao hàng" <?= $order['TrangThai'] == 'Đã giao hàng' ? 'selected' : '' ?>>Đã giao hàng</option>
                <option value="Đã hủy" <?= $order['TrangThai'] == 'Đã hủy' ? 'selected' : '' ?>>Đã hủy</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
</div>