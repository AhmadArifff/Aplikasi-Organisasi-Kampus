<?= $this->extend('admin/layout/default') ?>
<?= $this->section('title') ?>
<title>Edit Anggota LK/OK &mdash; ARISYA</title>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="section">
    <?= csrf_field(); ?>
    <div class="section-header">
        <h1>Edit Anggota LK/OK</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Anggota LK/OK</div>
            <div class="breadcrumb-item"><a href="<?= base_url(); ?>/AdminLK-OK/dataanggotaLK-OK">Data Anggota LK/OK</a></div>
            <div class="breadcrumb-item">Edit Anggota LK/OK</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-18">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Anggota LK/OK</h4>
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
                                            <option value="<?php echo $data['u_id']; ?>" <?= $data['u_id'] == $tb_anggotaorganisasi['u_id'] ? 'selected' : '' ?>><?php echo $data['u_nama']; ?></option>
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
                                        <option value="Ketua" <?= $tb_anggotaorganisasi['ao_staf'] == 'Ketua' ? 'selected' : '' ?>>Ketua</option>
                                        <option value="WakilKetua" <?= $tb_anggotaorganisasi['ao_staf'] == 'WakilKetua' ? 'selected' : '' ?>>WakilKetua</option>
                                        <option value="Seketaris" <?= $tb_anggotaorganisasi['ao_staf'] == 'Seketaris' ? 'selected' : '' ?>>Seketaris</option>
                                        <option value="Bendahara" <?= $tb_anggotaorganisasi['ao_staf'] == 'Bendahara' ? 'selected' : '' ?>>Bendahara</option>
                                        <option value="PDD" <?= $tb_anggotaorganisasi['ao_staf'] == 'PDD' ? 'selected' : '' ?>>PDD</option>
                                        <option value="ERD" <?= $tb_anggotaorganisasi['ao_staf'] == 'ERD' ? 'selected' : '' ?>>ERD</option>
                                        <option value="Danus" <?= $tb_anggotaorganisasi['ao_staf'] == 'Danus' ? 'selected' : '' ?>>Danus</option>
                                        <option value="Danus" <?= $tb_anggotaorganisasi['ao_staf'] == 'Anggota' ? 'selected' : '' ?>>Anggota</option>
                                    </select>
                                </div>
                                <div class="form-group col-6">
                                    <label>Organisasi</label>
                                    <select class="js-example-basic-multiple" name="o_id[]" id="" multiple="multiple" required>
                                        <option value="">--Pilih Organisasi--</option>
                                        <?php foreach ($tb_organisasi as $data) {
                                            $tampil = '';
                                            $is_item_found = false;
                                            foreach ($tb_pengambilan_organisasi as $data_pengambilan_organisasi) {
                                                if ($tb_anggotaorganisasi['ao_id'] == $data_pengambilan_organisasi['ao_id']) {
                                                    $o_id = $data_pengambilan_organisasi['o_id'];
                                                    if ($o_id == $data['o_id']) {
                                                        $tampil = $data['o_nama'];
                                                        $is_item_found = true;
                                                        break;
                                                    }
                                                }
                                            }
                                            if (!$is_item_found) { ?>
                                                <option value="<?= $data['o_id'] ?>"><?= $data['o_nama'] ?></option>
                                            <?php } else { ?>
                                                <option value="<?= $data['o_id'] ?>" selected><?= $tampil ?></option>
                                        <?php }
                                        } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="">Foto</label>
                                <input type="file" name="ao_foto" class="form-control" id="file" accept=".jpg, .jpeg, .png" /></p>
                            </div>
                            <div class="form-group">
                                <label for="">Preview Foto Pengguna Sebelumnya</label>
                                <img src="<?= base_url('Anggota-LKOK/' . $tb_anggotaorganisasi['ao_foto']) ?>" id="gambar_load" style="border-radius: 5px;" class="form-control h-auto" height="100%"></p>
                                <input id="" type="text" class="form-control" name="preview" placeholder="" value="<?= $tb_anggotaorganisasi['ao_foto'] ?>" hidden>
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