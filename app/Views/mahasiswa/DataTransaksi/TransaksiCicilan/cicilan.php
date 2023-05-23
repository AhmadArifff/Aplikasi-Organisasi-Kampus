<?= $this->extend('coordinator/layout/default') ?>
<?= $this->section('title') ?>
<title>Forms Register &mdash; ARISYA</title>
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
                        <h4>Cicilan Pembayaran</h4>
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
                        <?= $this->include('coordinator/DataTransaksi/TransaksiCicilan/importexcelcicilan') ?>
                        <form method="post" action="<?= base_url(); ?>/coordinator/datatransaksi/cicilan/process">
                            <?= csrf_field(); ?>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label>Nama Pengambil Paket</label>
                                    <select class="js-example-basic-single" name="u_id" id="u_id" >
                                    <!-- <select class="js-example-basic-single" name="u_id" id="u_id" disabled> -->
                                        <option value="">--Pilih Nama Pengambil Paket--</option>
                                        <?php foreach ($DataUser as $tb_user) { ?>
                                            <option value="<?php echo $tb_user['u_id']; ?>" ><?php echo $tb_user['u_nama']; ?></option>
                                            <!-- <option value="<?php echo $tb_user['u_id']; ?>" <?= $tb_user['u_id'] == session()->get('u_id') ? 'selected' : '' ?>><?php echo $tb_user['u_nama']; ?></option> -->
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-6">
                                    <label>Nama Paket</label>
                                    <select class="js-example-basic-single" name="p_id" id="p_id">
                                        <option value="">--Pilih Nama Paket--</option>
                                        <?php foreach ($DataPaket as $tb_paket) { ?>
                                            <option value="<?php echo $tb_paket['p_id']; ?>"><?php echo  $tb_paket['p_nama']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <!-- <div class="form-group col-6">
                                    <label>Paket Cicilan</label>
                                    <select class="js-example-basic-single" name="t_id" id="t_id" required>
                                        <option value="">--Pilih Paket Cicilan--</option>
                                        <?php foreach ($DataTransaksiFungsi as $TransaksiFungsi) { ?>
                                            <option value="<?php echo $TransaksiFungsi['t_id']; ?>"><?php echo $TransaksiFungsi['t_status']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div> -->
                                <!-- <div class="form-group col-6">
                                    <label>Jumlah Periode Cicilan</label>
                                    <select class="js-example-basic-single" name="pe_id" id="">
                                        <option value="">--Pilih Jumlah Periode Cicilan--</option>
                                        <?php foreach ($DataPayPeriode as $PayPeriode) { ?>
                                            <option value="<?php echo $PayPeriode['pe_id']; ?>"><?php echo $PayPeriode['pe_periode']; ?></option>
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
                                        <input type="text" name="c_total_cicilan" class="form-control currency" placeholder="Masukan Jumlah Total Cicilan" required>
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
                                        <input type="text" name="c_cicilan_masuk" class="form-control hargajual" placeholder="Masukan Jumlah Cicilan Masuk" required>
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
                                        <input type="text" name="c_cicilan_outstanding" class="form-control cashback" placeholder="Masukan Jumlah Cicilan Outstanding" required>
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
                                        <input type="text" name="c_total_biaya" class="form-control insentive" placeholder="Masukan Jumlah Total Biaya" required>
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
                                        <input type="text" name="c_biaya_masuk" class="form-control laba" placeholder="Masukan Jumlah Biaya Masuk" required>
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
                                        <input type="text" name="c_biaya_outstanding" class="form-control hargaasli" placeholder="Masukan Jumlah Biaya Outstanding" required>
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