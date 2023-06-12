<?= $this->extend('superadmin/layout/default') ?>
<?= $this->section('title') ?>
<title>Register Misi &mdash; AOU</title>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Misi</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Misi</div>
            <div class="breadcrumb-item"><a href="<?= base_url('SuperAdmin/morelkok/' . $tb_organisasi['o_id']); ?>">More LK/OK</a></div>
            <div class="breadcrumb-item">Register Misi</div>
        </div>
    </div>
</section>
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Register Misi</h4>
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
                        <form method="post" action="<?= base_url(); ?>/SuperAdmin/morelkok/misi/registerproses">
                            <?= csrf_field(); ?>
                            <div class="row">
                                <div class="form-group ">
                                    <label>Misi 1</label>
                                    <input id="text" type="text" class="form-control huruf" name="m_ke1" placeholder="Masukan Misi 1" required>
                                </div>
                                <div class="form-group ">
                                    <label>Misi 2</label>
                                    <input id="text" type="text" class="form-control huruf" name="m_ke2" placeholder="Masukan Misi 2" required>
                                </div>
                                <div class="form-group ">
                                    <label>Misi 3</label>
                                    <input id="text" type="text" class="form-control huruf" name="m_ke3" placeholder="Masukan Misi 3" required>
                                </div>
                                <div class="form-group ">
                                    <label>Misi 4</label>
                                    <input id="text" type="text" class="form-control huruf" name="m_ke4" placeholder="Masukan Misi 4" required>
                                </div>
                                <div class="form-group ">
                                    <label>Misi 5</label>
                                    <input id="text" type="text" class="form-control huruf" name="m_ke5" placeholder="Masukan Misi 5" required>
                                </div>
                                <input id="text" type="text" class="form-control huruf" name="o_id" placeholder="Masukan Visi 1" value="<?= isset($tb_organisasi['o_id']) ? $tb_organisasi['o_id'] : '' ?>" hidden required>
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