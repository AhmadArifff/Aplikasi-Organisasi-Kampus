<?= $this->extend('admin/layout/default') ?>
<?= $this->section('title') ?>
<title>Database Edit Users &mdash; ARISYA</title>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Database Users</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Database Users</div>
            <div class="breadcrumb-item"><a href="<?= base_url(); ?>/admin/databaseuser/datauser">Database Users</a></div>
            <div class="breadcrumb-item">Edit User</div>
        </div>
    </div>
</section>
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Register Edit User</h4>
                    </div>

                    <div class="card-body">
                        <?php if (!empty(session()->getFlashdata('error'))) : ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <h4>Periksa Entrian Form</h4>
                                </hr />
                                <?php echo session()->getFlashdata('error'); ?>
                            </div>
                        <?php endif; ?>
                        <form method="post" action="" id="text-editor">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="no" value="<?= $tb_user['u_id'] ?>" />
                            <div class="form-group">
                                <label>Username</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-user"></i>
                                        </div>
                                    </div>
                                    <input id="frist_name" type="text" class="form-control" name="u_username" autofocus placeholder="Masukan Username" value="<?= $tb_user['u_username'] ?>" required>
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
                                        <input type="password" class="form-control pwstrength" data-indicator="pwindicator" name="u_password" placeholder="Masukan Password" required>
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
                                    <!-- <input id="password2" type="password" class="form-control" name="password-confirm" placeholder="Masukan Password Confirmation" required> -->
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Full Name</label>
                                <input id="text" type="text" class="form-control huruf" name="u_fullname" placeholder="Masukan Full Name" value="<?= $tb_user['u_fullname'] ?>" required>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label>Role Akses</label>
                                    <select class="js-example-basic-single" name="u_role" required>
                                        <option value="">--Pilih Role Akses--</option>
                                        <option value="admin" <?= $tb_user['u_role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                                        <option value="owner" <?= $tb_user['u_role'] == 'owner' ? 'selected' : '' ?>>Owner</option>
                                        <option value="coordinator" <?= $tb_user['u_role'] == 'coordinator' ? 'selected' : '' ?>>Coordinator</option>
                                        <option value="anggota" <?= $tb_user['u_role'] == 'anggota' ? 'selected' : '' ?>>Anggota</option>
                                    </select>
                                </div>
                                <div class="form-group col-6">
                                    <label>Upline/Referensi</label>
                                    <select class="js-example-basic-single" name="u_referensi" required>
                                        <option value="">--Pilih Upline/Referensi--</option>
                                        <?php foreach ($datauser as $data) { ?>
                                            <?php if ($tb_user['u_referensi'] == $data['u_id']) {
                                                $selected = $data['u_nama']; ?>
                                                <option value="<?= $tb_user['u_referensi'] ?>" <?= $selected == $data['u_nama'] ? 'selected' : '' ?>><?= $data['u_nama'] ?></option>
                                            <?php }  ?>
                                        <?php } ?>
                                    </select>
                                    <input id="text" type="text" class="form-control" value="<?= $tb_user['u_referensi'] ?>" name="u_referensi" hidden required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input id="email" type="email" class="form-control" name="u_email" placeholder="Masukan Email example@gmail.com" value="<?= $tb_user['u_email'] ?>" required>
                                <div class="invalid-feedback">
                                </div>
                                <input id="text" type="text" class="form-control" value="<?php echo Date('Y-m-d h:i:s'); ?>" name="u_create_at" hidden="true" required>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label>NIK KTP</label>
                                    <input type="text" class="form-control nikktp" placeholder="Masukan NIK KTP" name="u_nik" value="<?= $tb_user['u_nik'] ?>" required>
                                </div>
                                <div class="form-group col-6">
                                    <label>Nama Lengkap KTP</label>
                                    <input type="text" class="form-control huruf" placeholder="Masukan Nama Lengkap KTP" name="u_nama" value="<?= $tb_user['u_nama'] ?>" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label>Tempat Lahir</label>
                                    <input type="text" class="form-control huruf" placeholder="Masukan Tempat Lahir" name="u_tempat_lahir" value="<?= $tb_user['u_tempat_lahir'] ?>" required>
                                </div>
                                <div class="form-group col-6">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="u_tanggal_lahir" value="<?= $tb_user['u_tanggal_lahir'] ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <!-- <input id="frist_name" type="radio" class="form-control" name="u_jenis_kelamin" placeholder="Masukan Username">Laki-laki -->
                                <div class="selectgroup selectgroup-pills">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="u_jenis_kelamin" value="Laki-laki" class="selectgroup-input" required>
                                        <span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-male"></i></span>
                                    </label>
                                    <label style="margin-right: 10%;">Laki-laki</label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="u_jenis_kelamin" value="Perempuan" class="selectgroup-input" required>
                                        <span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-female"></i></span>
                                    </label>
                                    <label>Perempuan</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label>Provinsi</label>
                                    <select class="js-example-basic-single" id="id_provinsi" name="u_provinsi" required>
                                        <option value="">--Pilih Provinsi--</option>
                                        <?php foreach ($provinsi as $tb_provinsi) { ?>
                                            <option value="<?php echo $tb_provinsi['id_provinsi']; ?>"><?php echo $tb_provinsi['nama_provinsi']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-6">
                                    <label>Kabupaten/Kota</label>
                                    <select class="js-example-basic-single" name="u_kota" id="id_kabupaten" required>

                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label>Kecamatan</label>
                                    <select class="js-example-basic-single" name="u_kecamatan" id="id_kecamatan" required>

                                    </select>
                                </div>
                                <div class="form-group col-6">
                                    <label>Kelurahan</label>
                                    <input type="text" class="form-control huruf" placeholder="Masukan Kelurahan" name="u_kelurahan" value="<?= $tb_user['u_kelurahan'] ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Kode Pos</label>
                                <input id="frist_name" type="text" class="form-control kodepos" name="u_kodepos" placeholder="Masukan Kode Pos" value="<?= $tb_user['u_kodepos'] ?>" required>
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
<?= $this->endSection() ?>