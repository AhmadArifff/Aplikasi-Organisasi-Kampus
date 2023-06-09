<?= $this->extend('superadmin/layout/default') ?>
<?= $this->section('title') ?>
<title>Edit Users&mdash; AOU</title>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Users</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Users</div>
            <div class="breadcrumb-item"><a href="<?= base_url(); ?>/SuperAdmin/datauser">Data Users</a></div>
            <div class="breadcrumb-item">Edit Users</div>
        </div>
    </div>
</section>
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Edit User</h4>
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
                            <div class="form-group">
                                <label>NPM</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-user"></i>
                                        </div>
                                    </div>
                                    <input id="frist_name" type="text" class="form-control npm" name="u_npm" autofocus placeholder="Masukan NPM" value="<?= $tb_user['u_npm'] ?>" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label class="d-block">Password</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-lock"></i>
                                            </div>
                                        </div>
                                        <input type="password" class="form-control pwstrength" data-indicator="pwindicator" name="u_password" placeholder="Masukkan Password" required>
                                    </div>
                                    <div id="pwindicator" class="pwindicator">
                                        <div class="bar"></div>
                                        <div class="label"></div>
                                    </div>
                                    <!-- <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="u_password" placeholder="Masukan Password" required> -->
                                </div>
                                <div class="form-group col-6">
                                    <label class="d-block">Password Confirmation</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-lock"></i>
                                            </div>
                                        </div>
                                        <input type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password-confirm" placeholder="Masukan Password Confirmation" required>
                                    </div>
                                    <div id="pwindicator" class="pwindicator">
                                        <div class="bar"></div>
                                        <div class="label"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label>Nama Lengkap</label>
                                    <input id="text" type="text" class="form-control huruf" name="u_nama" placeholder="Masukan Nama Lengkap" value="<?= $tb_user['u_nama'] ?>" required>
                                </div>
                                <div class="form-group col-6">
                                    <label>Role Akses</label>
                                    <select class="js-example-basic-single" name="u_role" required>
                                        <option value="">--Pilih Role Akses--</option>
                                        <option value="AdminLK/OK" <?= $tb_user['u_role'] == 'AdminLK/OK' ? 'selected' : '' ?>>Admin LK/OK</option>
                                        <option value="Mahasiswa" <?= $tb_user['u_role'] == 'Mahasiswa' ? 'selected' : '' ?>>Mahasiswa</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label>Jenis Kelamin</label>
                                    <div class="selectgroup selectgroup-pills">
                                        <label class="selectgroup-item">
                                            <input type="radio" name="u_gender" value="Laki-laki" class="selectgroup-input" <?= $tb_user['u_gender'] == 'Laki-laki' ? 'checked' : '' ?> required>
                                            <span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-male"></i></span>
                                        </label>
                                        <label style="margin-right: 10%;">Laki-laki</label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="u_gender" value="Perempuan" class="selectgroup-input" <?= $tb_user['u_gender'] == 'Perempuan' ? 'checked' : '' ?> required>
                                            <span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-female"></i></span>
                                        </label>
                                        <label>Perempuan</label>
                                    </div>
                                </div>

                                <div class="form-group col-6">
                                    <label>Nama Prodi</label>
                                    <select class="js-example-basic-single" name="u_prodi" required>
                                        <option value="">--Pilih Nama Prodi--</option>
                                        <?php foreach ($tb_prodi as $data) { ?>
                                            <option value="<?php echo $data['p_id']; ?>" <?= $data['p_id'] == $tb_user['u_prodi'] ? 'selected' : '' ?>><?php echo $data['p_nama']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label>Angkatan</label>
                                    <input id="frist_name" type="text" class="form-control angkatan" name="u_angkatan" placeholder="Masukan Angkatan" value="<?= $tb_user['u_angkatan'] ?>" required>
                                </div>
                                <div class="form-group col-6">
                                    <label>Alamat</label>
                                    <textarea class="form-control" name="u_alamat" id="" rows="3"><?= $tb_user['u_alamat'] ?></textarea>
                                </div>
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