<?= $this->extend('admin/layout/default') ?>
<?= $this->section('title') ?>
<title>Register Packaging Barang &mdash; ARISYA</title>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Database Barang</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Database Barang</div>
            <div class="breadcrumb-item"><a href="<?= base_url(); ?>/admin/databasebarang/datapackagingbarang">Data Packaging Barang</a></div>
            <div class="breadcrumb-item">Register Packaging Barang</div>
        </div>
    </div>
</section>
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Register ackaging Barang</h4>
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
                        <?= $this->include('admin/DatabaseBarang/PackagingBarang/importexcelpackingbarang') ?>
                        <form method="post" action="<?= base_url(); ?>/admin/databasebarang/packagingbarang/process" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label>Nama Packaging</label>
                                    <input type="text" name="pa_nama" class="form-control" placeholder="Masukan Nama Packaging" required>
                                </div>
                                <div class="form-group col-6">
                                    <label>Harga Packaging</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Rp.
                                            </div>
                                        </div>
                                        <input type="text" name="pa_harga" class="form-control currency" placeholder="Masukan Harga Packaging" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Foto Packaging Barang</label>
                                    <input type="file" name="pa_foto" class="form-control" id="file" required accept=".jpg, .jpeg, .png" /></p>
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