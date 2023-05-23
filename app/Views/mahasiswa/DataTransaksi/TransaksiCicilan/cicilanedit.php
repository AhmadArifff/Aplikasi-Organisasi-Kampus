<?= $this->extend('coordinator/layout/default') ?>
<?= $this->section('title') ?>
<title>Forms Edit Data Kategori Barang &mdash; ARISYA</title>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Data Transaksi</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Data Transaksi</div>
            <div class="breadcrumb-item"><a href="<?= base_url(); ?>/coordinator/datatransaksi/datacicilan">Data Cicilan Pembayaran</a></div>
            <div class="breadcrumb-item">Cicilan Pembayaran</div>
        </div>
    </div>
</section>
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Edit Data Transaksi Pembayaran</h4>
                    </div>

                    <div class="card-body">
                        <?php if (!empty(session()->getFlashdata('error'))) : ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <h4>Periksa Entrian Form</h4>
                                </hr />
                                <?php echo session()->getFlashdata('error'); ?>
                            </div>
                        <?php endif; ?>
                        <form method="post" action="" id="text-editor">
                            <?= csrf_field(); ?>
                            <div class="row">
                                <input type="hidden" name="no" value="<?= $tb_cicilan['c_id'] ?>">
                                <div class="form-group col-6">
                                    <label>Nama Pengambil Paket</label>
                                    <select class="js-example-basic-single" name="u_id" id="">
                                        <option value="">--Pilih Nama Pengambil Paket--</option>
                                        <?php foreach ($DataUser as $tb_user) { ?>
                                            <option value="<?php echo $tb_user['u_id']; ?>" <?= $tb_user['u_id'] == $tb_cicilan['u_id'] ? 'selected' : '' ?>><?php echo $tb_user['u_nama']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-6">
                                    <label>Nama Paket</label>
                                    <select class="js-example-basic-single" name="p_id" id="p_id">
                                        <option value="">--Pilih Nama Paket--</option>
                                        <?php foreach ($DataPaket as $tb_paket) { ?>
                                            <option value="<?php echo $tb_paket['p_id']; ?>" <?= $tb_paket['p_id'] == $tb_cicilan['p_id'] ? 'selected' : '' ?>><?php echo  $tb_paket['p_nama']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <!-- <div class="form-group col-6">
                                    <label>Status Cicilan Paket</label>
                                    <select class="js-example-basic-single" name="t_id" id="t_id">
                                        <option value="">--Pilih Status Cicilan Paket--</option>
                                        <?php foreach ($DataTransaksiFungsi as $TransaksiFungsi) { ?>
                                            <option value="<?php echo $TransaksiFungsi['t_id']; ?>" <?= $TransaksiFungsi['t_id'] == $tb_cicilan['t_id'] ? 'selected' : '' ?>><?php echo $TransaksiFungsi['t_status']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-6">
                                    <label>Jumlah Periode Cicilan</label>
                                    <select class="js-example-basic-single" name="pe_id" id="pe_id">
                                        <option value="">--Pilih Jumlah Periode Cicilan--</option>
                                        <?php foreach ($DataPayPeriode as $PayPeriode) { ?>
                                            <option value="<?php echo $PayPeriode['pe_id']; ?>" <?= $PayPeriode['pe_id'] == $tb_cicilan['pe_id'] ? 'selected' : '' ?>><?php echo $PayPeriode['pe_periode']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div> -->
                                <div class="form-group col-6">
                                    <label>Jumlah Total Cicilan</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Rp.
                                            </div>
                                        </div>
                                        <input type="text" name="c_total_cicilan" class="form-control currency" placeholder="Masukan Jumlah Total Cicilan" required value="<?= $tb_cicilan['c_total_cicilan'] ?>">
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label>Jumlah Cicilan Masuk</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Rp.
                                            </div>
                                        </div>
                                        <input type="text" name="c_cicilan_masuk" class="form-control hargajual" placeholder="Masukan Jumlah Cicilan Masuk" required value="<?= $tb_cicilan['c_cicilan_masuk'] ?>">
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label>Jumlah Cicilan Outstanding</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Rp.
                                            </div>
                                        </div>
                                        <input type="text" name="c_cicilan_outstanding" class="form-control cashback" placeholder="Masukan Jumlah Cicilan Outstanding" required value="<?= $tb_cicilan['c_cicilan_outstanding'] ?>">
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label>Jumlah Total Biaya</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Rp.
                                            </div>
                                        </div>
                                        <input type="text" name="c_total_biaya" class="form-control insentive" placeholder="Masukan Jumlah Total Biaya" required value="<?= $tb_cicilan['c_total_biaya'] ?>">
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label>Jumlah Biaya Masuk</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Rp.
                                            </div>
                                        </div>
                                        <input type="text" name="c_biaya_masuk" class="form-control laba" placeholder="Masukan Jumlah Biaya Masuk" required value="<?= $tb_cicilan['c_biaya_masuk'] ?>">
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label>Jumlah Biaya Outstanding</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Rp.
                                            </div>
                                        </div>
                                        <input type="text" name="c_biaya_outstanding" class="form-control hargaasli" placeholder="Masukan Jumlah Biaya Outstanding" required value="<?= $tb_cicilan['c_biaya_outstanding'] ?>">
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