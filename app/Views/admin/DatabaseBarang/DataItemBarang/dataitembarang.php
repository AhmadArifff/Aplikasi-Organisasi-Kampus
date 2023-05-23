<?= $this->extend('admin/layout/default') ?>
<?= $this->section('title') ?>
<title>Database Item Barang &mdash; ARISYA</title>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="section">
    <?= csrf_field(); ?>
    <div class="section-header">
        <h1>Database Barang</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Database Barang</div>
            <div class="breadcrumb-item">Data Item Barang </div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-18">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Item Barang</h4>
                        <div class="card-header-action">
                            <a href="<?= base_url(); ?>/admin/databasebarang/itembarang" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
                            <a href="<?= base_url('admin/admincontrollers/exportfileexcelitembarang') ?>" class="btn btn-primary"><i class="fas fa-download"></i> Export Data</a>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <?php if (session()->getFlashdata('success')) : ?>
                            <div class="alert alert-success w-auto" role="alert">
                                <?php echo session()->getFlashdata('success'); ?>
                            </div>
                        <?php endif; ?>
                        <?php if (session()->getFlashdata('error')) : ?>
                            <div class="alert alert-danger w-auto" role="alert">
                                <?php echo session()->getFlashdata('error'); ?>
                            </div>
                        <?php endif; ?>
                        <table id="myTable" class="table table-striped table-bordered">
                            <thead>
                                <tr class="table-primary">
                                    <th class="text-center">#</th>
                                    <th>Nama Item Barang</th>
                                    <th>Harga Item Barang</th>
                                    <th>Jumlah Item Barang Yang Diperlukan (qty)</th>
                                    <th>Jumlah Item Barang Yang Sudah Dibeli (qty)</th>
                                    <th>Jumlah Item Barang Yang Belum DIbeli (qty)</th>
                                    <th>Berat/Ukuran Item Barang</th>
                                    <th>Action Button</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($tb_item_barang as $item_barang) : ?>
                                    <tr>
                                        <td align="center"><?= $i ?></td>
                                        <td><?= $item_barang['ib_nama'] ?></td>
                                        <td class="text-center"><?= $item_barang['ib_harga'] ?></td>
                                        <td class="text-center"><?= $item_barang['ib_qty_jual'] ?></td>
                                        <td class="text-center"><?= $item_barang['ib_qty_beli'] ?></td>
                                        <?php $jumlah =  $item_barang['ib_qty_beli'] - $item_barang['ib_qty_jual'];
                                        if ($jumlah < 0) { ?>
                                            <td id="text-color-min" class="text-center"><?= $jumlah ?></td>
                                        <?php } else { ?>
                                            <td id="text-color-plus" class="text-center"><?= '+' . $jumlah ?></td>
                                        <?php } ?>
                                        <td class="text-center"><?= $item_barang['ib_berat/ukuran'] ?> <?= $item_barang['ib_ktrg_berat/ukuran'] ?></td>
                                        <td>
                                            <a href="<?= base_url('admin/databasebarang/itembarang/' . $item_barang['ib_id'] . '/edit') ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                            <a href="#" data-href="<?= base_url('admin/databasebarang/itembarang/' . $item_barang['ib_id'] . '/delete') ?>" onclick="confirmToDelete(this)" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php $i++;
                                endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div id="confirm-dialog" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h4 class="h4">Apa kamu yakin hapus data ini?</h4>
                <p>Data akan dihapus dan hilang selamanya....</p>
            </div>
            <div class="modal-footer">
                <a href="#" role="button" id="delete-button" class="btn btn-danger">Delete</a>
                <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmToDelete(el) {
        $("#delete-button").attr("href", el.dataset.href);
        $("#confirm-dialog").modal('show');
    }
</script>
<?= $this->endSection() ?>