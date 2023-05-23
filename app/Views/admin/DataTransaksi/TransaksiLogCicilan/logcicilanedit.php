<?= $this->extend('admin/layout/default') ?>
<?= $this->section('title') ?>
<title>Forms Edit Data Kategori Barang &mdash; ARISYA</title>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Data Transaksi</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Data Transaksi</div>
            <div class="breadcrumb-item"><a href="<?= base_url(); ?>/admin/datatransaksi/datalogcicilan">Data Log Cicilan Pembayaran</a></div>
            <div class="breadcrumb-item">Log Cicilan Pembayaran</div>
        </div>
    </div>
</section>
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Edit Data Log Cicilan Pembayaran</h4>
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
                                <input type="hidden" name="no" value="<?= $tb_log_cicilan['l_id'] ?>">
                                <div class="form-group col-6">
                                    <label for="">Nama Pengambil Paket</label>
                                    <select class="js-example-basic-single" name="u_id" id="" autofocus>
                                        <option value="">--Pilih Nama Pengambil Paket--</option>
                                        <?php foreach ($DataUser as $tb_user) { ?>
                                            <option value="<?php echo $tb_user['u_id']; ?>" <?= $tb_user['u_id'] == $tb_log_cicilan['u_id'] ? 'selected' : '' ?>><?php echo $tb_user['u_nama']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-6">
                                    <label>Jumlah Bayar Cicilan</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Rp.
                                            </div>
                                        </div>
                                        <input type="text" name="l_jumlah_bayar" class="form-control currency" placeholder="Masukan Harga Asli" required value="<?= $tb_log_cicilan['l_jumlah_bayar'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Bukti Pembayaran Cicilan</label>
                                    <input type="file" name="l_foto" class="form-control" id="file" accept=".jpg, .jpeg, .png" /></p>
                                </div>
                                <div class="form-group">
                                    <label for="">Preview Foto Barang Sebelumnya</label>
                                    <img src="<?= base_url('foto-bukti-pembayaran/' . $tb_log_cicilan['l_foto']) ?>" id="gambar_load" style="border-radius: 5px;" class="form-control h-auto" height="100%"></p>
                                    <input id="" type="text" class="form-control" name="preview" placeholder="" value="<?= $tb_log_cicilan['l_foto'] ?>" hidden>
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