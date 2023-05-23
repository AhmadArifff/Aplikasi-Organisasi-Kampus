<?= csrf_field(); ?>
<?php
if (session()->getFlashdata('message')) {
?>
    <div class="alert alert-info">
        <?= session()->getFlashdata('message') ?>
    </div>
<?php
}
?>
<form method="post" action="<?= base_url('admin/admincontrollers/importfileexcelbarangsupplier') ?>" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <div class="form-group">
        <label>Import File Excel Data Barang Supplier</label>
        <input type="file" name="file" class="form-control" id="file" required accept=".xls, .xlsx" /></p>
    </div>
    <div class="form-group">
        <button class="btn btn-primary" type="submit"><i class="fas fa-file"></i> Upload</button>
    </div>
</form>