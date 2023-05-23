<?= $this->extend('coordinator/layout/default') ?>
<?= $this->section('title') ?>
<title>Register Transaksi Log Cicilan Paket Barang &mdash; ARISYA</title>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Data Transaksi</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Data Transaksi</div>
            <div class="breadcrumb-item"><a href="<?= base_url(); ?>/coordinator/datatransaksi/datalogcicilan">Data Log Cicilan Pembayaran</a></div>
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
                        <h4>Log Cicilan Pembayaran</h4>
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
                        <form method="post" action="<?= base_url(); ?>/coordinator/datatransaksi/logcicilan/process" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="">Nama Pengambil Paket</label>
                                    <select class="js-example-basic-single" name="u_id" id="u_id_log_cicilan">
                                        <!-- <select class="js-example-basic-single" name="u_id" id="" disabled> -->
                                        <option value="">--Pilih Nama Pengambil Paket--</option>
                                        <?php foreach ($DataUser as $tb_user) { ?>
                                            <option value="<?php echo $tb_user['u_id']; ?>"><?php echo $tb_user['u_nama']; ?></option>
                                            <!-- <option value="<?php echo $tb_user['u_id']; ?>" <?= $tb_user['u_id'] == session()->get('u_id') ? 'selected' : '' ?>><?php echo $tb_user['u_nama']; ?></option> -->
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-6">
                                    <label>Paket Cicilan</label>
                                    <select class="js-example-basic-single" name="c_id" id="t_id_log_cicilan" required>
                                        <option value="">--Pilih Paket Cicilan--</option>
                                    </select>
                                </div>
                                <!-- <div class="form-group col-6">
                                    <label>Paket Cicilan</label>
                                    <select class="js-example-basic-single" name="c_id" id="" required>
                                        <option value="">--Pilih Paket Cicilan--</option>
                                        <?php
                                        $i = 1;
                                        foreach ($DataCicilan as $tb_cicilan) {
                                            if ($tb_cicilan['u_id'] == session()->get('u_id')) {
                                                $p_idcicilan = $tb_cicilan['p_id'];
                                                $p_namapaket = '';
                                                foreach ($DataTransaksi as $tb_transaksi) {
                                                    if ($p_idcicilan == $tb_transaksi['p_id']) {
                                                        $p_idpaket = $tb_transaksi['p_id'];
                                                        foreach ($DataPaket as $tb_paket) {
                                                            if ($p_idpaket == $tb_paket['p_id']) {
                                                                $p_namapaket = $tb_paket['p_nama'];
                                                                break;
                                                            }
                                                        }
                                                    }
                                                }
                                                if ($p_namapaket !== '') { // hanya menampilkan data yang memiliki nama paket
                                                    echo '<option value="' . $tb_cicilan['c_id'] . '" ' . ($tb_cicilan['u_id'] == session()->get('u_id') ? 'selected' : '') . '>' . $p_namapaket . ' ' . $i . '</option>';
                                                    $i++;
                                                }
                                            }
                                        }
                                        ?>

                                    </select>
                                </div> -->
                                <div class="form-group col-6">
                                    <label>Jumlah Bayar Cicilan</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Rp.
                                            </div>
                                        </div>
                                        <input type="text" name="l_jumlah_bayar" class="form-control currency" placeholder="Masukan Jumlah Bayar Cicilan" required>
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label for="">Bukti Pembayaran Cicilan</label>
                                    <input type="file" name="l_foto" class="form-control" id="file" required accept=".jpg, .jpeg, .png" /></p>
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