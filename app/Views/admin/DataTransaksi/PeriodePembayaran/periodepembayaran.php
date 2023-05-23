<?= $this->extend('admin/layout/default') ?>
<?= $this->section('title') ?>
<title>Register Periode Pembayaran &mdash; ARISYA</title>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Data Transaksi</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Data Transaksi</div>
            <div class="breadcrumb-item"><a href="<?= base_url(); ?>/admin/datatransaksi/dataperiodepembayaran">Data Periode Pembayaran</a></div>
            <div class="breadcrumb-item">Register Periode Pembayaran</div>
        </div>
    </div>
</section>
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Register Periode Pembayaran</h4>
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
                        <?= $this->include('admin/DataTransaksi/PeriodePembayaran/importexcelperiodepembayaran') ?>
                        <form method="post" action="<?= base_url(); ?>/admin/datatransaksi/periodepembayaran/process">
                            <?= csrf_field(); ?>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label>Nama Periode Pembayaran</label>
                                    <input type="text" name="pe_nama" class="form-control" placeholder="Masukan Nama Periode Pembayaran" required>
                                </div>
                                <div class="form-group col-6">
                                    <label>Jumlah Periode Pembayaran</label>
                                    <input type="text" name="pe_periode" class="form-control phone-number" placeholder="Masukan Jumlah Periode Pembayaran" maxlength="3" required>
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