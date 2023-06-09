<?= $this->extend('superadmin/layout/default') ?>
<?= $this->section('title') ?>
<title>Edit LK/OK &mdash; AOU</title>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>LK/OK</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">LK/OK</div>
            <div class="breadcrumb-item"><a href="<?= base_url(); ?>/SuperAdmin/dataLK-OK">Data LK/OK</a></div>
            <div class="breadcrumb-item">Edit LK/OK</div>
        </div>
    </div>
</section>
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Edit LK/OK</h4>
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
                        <form method="post" action="">
                            <?= csrf_field(); ?>
                            <div class="form-group ">
                                <label>Nama LK/OK</label>
                                <input id="text" type="text" class="form-control huruf" name="o_nama" placeholder="Masukan Nama LK/OK" value="<?= $tb_organisasi['o_nama'] ?>" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" name="submit">
                                    Register
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="simple-footer">
                    Copyright &copy; AOU 2023
                </div>
            </div>
        </div>
    </div>
</section>
<script>
</script>
<?= $this->endSection() ?>