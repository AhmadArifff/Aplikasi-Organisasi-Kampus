<?= $this->extend('superadmin/layout/default') ?>
<?= $this->section('title') ?>
<title>Register Visi &mdash; AOU</title>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Visi</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Visi</div>
            <div class="breadcrumb-item"><a href="<?= base_url('SuperAdmin/morelkok/' . $tb_organisasi['o_id']); ?>">More LK/OK</a></div>
            <div class="breadcrumb-item">Register Visi</div>
        </div>
    </div>
</section>
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Register Visi</h4>
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
                        <form method="post" action="<?= base_url(); ?>/SuperAdmin/morelkok/visi/registerproses">
                            <?= csrf_field(); ?>
                            <div class="row">
                                <div class="form-group ">
                                    <label>Visi 1</label>
                                    <input id="text" type="text" class="form-control huruf" name="v_ke1" placeholder="Masukan Visi 1" required>
                                </div>
                                <div class="form-group ">
                                    <label>Visi 2</label>
                                    <input id="text" type="text" class="form-control huruf" name="v_ke2" placeholder="Masukan Visi 2" required>
                                </div>
                                <div class="form-group ">
                                    <label>Visi 3</label>
                                    <input id="text" type="text" class="form-control huruf" name="v_ke3" placeholder="Masukan Visi 3" required>
                                </div>
                                <div class="form-group ">
                                    <label>Visi 4</label>
                                    <input id="text" type="text" class="form-control huruf" name="v_ke4" placeholder="Masukan Visi 4" required>
                                </div>
                                <div class="form-group ">
                                    <label>Visi 5</label>
                                    <input id="text" type="text" class="form-control huruf" name="v_ke5" placeholder="Masukan Visi 5" required>
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