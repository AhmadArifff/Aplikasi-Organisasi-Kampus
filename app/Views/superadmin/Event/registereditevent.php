<?= $this->extend('superadmin/layout/default') ?>
<?= $this->section('title') ?>
<title>Edit Event &mdash; ARISYA</title>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="section">
    <?= csrf_field(); ?>
    <div class="section-header">
        <h1>Edit Event</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Event</div>
            <div class="breadcrumb-item"><a href="<?= base_url(); ?>/SuperAdmin/dataevent">Data Event</a></div>
            <div class="breadcrumb-item">Edit Event</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-18">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Event</h4>
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
                        <form method="post" action="" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label>Nama Pengguna</label>
                                    <select class="js-example-basic-single" name="u_id" id="u_id" required>
                                        <option value="">--Pilih Nama Pengguna--</option>
                                        <?php foreach ($tb_user as $data) { ?>
                                            <option value="<?php echo $data['u_id']; ?>" <?= $data['u_id'] == $tb_kegiatan['u_id'] ? 'selected' : '' ?>><?php echo $data['u_nama']; ?></option>
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
                                    <input id="text" type="text" class="form-control " name="k_nama" placeholder="Masukan Nama Kegiatan" value="<?= $tb_kegiatan['k_nama'] ?>" required>
                                </div>
                                <div class="form-group col-6">
                                    <label>Jenis Kegiatan</label>
                                    <input id="text" type="text" class="form-control " name="k_jeniskegiatan" placeholder="Masukan Jenis Kegiatan" value="<?= $tb_kegiatan['k_jeniskegiatan'] ?>" required>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label>Deskripsi Kegiatan</label>
                                <textarea class="form-control" name="k_deskripsikegiatan" id="" rows="3"><?= $tb_kegiatan['k_deskripsikegiatan'] ?></textarea>
                            </div>
                            <div class="form-group ">
                                <label for="">Foto</label>
                                <input type="file" name="k_foto" class="form-control" id="file" accept=".jpg, .jpeg, .png" /></p>
                            </div>
                            <div class="form-group">
                                <label for="">Preview Foto Event Sebelumnya</label>
                                <img src="<?= base_url('Event/' . $tb_kegiatan['k_foto']) ?>" id="gambar_load" style="border-radius: 5px;" class="form-control h-auto" height="100%"></p>
                                <input id="" type="text" class="form-control" name="preview" placeholder="" value="<?= $tb_kegiatan['k_foto'] ?>" hidden>
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
                    Copyright &copy; Arisya 2023
                </div>
            </div>
        </div>
    </div>
</section>
<script>
</script>
<?= $this->endSection() ?>