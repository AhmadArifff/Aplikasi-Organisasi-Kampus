<?= $this->extend('admin/layout/default') ?>
<?= $this->section('title') ?>
<title>Edit Data Periode Pembayaran &mdash; ARISYA</title>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Data Transaksi</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Data Transaksi</div>
            <div class="breadcrumb-item"><a href="<?= base_url(); ?>/admin/datatransaksi/dataperiodepembayaran">Data Periode Pembayaran</a></div>
            <div class="breadcrumb-item">Periode Pembayaran</div>
        </div>
    </div>
</section>
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Edit Data Periode Pembayaran</h4>
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
                                <input type="hidden" name="no" value="<?= $tb_pay_periode['pe_id'] ?>" />
                                <div class="form-group col-6">
                                    <label>Nama Periode Pembayaran</label>
                                    <input type="text" name="pe_nama" class="form-control" placeholder="Masukan Nama Periode Pembayaran" value="<?= $tb_pay_periode['pe_nama'] ?>" required>
                                </div>
                                <div class="form-group col-6">
                                    <label>Jumlah Periode Pembayaran</label>
                                    <input type="text" name="pe_periode" class="form-control phone-number" placeholder="Masukan Jumlah Periode Pembayaran" maxlength="2" value="<?= $tb_pay_periode['pe_periode'] ?>" required>
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