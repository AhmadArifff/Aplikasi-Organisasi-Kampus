<?= $this->extend('admin/layout/default') ?>
<?= $this->section('title') ?>
<title>Register Paket Barang &mdash; ARISYA</title>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Database Barang</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Database Barang</div>
            <div class="breadcrumb-item"><a href="<?= base_url(); ?>/admin/databasebarang/datapaketbarang">Data Paket Barang</a></div>
            <div class="breadcrumb-item">Register Paket Barang</div>
        </div>
    </div>
</section>
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Register Paket Barang</h4>
                    </div>
                    <div class="card-body">
                        <?php if (!empty(session()->getFlashdata('error'))) : ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <h4>Periksa Entrian Form</h4>
                                </hr />
                                <?php echo session()->getFlashdata('error'); ?>
                            </div>
                        <?php endif; ?>
                        <?php if (session()->getFlashdata('success')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo session()->getFlashdata('success'); ?>
                            </div>
                        <?php endif; ?>
                        <form method="post" action="<?= base_url(); ?>/admin/databasebarang/paketbarang/process" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label>Nama Paket Barang</label>
                                    <input type="text" name="p_nama" class="form-control" placeholder="Masukan Nama Item Barang" required>
                                </div>
                                <!-- <div class="form-group col-6">
                                    <label for="">Nama Periode Pembayaran</label>
                                    <select class="js-example-basic-single" name="pe_id" id="" required>
                                        <option value="">--Pilih Nama Periode Pembayaran--</option>
                                        <?php foreach ($payperiode as $tb_pay_periode) { ?>
                                            <option value="<?php echo $tb_pay_periode['pe_id']; ?>"><?php echo $tb_pay_periode['pe_nama']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div> -->
                                <div class="form-group col-6">
                                    <label>Harga Asli Paket Barang</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Rp.
                                            </div>
                                        </div>
                                        <input type="text" name="p_hargaBarang" class="form-control currency" placeholder="Masukan Harga Asli Paket Barang" required>
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label>Harga Jual Paket Barang</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Rp.
                                            </div>
                                        </div>
                                        <input type="text" name="p_hargaJual" class="form-control hargajual" placeholder="Masukan Harga Jual Paket Barang" required>
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label>Cashback Paket Barang</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Rp.
                                            </div>
                                        </div>
                                        <input type="text" name="p_cashback" class="form-control cashback" placeholder="Masukan Cashback Paket Barang" required>
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label>Nama Packaging Barang</label>
                                    <select class="js-example-basic-single" name="pa_id" id="" required>
                                        <option value="">--Pilih Nama Packaging Barang--</option>
                                        <?php foreach ($packagingbarang as $tb_packaging) { ?>
                                            <option value="<?php echo $tb_packaging['pa_id']; ?>"><?php echo $tb_packaging['pa_nama']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-6">
                                    <label for="">Nama Periode Pembayaran</label>
                                    <select class="js-example-basic-single" name="pe_id" id="" required>
                                        <option value="">--Pilih Nama Periode Pembayaran--</option>
                                        <?php foreach ($payperiode as $tb_pay_periode) { ?>
                                            <option value="<?php echo $tb_pay_periode['pe_id']; ?>"><?php echo $tb_pay_periode['pe_nama']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group ">
                                    <label for="">Foto Paket Barang</label>
                                    <input type="file" name="p_foto" class="form-control" id="file" required accept=".jpg, .jpeg, .png" /></p>
                                </div>
                                <div class="form-group ">
                                    <label>Nama Item Barang</label>
                                    <select class="js-example-basic-multiple" name="pp_ib_id[]" id="" multiple="multiple" required>
                                        <?php foreach ($itembarang as $tb_item_barang) { ?>
                                            <option value="<?= $tb_item_barang['ib_id'] ?>"><?= $tb_item_barang['ib_nama'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <!-- <div class="form-group ">
                                    <label>Item Barang</label>
                                    <div class="input-group-text">
                                        <select class="js-example-basic-multiple" name="pp_ib_id" id="" required>
                                            <?php foreach ($itembarang as $tb_item_barang) { ?>
                                                <option value="<?= $tb_item_barang['ib_id'] ?>"><?= $tb_item_barang['ib_nama'] ?></option>
                                            <?php } ?>
                                        </select>
                                        <div class="input-group-prepend">
                                            <input type="text" name="pp_qty" class="form-control insentive" placeholder="qty" required>
                                            <select class="form-control selectric" name="pp_ktrg_berat_ukuran" id="">
                                                <option value="gram">gram</option>
                                                <option value="kg">kg</option>
                                                <option value="liter">liter</option>
                                                <option value="ml">ml</option>
                                                <option value="botol">botol</option>
                                                <option value="pcs">pcs</option>
                                                <option value="unit">unit</option>
                                                <option value="kardus">kardus</option>
                                            </select>
                                        </div>
                                        <div class="input-group-text">
                                            <a id="tambahitembarang" class="btn btn-primary btn-sm update-record" href="#"><i class="fas fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div> -->
                                <div id="itembarang"></div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" name="submit">
                                    Simpan
                                </button>
                            </div>

                            <div id="pa_harga"></div>
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