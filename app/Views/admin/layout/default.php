<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <?= $this->renderSection('title') ?>
    <link rel="icon" type="image/x-icon" href="<?= base_url() ?>/assets/img/logo/favicon.ico">
    <!-- getboostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/modules/@fortawesome/fontawesome-free/css/all.min.css">
    <!-- select search -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/select2.min.css">
    <!-- Yeti login -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/meyer-reset-login-yeti.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/style-login-yeti.css">

    <!-- CSS Libraries -->
    <!-- <link rel="stylesheet" href="<?= base_url() ?>/assets/modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/modules/weathericons/css/weather-icons.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/modules/weathericons/css/weather-icons-wind.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/modules/summernote/dist/summernote-bs4.css"> -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css">

    <!-- CSS Advanced Forms -->
    <!-- <link rel="stylesheet" href="<?= base_url() ?>/assets/modules/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/modules/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/modules/selectric/public/selectric.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css"> -->


    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/components.css">
    <!-- Start GA -->
    <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script> -->
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
    <?= csrf_field(); ?>
    <style>
        #text-color-plus {
            color: green;
        }

        #text-color-min {
            color: red;
        }

        #myTable th {
            text-align: center;
        }

        #myTable th,
        #myTable td {
            width: auto;
            white-space: nowrap;
            /* untuk menghindari baris baru pada isi tabel */
        }

        #myTable {
            /* table-layout: fixed; */
            table-layout: auto;
            /* width: 100%; */
        }
    </style>
</head>

