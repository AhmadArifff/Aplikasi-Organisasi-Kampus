<?= $this->extend('admin/layout/default') ?>
<?= $this->section('title') ?>
<title>Register Anggota LK/OK &mdash; AOU</title>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="section">
    <?= csrf_field(); ?>
    <div class="section-header">
        <h1>Register Anggota LK/OK</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Anggota LK/OK</div>
            <div class="breadcrumb-item"><a href="<?= base_url(); ?>/AdminLK-OK/dataanggotaLK-OK">Data Anggota LK/OK</a></div>
            <div class="breadcrumb-item">Register Anggota LK/OK</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-18">
                <div class="card">
                    <div class="card-header">
                        <h4>Register Anggota LK/OK</h4>
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
                        <form method="post" action="<?= base_url(); ?>/AdminLK-OK/dataanggotaLK-OK/registeranggotaLK-OK/process" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label>Nama Pengguna</label>
                                    <select class="js-example-basic-single" name="u_id" id="u_id" required>
                                        <option value="">--Pilih Nama Pengguna--</option>
                                        <?php foreach ($tb_user as $data) { ?>
                                            <option value="<?php echo $data['u_id']; ?>"><?php echo $data['u_nama']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-6">
                                    <label>Fakultas</label>
                                    <select class="js-example-basic-single" name="p_id" id="p_id" required>
                                    </select>
                                </div>
                                <div class="form-group col-6">
                                    <label>Menjabat Staf</label>
                                    <select class="js-example-basic-single" name="ao_staf" required>
                                        <option value="">--Pilih Staf--</option>
                                        <option value="Ketua">Ketua</option>
                                        <option value="WakilKetua">WakilKetua</option>
                                        <option value="Seketaris">Seketaris</option>
                                        <option value="Bendahara">Bendahara</option>
                                        <option value="PDD">PDD</option>
                                        <option value="ERD">ERD</option>
                                        <option value="Danus">Danus</option>
                                        <option value="Danus">Anggota</option>
                                    </select>
                                </div>
                                <div class="form-group col-6">
                                    <label>Organisasi</label>
                                    <select class="js-example-basic-multiple" name="o_id[]" id="" multiple="multiple" required>
                                        <option value="">--Pilih Organisasi--</option>
                                        <?php foreach ($tb_organisasi as $data) { ?>
                                            <option value="<?php echo $data['o_id']; ?>"><?php echo $data['o_nama']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="">Foto</label>
                                <input type="file" name="ao_foto" class="form-control" id="file" required accept=".jpg, .jpeg, .png" /></p>
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