<?= $this->extend('superadmin/layout/default') ?>
<?= $this->section('title') ?>
<title>Register Fakultas &mdash; AOU</title>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Fakultas</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Fakultas</div>
            <div class="breadcrumb-item"><a href="<?= base_url(); ?>/SuperAdmin/datafakultas">Data Fakultas</a></div>
            <div class="breadcrumb-item">Register Fakultas</div>
        </div>
    </div>
</section>
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Register Fakultas</h4>
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
                        <form method="post" action="<?= base_url(); ?>/SuperAdmin/datafakultas/registerfakultas/process">
                            <?= csrf_field(); ?>
                            <div class="form-group ">
                                <label>Nama Prodi</label>
                                <input id="text" type="text" class="form-control huruf" name="p_nama" placeholder="Masukan Nama Prodi" required>
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