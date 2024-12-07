<form action="?mod=product&act=save&product_id=" method="POST">
    <input type="hidden" name="maBinhLuan" value="<?= isset($feedbacks) ? $feedbacks['MaBinhLuan'] : '' ?>">
    <div class="form-group">
        <label for="noiDung">Nội Dung</label>
        <textarea class="form-control" id="noiDung" name="noiDung"><?= isset($feedbacks) ? $feedbacks['NoiDung'] : '' ?></textarea>
    </div>
    <button type="submit" class="btn btn-success">Sửa</button>
</form>