<body>
    <?= csrf_field(); ?>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                        <!-- <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li> -->
                    </ul>
                    <!-- <div class="search-element">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
                        <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                        <div class="search-backdrop"></div>
                        <div class="search-result">
                            <div class="search-header">
                                Histories
                            </div>
                            <div class="search-item">
                                <a href="#">How to hack NASA using CSS</a>
                                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                            </div>
                            <div class="search-item">
                                <a href="#">Kodinger.com</a>
                                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                            </div>
                            <div class="search-item">
                                <a href="#">#Arisya</a>
                                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                            </div>
                            <div class="search-header">
                                Result
                            </div>
                            <div class="search-item">
                                <a href="#">
                                    <img class="mr-3 rounded" width="30" src="<?= base_url() ?>/assets/img/products/product-3-50.png" alt="product">
                                    oPhone S9 Limited Edition
                                </a>
                            </div>
                            <div class="search-item">
                                <a href="#">
                                    <img class="mr-3 rounded" width="30" src="<?= base_url() ?>/assets/img/products/product-2-50.png" alt="product">
                                    Drone X2 New Gen-7
                                </a>
                            </div>
                            <div class="search-item">
                                <a href="#">
                                    <img class="mr-3 rounded" width="30" src="<?= base_url() ?>/assets/img/products/product-1-50.png" alt="product">
                                    Headphone Blitz
                                </a>
                            </div>
                            <div class="search-header">
                                Projects
                            </div>
                            <div class="search-item">
                                <a href="#">
                                    <div class="search-icon bg-danger text-white mr-3">
                                        <i class="fas fa-code"></i>
                                    </div>
                                    Stisla Admin Template
                                </a>
                            </div>
                            <div class="search-item">
                                <a href="#">
                                    <div class="search-icon bg-primary text-white mr-3">
                                        <i class="fas fa-laptop"></i>
                                    </div>
                                    Create a new Homepage Design
                                </a>
                            </div>
                        </div>
                    </div> -->
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-envelope"></i></a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right">
                            <div class="dropdown-header">Messages
                                <div class="float-right">
                                    <!-- <a href="#">Mark All As Read</a> -->
                                </div>
                            </div>
                            <div class="dropdown-list-content dropdown-list-icons">
                                <!-- <a href="#" class="dropdown-item dropdown-item-unread">
                                    <div class="dropdown-item-avatar">
                                        <img alt="image" src="<?= base_url() ?>/assets/img/avatar/avatar-1.png" class="rounded-circle">
                                        <div class="is-online"></div>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        <b>Kusnaedi</b>
                                        <p>Hello, Bro!</p>
                                        <div class="time">10 Hours Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item dropdown-item-unread">
                                    <div class="dropdown-item-avatar">
                                        <img alt="image" src="<?= base_url() ?>/assets/img/avatar/avatar-2.png" class="rounded-circle">
                                    </div>
                                    <div class="dropdown-item-desc">
                                        <b>Dedik Sugiharto</b>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                        <div class="time">12 Hours Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item dropdown-item-unread">
                                    <div class="dropdown-item-avatar">
                                        <img alt="image" src="<?= base_url() ?>/assets/img/avatar/avatar-3.png" class="rounded-circle">
                                        <div class="is-online"></div>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        <b>Agung Ardiansyah</b>
                                        <p>Sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        <div class="time">12 Hours Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <div class="dropdown-item-avatar">
                                        <img alt="image" src="<?= base_url() ?>/assets/img/avatar/avatar-4.png" class="rounded-circle">
                                    </div>
                                    <div class="dropdown-item-desc">
                                        <b>Ardian Rahardiansyah</b>
                                        <p>Duis aute irure dolor in reprehenderit in voluptate velit ess</p>
                                        <div class="time">16 Hours Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <div class="dropdown-item-avatar">
                                        <img alt="image" src="<?= base_url() ?>/assets/img/avatar/avatar-5.png" class="rounded-circle">
                                    </div>
                                    <div class="dropdown-item-desc">
                                        <b>Alfa Zulkarnain</b>
                                        <p>Exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                                        <div class="time">Yesterday</div>
                                    </div>
                                </a> -->
                                <?php
                                $current_time = time();
                                foreach ($AlertLogCicilan as $tb_log_cicilan) {
                                    $transaksi_time = strtotime($tb_log_cicilan['created_at']);
                                    $waktu = $current_time - strtotime($tb_log_cicilan['created_at']);
                                    $hari = floor($waktu / (3600 * 24));
                                    $jam = floor(($waktu % (3600 * 24)) / 3600);
                                    $menit = floor(($waktu % 3600) / 60);
                                    foreach ($NotipDatacicilan as $tb_cicilan) {
                                        $c_id = $tb_cicilan['c_id'];
                                        if ($c_id == $tb_log_cicilan['c_id']) {
                                            $u_created_at = $tb_log_cicilan['created_at'];
                                            $waktusekarang = $current_time - strtotime($u_created_at);
                                            $alerthari = floor($waktu / (3600 * 24));
                                            if ($alerthari >= 1 && $alerthari <= 59) { ?>
                                                <div class="dropdown-item">
                                                    <div class="dropdown-item-icon bg-danger text-white">
                                                        <i class="fas fa-exclamation-triangle"></i>
                                                    </div>
                                                    <div class="dropdown-item-desc">
                                                        <?php foreach ($NotipDataUser as $tb_user) {
                                                            if ($tb_log_cicilan['u_id'] == $tb_user['u_id']) {
                                                                $c_id_log_cicilan = $tb_log_cicilan['c_id'];
                                                                if ($c_id == $c_id_log_cicilan) {
                                                                    $p_id = $tb_cicilan['p_id'];
                                                                    $pe_id = $tb_cicilan['pe_id'];
                                                                    foreach ($NotipDataPeriode as $tb_pay_periode) {
                                                                        if ($pe_id == $tb_pay_periode['pe_id']) {
                                                                            $pe_periode = $tb_pay_periode['pe_periode'];
                                                                            foreach ($NotipDataPaket as $tb_paket) {
                                                                                if ($p_id == $tb_paket['p_id']) { ?>
                                                                                    <?= strtoupper('<b style="font-weight: bold; font-size: 13px;">' . $tb_user['u_nama']) . '</b> yang mengambil paket <b style="font-weight: bold; font-size: 13px;">' . $tb_paket['p_nama'] . '</b>, dengan jumlah bayar setoran sebesar Rp. <b style="font-weight: bold; font-size: 13px;">' .  number_format($tb_paket['p_setoran'], 2, ',', '.')  . '</b> sisa periode pembayaran sebanyak  <b style="font-weight: bold; font-size: 13px;">' . $tb_cicilan['c_cicilan_outstanding'] . '</b> <b style="font-weight: bold; font-size: 13px;">' . $tb_pay_periode['pe_nama'] . "</b> telah menunggak selama " . '<b style="font-weight: bold; font-size: 13px;">' . $alerthari . ' hari</b>'; ?>
                                                        <?php }
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        } ?>
                                                        <div class="time"><?= $hari . " hari," . $jam . " jam," . $menit . " menit yang lalu" ?></div>
                                                    </div>
                                                </div>
                                        <?php }
                                        }
                                        ?>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                            <div class="dropdown-footer text-center">
                                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right">
                            <div class="dropdown-header">Notifications
                                <!-- <div class="float-right">
                                    <a href="#">Mark All As Read</a>
                                </div> -->
                            </div>
                            <div class="dropdown-list-content dropdown-list-icons">
                                <!-- <a href="#" class="dropdown-item dropdown-item-unread">
                                    <div class="dropdown-item-icon bg-primary text-white">
                                        <i class="fas fa-code"></i>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        Template update is available now!
                                        <div class="time text-primary">2 Min Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <div class="dropdown-item-icon bg-info text-white">
                                        <i class="far fa-user"></i>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        <b>You</b> and <b>Dedik Sugiharto</b> are now friends
                                        <div class="time">10 Hours Ago</div>
                                    </div>
                                </a> -->
                                <!-- <a href="#" class="dropdown-item">
                                    <div class="dropdown-item-icon bg-success text-white">
                                        <i class="fas fa-receipt"></i>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        <b>Kusnaedi</b> has moved task <b>Fix bug header</b> to <b>Done</b>
                                        <div class="time">12 Hours Ago</div>
                                    </div>
                                </a> -->
                                <!-- Data approved transaksi -->
                                <?php $current_time = time();
                                foreach ($NotipDataTransaksi as $tb_transaksi) {
                                    $transaksi_time = strtotime($tb_transaksi['waktu']);
                                    $waktu = $current_time - strtotime($tb_transaksi['waktu']);
                                    $hari = floor($waktu / (3600 * 24));
                                    $jam = floor(($waktu % (3600 * 24)) / 3600);
                                    $menit = floor(($waktu % 3600) / 60);
                                    $approved = $tb_transaksi['t_approval_by'];
                                    if ($approved == null) { ?>
                                        <div class="dropdown-item">
                                            <?php if ($approved != null) {
                                                if ($approved != null) {
                                                } else {
                                            ?>
                                                    <div class="dropdown-item-icon bg-success text-white">
                                                        <i class="fas fa-check"></i>
                                                    </div>
                                                    <div class="dropdown-item-desc">
                                                        <?php foreach ($NotipDataUser as $tb_user) {
                                                            if ($tb_transaksi['u_id'] == $tb_user['u_id']) { ?>
                                                                <?php foreach ($NotipDataPaket as $tb_paket) {
                                                                    if ($tb_transaksi['p_id'] == $tb_paket['p_id']) { ?>
                                                                        <?= strtoupper('<b style="font-weight: bold; font-size: 13px;">' . $tb_user['u_nama']) . '</b> telah mengambil paket <b style="font-weight: bold; font-size: 13px;">' . $tb_paket['p_nama'] . '</b>, dengan jumlah <b style="font-weight: bold; font-size: 13px;">' . $tb_transaksi['t_qty'] . "</b> paket."; ?>
                                                        <?php }
                                                                }
                                                            }
                                                        } ?>
                                                        <div class="time"><a href="<?= base_url('admin/datatransaksi/noapprovedtransaksi/' . $tb_transaksi['t_id'] . '/noapproved') ?>" class="btn btn-primary btn-sm" disabled>Telah Disetujui</a></div>
                                                        <div class="time"><?= $hari . " hari, " . $jam . " jam, " . $menit . " menit yang lalu" ?></div>

                                                    </div>
                                                <?php }
                                            } else { ?>
                                                <div class="dropdown-item-icon bg-danger text-white">
                                                    <i class="fas fa-exclamation-triangle"></i>
                                                </div>
                                                <div class="dropdown-item-desc">
                                                    <?php foreach ($NotipDataUser as $tb_user) {
                                                        if ($tb_transaksi['u_id'] == $tb_user['u_id']) { ?>
                                                            <?php foreach ($NotipDataPaket as $tb_paket) {
                                                                if ($tb_transaksi['p_id'] == $tb_paket['p_id']) { ?>
                                                                    <?= strtoupper('<b style="font-weight: bold; font-size: 13px;">' . $tb_user['u_nama']) . '</b> telah mengambil paket <b style="font-weight: bold; font-size: 13px;">' . $tb_paket['p_nama'] . '</b>, dengan jumlah <b style="font-weight: bold; font-size: 13px;">' . $tb_transaksi['t_qty'] . "</b> paket."; ?>
                                                    <?php }
                                                            }
                                                        }
                                                    } ?>
                                                    <a href="#" data-href="<?= base_url('admin/datatransaksi/approvedtransaksi/' . $tb_transaksi['t_id'] . '/approved') ?>" onclick="confirmToApproved(this)" class="btn btn-warning btn-sm">Belum Disetujui</a>
                                                    <div class="time"><?= $hari . " hari, " . $jam . " jam, " . $menit . " menit yang lalu" ?></div>

                                                </div>
                                            <?php } ?>
                                        </div>
                                <?php }
                                } ?>

                                <!-- Data approved transaksi Cicilan -->
                                <?php $current_time = time();
                                foreach ($NotipDataLogcicilansementara as $tb_log_cicilan_sementara) {
                                    // foreach ($NotipDataLogcicilan as $tb_log_cicilan) {
                                    $transaksi_time = strtotime($tb_log_cicilan_sementara['created_at']);
                                    $waktu = $current_time - strtotime($tb_log_cicilan_sementara['created_at']);
                                    $hari = floor($waktu / (3600 * 24));
                                    $jam = floor(($waktu % (3600 * 24)) / 3600);
                                    $menit = floor(($waktu % 3600) / 60);
                                    $approvedsementara = $tb_log_cicilan_sementara['l_approval_by'];
                                    if ($approvedsementara == null) { ?>
                                        <div class="dropdown-item">
                                            <?php
                                            // $approvedsementara = $tb_log_cicilan_sementara['l_approval_by'];
                                            // $approved = $tb_log_cicilan['l_approval_by'];
                                            if ($approvedsementara != null) {
                                                if ($approvedsementara != null) {
                                                } else { ?>
                                                    <div class="dropdown-item-icon bg-success text-white">
                                                        <i class="fas fa-check"></i>
                                                    </div>
                                                    <div class="dropdown-item-desc">
                                                        <?php foreach ($NotipDataUser as $tb_user) {
                                                            if ($tb_log_cicilan_sementara['u_id'] == $tb_user['u_id']) {
                                                                $c_id = $tb_log_cicilan_sementara['c_id'];
                                                                foreach ($NotipDatacicilan as $tb_cicilan) {
                                                                    if ($c_id == $tb_cicilan['c_id']) {
                                                                        $p_id = $tb_cicilan['p_id'];
                                                                        $pe_id = $tb_cicilan['pe_id'];
                                                                        foreach ($NotipDataPeriode as $tb_pay_periode) {
                                                                            if ($pe_id == $tb_pay_periode['pe_id']) {
                                                                                $pe_periode = $tb_pay_periode['pe_periode'];
                                                                                foreach ($NotipDataPaket as $tb_paket) {
                                                                                    if ($p_id == $tb_paket['p_id']) {
                                                                                        echo strtoupper('<b style="font-weight: bold; font-size: 13px;">' . $tb_user['u_nama']) . '</b> telah membayar paket <b style="font-weight: bold; font-size: 13px;">' . $tb_paket['p_nama'] . '</b>, dengan jumlah bayar sebesar Rp. <b style="font-weight: bold; font-size: 13px;">Rp' . number_format($tb_log_cicilan_sementara['l_jumlah_bayar'], 2, ',', '.') . '</b> sebanyak periode pembayaran <b style="font-weight: bold; font-size: 13px;">' . $pe_periode . '</b> <b style="font-weight: bold; font-size: 13px;">' . $tb_pay_periode['pe_nama'] . '</b>.';
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        } ?>

                                                        <div class="time"><a href="<?= base_url('admin/datalogcicilan/noapprovedlogcicilan/' . $tb_log_cicilan_sementara['l_id'] . '/noapproved') ?>" class="btn btn-primary btn-sm" disabled>Telah Disetujui</a></div>
                                                        <div class="time"><?= $hari . " hari," . $jam . " jam," . $menit . " menit yang lalu" ?></div>
                                                    </div>
                                                <?php
                                                }
                                            } else { ?>
                                                <div class="dropdown-item-icon bg-danger text-white">
                                                    <i class="fas fa-exclamation-triangle"></i>
                                                </div>
                                                <div class="dropdown-item-desc">
                                                    <?php foreach ($NotipDataUser as $tb_user) {
                                                        if ($tb_log_cicilan_sementara['u_id'] == $tb_user['u_id']) {
                                                            $c_id = $tb_log_cicilan_sementara['c_id']; ?>
                                                            <?php foreach ($NotipDatacicilan as $tb_cicilan) {
                                                                if ($c_id == $tb_cicilan['c_id']) {
                                                                    $p_id = $tb_cicilan['p_id'];
                                                                    $pe_id = $tb_cicilan['pe_id'];
                                                                    foreach ($NotipDataPeriode as $tb_pay_periode) {
                                                                        if ($pe_id == $tb_pay_periode['pe_id']) {
                                                                            $pe_periode = $tb_pay_periode['pe_periode'];
                                                                            foreach ($NotipDataPaket as $tb_paket) {
                                                                                if ($p_id == $tb_paket['p_id']) { ?>
                                                                                    <?= strtoupper('<b style="font-weight: bold; font-size: 13px;">' . $tb_user['u_nama']) . '</b> telah membayar paket <b style="font-weight: bold; font-size: 13px;">' . $tb_paket['p_nama'] . '</b>, dengan jumlah bayar sebesar Rp. <b style="font-weight: bold; font-size: 13px;">' .  number_format($tb_log_cicilan_sementara['l_jumlah_bayar'], 2, ',', '.') . '</b> sebanyak periode pembayaran <b style="font-weight: bold; font-size: 13px;">' . $tb_log_cicilan_sementara['l_jumlah_pembayaran_cicilan'] . '</b> <b style="font-weight: bold; font-size: 13px;">' . $tb_pay_periode['pe_nama'] . "</b>."; ?>
                                                    <?php }
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    } ?>
                                                    <a href="#" data-href="<?= base_url('admin/datalogcicilan/approvedlogcicilan/' . $tb_log_cicilan_sementara['l_id'] . '/approved') ?>" onclick="confirmToApproved(this)" class="btn btn-warning btn-sm">Belum Disetujui</a>
                                                    <div class="time"><?= $hari . " hari," . $jam . " jam," . $menit . " menit yang lalu" ?></div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                <?php }
                                }
                                ?>
                                <!-- <a href="#" class="dropdown-item">
                                    <div class="dropdown-item-icon bg-info text-white">
                                        <i class="fas fa-bell"></i>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        Welcome to Stisla template!
                                        <div class="time">Yesterday</div>
                                    </div>
                                </a> -->
                            </div>
                            <div class="dropdown-footer text-center">
                                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="<?= base_url() ?>/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, <?= session()->get('u_fullname'); ?></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- <div class="dropdown-title">Logged in 5 min ago</div>
                            <a href="features-profile.html" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a>
                            <a href="features-activities.html" class="dropdown-item has-icon">
                                <i class="fas fa-bolt"></i> Activities
                            </a>
                            <a href="features-settings.html" class="dropdown-item has-icon">
                                <i class="fas fa-cog"></i> Settings
                            </a> -->
                            <div class="dropdown-divider"></div>
                            <a href="<?= base_url(); ?>/admin/logout" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <img src="<?= base_url(); ?>/assets/img/logo/logo-removebg-preview.png" class="" alt="" style="margin-top: 10px; height: 80px;width: 40%; "><br>
                        <a href="index.html">Arisya</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="index.html">ar</a>
                    </div>
                    <ul class="sidebar-menu">
                        <?= $this->include('admin/layout/menu') ?>
                    </ul>
                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <?= $this->renderSection('content') ?>
            </div>
            <input type="text" name="sb_hargaasli" class="form-control currency hargaasli hargajual insentive cashback laba" placeholder="Masukan Harga Asli" required hidden>
            <input type="text" name="sb_hargaasli" class="form-control phone-number" placeholder="Masukan Harga Asli" required hidden>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2023 <div class="bullet"></div> Developed By <a href="">Arisya</a>
                </div>
                <div class="footer-right">
                    v1.0.0
                </div>
            </footer>
        </div>
    </div>

    <!-- js online -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Open source icons. -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


    <!-- General JS Scripts -->
    <!-- <script src="<?= base_url() ?>/assets/js/jquery.min.js"></script> -->
    <script src="<?= base_url() ?>/assets/modules/jquery/dist/jquery.min.js"></script>
    <!-- <script src="<?= base_url() ?>/assets/modules/popper.js/dist/umd/popper.min.js"></script> -->
    <script src="<?= base_url() ?>/assets/modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>/assets/modules/nicescroll/dist/jquery.nicescroll.min.js"></script>
    <script src="<?= base_url() ?>/assets/modules/moment/min/moment.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/stisla.js"></script>
    <script src="<?= base_url() ?>/assets/js/select2.min.js"></script>

    <!-- JS Libraies -->
    <!-- <script src="<?= base_url() ?>/assets/modules/simpleweather/jquery.simpleWeather.min.js"></script>
    <script src="<?= base_url() ?>/assets/modules/chart.js/dist/chart.min.js"></script>
    <script src="<?= base_url() ?>/assets/modules/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="<?= base_url() ?>/assets/modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="<?= base_url() ?>/assets/modules/summernote/dist/summernote-bs4.js"></script>
    <script src="<?= base_url() ?>/assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script> -->
    <script src="<?= base_url() ?>/assets/modules/cleave.js/dist/cleave.min.js"></script>
    <script src="<?= base_url() ?>/assets/modules/cleave.js/dist/addons/cleave-phone.id.js"></script>
    <script src="<?= base_url() ?>/assets/modules/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>/assets/modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <!-- <script src="<?= base_url() ?>/assets/js/page/forms-advanced-forms.js"></script> -->

    <!-- Advanced Forms -->
    <script src="<?= base_url() ?>/assets/modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
    <!-- Date Range Picker -->
    <script src="<?= base_url() ?>/assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- <script src="<?= base_url() ?>/assets/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    <script src="<?= base_url() ?>/assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
    <script src="<?= base_url() ?>/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script src="<?= base_url() ?>/assets/modules/select2/dist/js/select2.full.min.js"></script>
    <script src="<?= base_url() ?>/assets/modules/selectric/public/jquery.selectric.min.js"></script>
    <script src="<?= base_url() ?>/assets/modules/jquery-ui/jquery-ui.min.js"></script> -->


    <!-- Page Specific JS File -->
    <!-- <script src="<?= base_url() ?>/assets/js/page/components-table.js"></script> -->

    <!-- Template JS File -->
    <script src="<?= base_url() ?>/assets/js/scripts.js"></script>
    <script src="<?= base_url() ?>/assets/js/custom.js"></script>
    <script src="<?= base_url() ?>/assets/js/phone.js"></script>
    <script src="<?= base_url() ?>/assets/js/numberRP.js"></script>
    <!-- Yeti login -->
    <script src="<?= base_url() ?>/assets/js/script-login-yeti.js"></script>
    <script src="<?= base_url() ?>/assets/js/TweenMax-login-yeti.min.js"></script>
    <div id="confirm-dialog-approved" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h4 class="h4">Apa kamu akan menyetujui data ini?</h4>
                    <p>Data akan disetujui selamanya....</p>
                </div>
                <div class="modal-footer">
                    <a href="#" role="button" id="approved-button" class="btn btn-primary">Approved</a>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function confirmToApproved(el) {
            $("#approved-button").attr("href", el.dataset.href);
            $("#confirm-dialog-approved").modal('show');
        }

        $(document).ready(function() {
            $('.js-example-basic-single').select2();
            $('.js-example-basic-multiple').select2();

            $('#myTable').DataTable({
                "autoWidth": false
            });

            //select kabupaten
            $("#id_provinsi").change(function(e) {
                var id_provinsi = $("#id_provinsi").val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('AdminControllers/Kabupaten'); ?>",
                    data: {
                        u_provinsi: id_provinsi
                    },
                    success: function(response) {
                        $("#id_kabupaten").html(response);
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            });
            //select kabupaten
            $("#id_kabupaten").change(function(e) {
                var id_kabupaten = $("#id_kabupaten").val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('AdminControllers/Kecamatan'); ?>",
                    data: {
                        u_kota: id_kabupaten
                    },
                    success: function(response) {
                        $("#id_kecamatan").html(response);
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            });
            //show Item Barang
            // $(document).on('click', '#tambahitembarang', function(e) {
            //     e.preventDefault();
            //     $.ajax({
            //         url: "<?php echo base_url('AdminControllers/ShowItemBarang'); ?>",
            //         method: 'post',
            //         success: function(response) {
            //             $("#itembarang").html(response);
            //         },
            //         error: function(xhr, status, error) {
            //             console.log(error);
            //         }
            //     });
            // });
            //show Harga Packaging
            $("#pa_id").change(function(e) {
                var pa_id = $("#pa_id").val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('AdminControllers/HargaPackaging'); ?>",
                    data: {
                        pa_id: pa_id
                    },
                    success: function(response) {
                        $("#pa_harga").html(response);
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            });
            //show transaksi paket
            $("#transaksi_p_id").change(function(e) {
                var transaksi_p_id = $("#transaksi_p_id").val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('AdminControllers/TotalHarga'); ?>",
                    data: {
                        p_id: transaksi_p_id
                    },
                    success: function(response) {
                        $("#p_hargapaket").html(response);
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            });
            //show paket Cicilan
            $("#u_id, #p_id").change(function(e) {
                var u_id = $("#u_id").val();
                var p_id = $("#p_id").val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('AdminControllers/PaketCicilan'); ?>",
                    data: {
                        u_id: u_id,
                        p_id: p_id
                    },
                    success: function(response) {
                        $("#t_id").html(response);
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            });
            $("#u_id_log_cicilan").change(function(e) {
                var u_id_log_cicilan = $("#u_id_log_cicilan").val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('AdminControllers/PaketLogCicilan'); ?>",
                    data: {
                        u_id: u_id_log_cicilan
                    },
                    success: function(response) {
                        $("#t_id_log_cicilan").html(response);
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            });
            $("#transaksi_p_id").change(function(e) {
                var transaksi_p_id = $("#transaksi_p_id").val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('AdminControllers/ShowPayperiode'); ?>",
                    data: {
                        p_id: transaksi_p_id
                    },
                    success: function(response) {
                        $("#pe_nama").html(response);
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#clearButton").click(function() {
                // Get the Select2 element
                var select2Element = $('.js-example-basic-multiple');

                // Clear the selected values
                select2Element.val(null).trigger('change');

                // Make an AJAX request to your controller
                $.ajax({
                    url: "<?php echo base_url('AdminControllers/SelectEditPaketBarang'); ?>",
                    method: 'GET',
                    success: function(response) {
                        // $("#sb_id").html(response);
                        // $("<?php echo base_url('AdminControllers/view'); ?>").show();
                        var p_id = $("#p_id").val();
                        var myVariable = console.log(response);
                        $.ajax({
                            url: "<?php echo base_url('AdminControllers/myFunction'); ?>",
                            type: 'post',
                            data: {
                                selectitembarang: myVariable,
                                p_id: p_id
                            },
                            success: function(data) {
                                // kode sukses
                            }
                        });
                    },
                    error: function(xhr, status, error) {
                        console.log('Error: ' + error);
                    }
                });
            });
        });
    </script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
</body>

</html>