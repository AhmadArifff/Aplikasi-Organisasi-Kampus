<?= $this->extend('superadmin/layout/default') ?>
<?= $this->section('title') ?>
<title>More LK/OK &mdash; AOU</title>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>LK/OK</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">LK/OK</div>
            <div class="breadcrumb-item"><a href="<?= base_url(); ?>/SuperAdmin/dataLK-OK">Data LK/OK</a></div>
            <div class="breadcrumb-item">More LK/OK</div>
        </div>
    </div>
</section>
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card ">
                    <div class="card-header">
                        <h4>More LK/OK</h4>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <div class="section-body">
                                <div class="row" style="margin-left:10px">
                                    <div class="col-12">
                                        <div class="card bg-light">
                                            <div class="card-header">
                                                <h4>Visi :</h4>
                                                <div class="card-header-action">
                                                    <?php
                                                    $found = false;
                                                    foreach ($tb_visi as $item_visi) {
                                                        if ($tb_organisasi['o_id'] == $item_visi['o_id']) {
                                                            $found = true;
                                                            break;
                                                        }
                                                    }

                                                    if (!$found) { ?>
                                                        <a href="<?= base_url('SuperAdmin/morelkok/visi/' . $tb_organisasi['o_id'] . '/register') ?>" class="btn btn-primary btn-sm h-100"><i class="fas fa-plus"></i></a>
                                                    <?php } else { ?>
                                                        <a href="<?= base_url('SuperAdmin/morelkok/visi/' . $item_visi['o_id'] . '/edit') ?>" class="btn btn-warning btn-sm h-100"><i class="fas fa-pencil-alt"></i></a>
                                                    <?php } ?>
                                                </div>

                                            </div>
                                            <div class="card-body">
                                                <!-- <p>Sunt in culpa qui officia deserunt mollit anim id est laborum:</p> -->
                                                <ul>
                                                    <?php foreach ($tb_visi as $item_visi) {
                                                        if ($tb_organisasi['o_id'] == $item_visi['o_id']) {
                                                            if (empty($item_visi['v_ke1'])) {
                                                            } else { ?>
                                                                <li><?= $item_visi['v_ke1'] ?></li>
                                                            <?php } ?>
                                                            <?php if (empty($item_visi['v_ke2'])) {
                                                            } else { ?>
                                                                <li><?= $item_visi['v_ke2'] ?></li>
                                                            <?php } ?>
                                                            <?php if (empty($item_visi['v_ke3'])) {
                                                            } else { ?>
                                                                <li><?= $item_visi['v_ke3'] ?></li>
                                                            <?php } ?>
                                                            <?php if (empty($item_visi['v_ke4'])) {
                                                            } else { ?>
                                                                <li><?= $item_visi['v_ke4'] ?></li>
                                                            <?php } ?>
                                                            <?php if (empty($item_visi['v_ke5'])) {
                                                            } else { ?>
                                                                <li><?= $item_visi['v_ke5'] ?></li>
                                                            <?php } ?>

                                                    <?php }
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                            <div class="card-header">
                                                <h4>Misi :</h4>
                                                <div class="card-header-action">
                                                    <?php
                                                    $found = false;
                                                    foreach ($tb_misi as $item_misi) {
                                                        if ($tb_organisasi['o_id'] == $item_misi['o_id']) {
                                                            $found = true;
                                                            break;
                                                        }
                                                    }

                                                    if (!$found) { ?>
                                                        <a href="<?= base_url('SuperAdmin/morelkok/misi/' . $tb_organisasi['o_id'] . '/register') ?>" class="btn btn-primary btn-sm h-100"><i class="fas fa-plus"></i></a>
                                                    <?php } else { ?>
                                                        <a href="<?= base_url('SuperAdmin/morelkok/misi/' . $item_misi['o_id'] . '/edit') ?>" class="btn btn-warning btn-sm h-100"><i class="fas fa-pencil-alt"></i></a>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <!-- <p>Sunt in culpa qui officia deserunt mollit anim id est laborum:</p> -->
                                                <ul>
                                                    <?php foreach ($tb_misi as $item_misi) {
                                                        if ($tb_organisasi['o_id'] == $item_misi['o_id']) {
                                                            if (empty($item_misi['m_ke1'])) {
                                                            } else { ?>
                                                                <li><?= $item_misi['m_ke1'] ?></li>
                                                            <?php } ?>
                                                            <?php if (empty($item_misi['m_ke2'])) {
                                                            } else { ?>
                                                                <li><?= $item_misi['m_ke2'] ?></li>
                                                            <?php } ?>
                                                            <?php if (empty($item_misi['m_ke3'])) {
                                                            } else { ?>
                                                                <li><?= $item_misi['m_ke3'] ?></li>
                                                            <?php } ?>
                                                            <?php if (empty($item_misi['m_ke4'])) {
                                                            } else { ?>
                                                                <li><?= $item_misi['m_ke4'] ?></li>
                                                            <?php } ?>
                                                            <?php if (empty($item_misi['m_ke5'])) {
                                                            } else { ?>
                                                                <li><?= $item_misi['m_ke5'] ?></li>
                                                            <?php } ?>

                                                    <?php }
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-6">
                            <div class="section-body">
                                <div class="col-12 ">
                                    <div class="card author-box card-primary">
                                        <div class="card-body">
                                            <?php
                                            foreach ($tb_pengambilanorganisasi as $pengambilanorganisasi) {
                                                if ($tb_organisasi['o_id'] == $pengambilanorganisasi['o_id']) {
                                                    $ao_id = $pengambilanorganisasi['ao_id'];
                                                    foreach ($tb_anggotaorganisasi as $anggotaorganisasi) {
                                                        if ($ao_id == $anggotaorganisasi['ao_id']) {
                                                            foreach ($tb_user as $user) {
                                                                if ($anggotaorganisasi['u_id'] == $user['u_id']) {
                                                                    if ($anggotaorganisasi['ao_staf'] == "Ketua") {

                                            ?>
                                                                        <div class="author-box-left" style="margin-left:50px;">
                                                                            <img alt="image" src="<?= base_url('Anggota-LKOK/' . $anggotaorganisasi['ao_foto']) ?>" style="margin-top: 10px; aspect-ratio: 3/3; " class="rounded-circle author-box-picture">
                                                                            <div class="clearfix"></div>
                                                                            <b>
                                                                                <div class="user-name mt-2"><?= $user['u_nama'] ?></div>
                                                                            </b>
                                                                            <div class="text-job text-muted mt-1"><?= $anggotaorganisasi['ao_staf'] ?></div>
                                                                        </div>
                                                                    <?php
                                                                    }
                                                                    if ($anggotaorganisasi['ao_staf'] == "WakilKetua") {
                                                                    ?>
                                                                        <div class="author-box-left" style="margin-left:30%;">
                                                                            <img alt="image" src="<?= base_url('Anggota-LKOK/' . $anggotaorganisasi['ao_foto']) ?>" style="margin-top: 10px;  aspect-ratio: 3/3; ; " class="rounded-circle author-box-picture">
                                                                            <div class="clearfix"></div>
                                                                            <b>
                                                                                <div class="user-name mt-2"><?= $user['u_nama'] ?></div>
                                                                            </b>
                                                                            <div class="text-job text-muted mt-1"><?= $anggotaorganisasi['ao_staf'] ?></div>
                                                                        </div>
                                            <?php
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                            ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="section-body"></div>
                            <div class="col-12 ">
                                <div class="card card-danger">
                                    <div class="card-header">
                                        <h4>Staff</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="owl-carousel owl-theme" id="users-carousel">
                                            <?php
                                            foreach ($tb_pengambilanorganisasi as $pengambilanorganisasi) {
                                                if ($tb_organisasi['o_id'] == $pengambilanorganisasi['o_id']) {
                                                    $ao_id = $pengambilanorganisasi['ao_id'];
                                                    foreach ($tb_anggotaorganisasi as $anggotaorganisasi) {
                                                        if ($ao_id == $anggotaorganisasi['ao_id']) {
                                                            foreach ($tb_user as $user) {
                                                                if ($anggotaorganisasi['u_id'] == $user['u_id']) {
                                                                    if ($anggotaorganisasi['ao_staf'] != "Ketua" && $anggotaorganisasi['ao_staf'] != "WakilKetua") {
                                                                        $nama = $user['u_nama'];
                                                                        $foto =  $anggotaorganisasi['ao_foto'];
                                                                        $staf = $anggotaorganisasi['ao_staf'];

                                                                        // Tampilkan data anggota organisasi di sini
                                            ?>
                                                                        <div>
                                                                            <div class="user-item">
                                                                                <img alt="image" src="<?= base_url('Anggota-LKOK/' . $foto) ?>" style="aspect-ratio: 3/2; object-fit: contain ; " class="img-fluid">
                                                                                <div class="user-details">
                                                                                    <div class="user-name"><?= $nama ?></div>
                                                                                    <div class="text-job text-muted"><?= $staf ?></div>
                                                                                    <div class="user-cta">
                                                                                        <!-- <button class="btn btn-primary follow-btn" data-follow-action="alert('user1 followed');" data-unfollow-action="alert('user1 unfollowed');">Follow</button> -->
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                            <?php
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                            ?>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>
<?= $this->endSection() ?>