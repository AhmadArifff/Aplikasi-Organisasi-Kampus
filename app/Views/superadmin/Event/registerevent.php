<?= $this->extend('superadmin/layout/default') ?>
<?= $this->section('title') ?>
<title>Register Event &mdash; AOU</title>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="section">
    <?= csrf_field(); ?>
    <div class="section-header">
        <h1>Register Event</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Event</div>
            <div class="breadcrumb-item"><a href="<?= base_url(); ?>/SuperAdmin/dataevent">Data Event</a></div>
            <div class="breadcrumb-item">Register Event</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-18">
                <div class="card">
                    <div class="card-header">
                        <h4>Register Event</h4>
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
                        <form method="post" action="<?= base_url(); ?>/SuperAdmin/dataevent/registerevent/process" enctype="multipart/form-data">
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
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label>Nama Kegiatan</label>
                                    <input id="text" type="text" class="form-control " name="k_nama" placeholder="Masukan Nama Kegiatan" required>
                                </div>
                                <div class="form-group col-6">
                                    <label>Jenis Kegiatan</label>
                                    <input id="text" type="text" class="form-control " name="k_jeniskegiatan" placeholder="Masukan Jenis Kegiatan" required>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label>Deskripsi Kegiatan</label>
                                <textarea class="form-control" name="k_deskripsikegiatan" id="" rows="3"></textarea>
                            </div>
                            <div class="form-group ">
                                <label for="">Foto</label>
                                <input type="file" name="k_foto" class="form-control" id="file" required accept=".jpg, .jpeg, .png" /></p>
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