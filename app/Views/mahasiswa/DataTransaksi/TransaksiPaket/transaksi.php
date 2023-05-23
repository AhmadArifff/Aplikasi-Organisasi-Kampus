<?= $this->extend('coordinator/layout/default') ?>
<?= $this->section('title') ?>
<title>Register Transaksi Paket Barang &mdash; ARISYA</title>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Data Transaksi</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Data Transaksi</div>
            <div class="breadcrumb-item"><a href="<?= base_url(); ?>/coordinator/datatransaksi/datatransaksi">Data Transaksi Paket</a></div>
            <div class="breadcrumb-item">Register Transaksi Paket</div>
        </div>
    </div>
</section>
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Register Transaksi Paket</h4>
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
                        <?= $this->include('coordinator/DataTransaksi/TransaksiPaket/importexceltransaksi') ?>
                        <form method="post" action="<?= base_url(); ?>/coordinator/datatransaksi/transaksi/process">
                            <?= csrf_field(); ?>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label>Nama Pengambil Paket</label>
                                    <select class="js-example-basic-single" name="u_id" id="">
                                        <option value="">--Pilih Nama Pengambil Paket--</option>
                                        <?php foreach ($DataUser as $tb_user) { ?>
                                            <option value="<?php echo $tb_user['u_id']; ?>"><?php echo $tb_user['u_nama']; ?></option>
                                            <!-- <option value="<?php echo $tb_user['u_id']; ?>" <?= $tb_user['u_id'] == session()->get('u_id') ? 'selected' : '' ?>><?php echo $tb_user['u_nama']; ?></option> -->
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-6">
                                    <label>Nama Paket</label>
                                    <select class="js-example-basic-single" name="p_id" id="transaksi_p_id">
                                        <option value="">--Pilih Nama Paket--</option>
                                        <?php foreach ($DataPaket as $tb_paket) { ?>
                                            <option value="<?php echo $tb_paket['p_id']; ?>"><?php echo  $tb_paket['p_nama']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-6">
                                    <label for="">Nama Periode Pembayaran</label>
                                    <select class="js-example-basic-single" name="pe_id" id="pe_nama" required>
                                    </select>
                                </div>
                                <div class="form-group col-6">
                                    <label>Jumlah Paket</label>
                                    <input type="text" name="t_qty" class="form-control" placeholder="Masukan Jumlah Paket" required>
                                </div>
                                <!-- <div class="form-group col-6">
                                    <label>Status Transaksi Paket</label>
                                    <select class="js-example-basic-single" name="t_status" id="">
                                        <option value="">--Pilih Status Transaksi Paket--</option>
                                        <option value="BELUM LUNAS">BELUM LUNAS</option>
                                        <option value="SUDAH LUNAS">SUDAH LUNAS</option>
                                    </select>
                                </div> -->
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" name="submit">
                                    Simpan
                                </button>
                            </div>
                            <div id="p_hargapaket"></div>
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