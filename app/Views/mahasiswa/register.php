<?= $this->extend('coordinator/layout/default') ?>
<?= $this->section('title') ?>
<title>Forms Register &mdash; ARISYA</title>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Forms Register</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Forms Register</div>
            <div class="breadcrumb-item"><a href="#">Register User</a></div>
        </div>
    </div>
</section>
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Register User</h4>
                    </div>

                    <div class="card-body">
                        <?php if (!empty(session()->getFlashdata('error'))) : ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <h4>Periksa Entrian Form</h4>
                                </hr />
                                <?php echo session()->getFlashdata('error'); ?>
                            </div>
                        <?php endif; ?>
                        <form method="post" action="<?= base_url(); ?>/coordinator/formsregister/registeruser/process">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <label for="frist_name">Username</label>
                                <input id="frist_name" type="text" class="form-control" name="u_username" autofocus placeholder="Masukan Username" required>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="password" class="d-block">Password</label>
                                    <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="u_password" placeholder="Masukan Password" required>
                                </div>
                                <div class="form-group col-6">
                                    <label for="password2" class="d-block">Password Confirmation</label>
                                    <input id="password2" type="password" class="form-control" name="password-confirm" placeholder="Masukan Password Confirmation" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="text">Full Name</label>
                                <input id="text" type="text" class="form-control" name="u_fullname" placeholder="Masukan Full Name" required>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label>Role Akses</label>
                                    <select class="form-control selectric" name="u_role" required>
                                        <option value="coordinator">Coordinator</option>
                                        <option value="anggota">Anggota</option>
                                    </select>
                                </div>
                                <div class="form-group col-6">
                                    <label>Upline</label>
                                    <select class="form-control selectric" name="referensi" disabled>
                                        <option value="<?= session()->get('u_id'); ?>"><?= session()->get('u_fullname'); ?></option>
                                    </select>
                                    <input id="text" type="text" class="form-control" value="<?php echo session()->get('u_id'); ?>" name="u_referensi" hidden required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="u_email" placeholder="Masukan Email" required>
                                <div class="invalid-feedback">
                                </div>
                                <input id="text" type="text" class="form-control" value="<?php echo Date('Y-m-d h:i:s'); ?>" name="u_create_at" hidden="true" required>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label>NIK KTP</label>
                                    <input type="text" class="form-control" placeholder="Masukan NIK KTP" name="u_nik" required>
                                </div>
                                <div class="form-group col-6">
                                    <label>Nama Lengkap KTP</label>
                                    <input type="text" class="form-control" placeholder="Masukan Nama Lengkap KTP" name="u_nama" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label>Tempat Lahir</label>
                                    <input type="text" class="form-control" placeholder="Masukan Tempat Lahir" name="u_tempat_lahir" required>
                                </div>
                                <div class="form-group col-6">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="u_tanggal_lahir" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="frist_name">Jenis Kelamin</label>
                                <!-- <input id="frist_name" type="radio" class="form-control" name="u_jenis_kelamin" placeholder="Masukan Username">Laki-laki -->
                                <div class="selectgroup selectgroup-pills">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="u_jenis_kelamin" value="Laki-laki" class="selectgroup-input" required>
                                        <span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-male"></i></span>
                                    </label>
                                    <label for="Laki-laki" style="margin-right: 10%;">Laki-laki</label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="u_jenis_kelamin" value="Perempuan" class="selectgroup-input" required>
                                        <span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-female"></i></span>
                                    </label>
                                    <label for="Perempuan">Perempuan</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label>Provinsi</label>
                                    <input type="text" class="form-control" placeholder="Masukan Provinsi" name="u_provinsi" required>
                                </div>
                                <div class="form-group col-6">
                                    <label>Kota</label>
                                    <input type="text" class="form-control" placeholder="Masukan Kota" name="u_kota" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label>Kelurahan</label>
                                    <input type="text" class="form-control" placeholder="Masukan Kelurahan" name="u_kelurahan" required>
                                </div>
                                <div class="form-group col-6">
                                    <label>Kecamatan</label>
                                    <input type="text" class="form-control" placeholder="Masukan Kecamatan" name="u_kecamatan" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="frist_name">Kode Pos</label>
                                <input id="frist_name" type="text" class="form-control" name="u_kodepos" placeholder="Masukan Kode Pos" required>
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