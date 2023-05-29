<?= $this->extend('mahasiswa/layout/default') ?>
<?= $this->section('title') ?>
<title>More LK/OK &mdash; ARISYA</title>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>LK/OK</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">LK/OK</div>
            <div class="breadcrumb-item"><a href="<?= base_url(); ?>/Mahasiswa/dataLK-OK">Data LK/OK</a></div>
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
                                            </div>
                                            <div class="card-body">
                                                <p>Sunt in culpa qui officia deserunt mollit anim id est laborum:</p>
                                                <ul>
                                                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</li>
                                                    <li>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</li>

                                                </ul>
                                            </div>
                                            <div class="card-header">
                                                <h4>Misi :</h4>
                                            </div>
                                            <div class="card-body">
                                                <p>Sunt in culpa qui officia deserunt mollit anim id est laborum:</p>
                                                <ul>
                                                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</li>
                                                    <li>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</li>
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
                                            <div class="author-box-left" style="margin-left:50px;">
                                                <img alt="image" src="<?= base_url('LKOK/foto.jpeg') ?>" class="rounded-circle author-box-picture">
                                                <div class="clearfix"></div>
                                                <button class="btn btn-primary mt-3" disable>Ketua</button>
                                            </div>
                                            <div class="author-box-left" style="margin-left:30%;">
                                                <img alt="image" src="<?= base_url('LKOK/foto.jpeg') ?>" class="rounded-circle author-box-picture">
                                                <div class="clearfix"></div>
                                                <button class="btn btn-primary mt-3" disable>Wakil Ketua</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="section-body">
                                <div class="col-12 ">
                                    <div class="card card-danger">
                                        <div class="card-header">
                                            <h4>Staff</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="owl-carousel owl-theme" id="users-carousel">
                                                <div>
                                                    <div class="user-item">
                                                        <img alt="image" src="<?= base_url('assets/img/avatar/avatar-1.png') ?>" class="img-fluid">
                                                        <div class="user-details">
                                                            <div class="user-name">Hasan Basri</div>
                                                            <div class="text-job text-muted">Web Developer</div>
                                                            <div class="user-cta">
                                                                <!-- <button class="btn btn-primary follow-btn" data-follow-action="alert('user1 followed');" data-unfollow-action="alert('user1 unfollowed');">Follow</button> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="user-item">
                                                        <img alt="image" src="<?= base_url('assets/img/avatar/avatar-1.png') ?>" class="img-fluid">
                                                        <div class="user-details">
                                                            <div class="user-name">Kusnaedi</div>
                                                            <div class="text-job text-muted">Mobile Developer</div>
                                                            <div class="user-cta">
                                                                <!-- <button class="btn btn-primary follow-btn" data-follow-action="alert('user2 followed');" data-unfollow-action="alert('user2 unfollowed');">Follow</button> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="user-item">
                                                        <img alt="image" src="<?= base_url('assets/img/avatar/avatar-1.png') ?>" class="img-fluid">
                                                        <div class="user-details">
                                                            <div class="user-name">Bagus Dwi Cahya</div>
                                                            <div class="text-job text-muted">UI Designer</div>
                                                            <div class="user-cta">
                                                                <!-- <button class="btn btn-danger following-btn" data-unfollow-action="alert('user3 unfollowed');" data-follow-action="alert('user3 followed');">Following</button> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="user-item">
                                                        <img alt="image" src="<?= base_url('assets/img/avatar/avatar-1.png') ?>" class="img-fluid">
                                                        <div class="user-details">
                                                            <div class="user-name">Wildan Ahdian</div>
                                                            <div class="text-job text-muted">Project Manager</div>
                                                            <div class="user-cta">
                                                                <!-- <button class="btn btn-primary follow-btn" data-follow-action="alert('user4 followed');" data-unfollow-action="alert('user4 unfollowed');">Follow</button> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="user-item">
                                                        <img alt="image" src="<?= base_url('assets/img/avatar/avatar-1.png') ?>" class="img-fluid">
                                                        <div class="user-details">
                                                            <div class="user-name">Deden Febriansyah</div>
                                                            <div class="text-job text-muted">IT Support</div>
                                                            <div class="user-cta">
                                                                <!-- <button class="btn btn-primary follow-btn" data-follow-action="alert('user5 followed');" data-unfollow-action="alert('user5 unfollowed');">Follow</button> -->
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
            </div>
        </div>
    </div>
    </div>
</section>
<?= $this->endSection() ?>