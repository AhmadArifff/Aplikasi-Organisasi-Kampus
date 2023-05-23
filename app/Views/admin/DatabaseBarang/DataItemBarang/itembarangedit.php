<?= $this->extend('admin/layout/default') ?>
<?= $this->section('title') ?>
<title>Edit Data Item Barang &mdash; ARISYA</title>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Database Barang</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Database Barang</div>
            <div class="breadcrumb-item"><a href="<?= base_url(); ?>/admin/databasebarang/dataitembarang">Data Item Barang</a></div>
            <div class="breadcrumb-item">Edit Item Barang</div>
        </div>
    </div>
</section>
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Edit Item Barang</h4>
                    </div>

                    <div class="card-body">
                        <?php if (!empty(session()->getFlashdata('error'))) : ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <h4>Periksa Entrian Form</h4>
                                </hr />
                                <?php echo session()->getFlashdata('error'); ?>
                            </div>
                        <?php endif; ?>
                        <form method="post" action="" id="text-editor" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="row">
                                <input type="hidden" name="no" value="<?= $tb_item_barang['ib_id'] ?>" />
                                <div class="form-group col-6">
                                    <label>Nama Item Barang</label>
                                    <input type="text" name="ib_nama" class="form-control" placeholder="Masukan Nama Item Barang" value="<?= $tb_item_barang['ib_nama'] ?>" required>
                                </div>
                                <div class="form-group col-6">
                                    <label>Harga Item Barang</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Rp.
                                            </div>
                                        </div>
                                        <input type="text" name="ib_harga" class="form-control currency" placeholder="Masukan Harga Item Barang" value="<?= $tb_item_barang['ib_harga'] ?>" required>
                                    </div>
                                </div>
                                <!-- <div class="form-group col-6">
                                    <label for="">Jumlah Item Barang Stock (qty)</label>
                                    <input type="text" name="ib_qty_stok" class="form-control hargaasli" placeholder="Masukan Jumlah Item Barang Stock (qty)" value="<?= $tb_item_barang['ib_qty_beli'] ?>" required>
                                </div> -->
                                <div class="form-group col-6">
                                    <label for="">Jumlah Item Barang Yang Sudah Dibeli (qty)</label>
                                    <input id="" type="text" class="form-control hargajual" name="ib_qty_beli" placeholder="Masukan Jumlah Item Barang Yang Sudah Dibeli (qty)" value="<?= $tb_item_barang['ib_qty_beli'] ?>" required>
                                </div>
                                <div class="form-group col-6">
                                    <label>Berat/Ukuran Item Barang</label>
                                    <div class="input-group">
                                        <input type="text" name="ib_berat/ukuran" class="form-control insentive" placeholder="Masukan Berat/Ukuran Item Barang" value="<?= $tb_item_barang['ib_berat/ukuran'] ?>" required>
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <select class="form-control selectric" name="ib_ktrg_berat/ukuran" id="">
                                                    <option value="gram" <?= $tb_item_barang['ib_ktrg_berat/ukuran'] == 'gram' ? 'selected' : '' ?>>gram</option>
                                                    <option value="kg" <?= $tb_item_barang['ib_ktrg_berat/ukuran'] == 'kg' ? 'selected' : '' ?>>kg</option>
                                                    <option value="liter" <?= $tb_item_barang['ib_ktrg_berat/ukuran'] == 'liter' ? 'selected' : '' ?>>liter</option>
                                                    <option value="ml" <?= $tb_item_barang['ib_ktrg_berat/ukuran'] == 'ml' ? 'selected' : '' ?>>ml</option>
                                                    <option value="botol" <?= $tb_item_barang['ib_ktrg_berat/ukuran'] == 'botol' ? 'selected' : '' ?>>botol</option>
                                                    <option value="pcs" <?= $tb_item_barang['ib_ktrg_berat/ukuran'] == 'pcs' ? 'selected' : '' ?>>pcs</option>
                                                    <option value="unit" <?= $tb_item_barang['ib_ktrg_berat/ukuran'] == 'unit' ? 'selected' : '' ?>>unit</option>
                                                    <option value="kardus" <?= $tb_item_barang['ib_ktrg_berat/ukuran'] == 'kardus' ? 'selected' : '' ?>>kardus</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" name="submit">
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="simple-footer">
                    Copyright &copy; Arisya 2023
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>