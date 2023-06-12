<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <?= $this->renderSection('title') ?>
    <link rel="icon" type="image/x-icon" href="<?= base_url() ?>/assets/img/logo/favicon_.ico">
    <!-- getboostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/modules/@fortawesome/fontawesome-free/css/all.min.css">
    <!-- select search -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/select2.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/bootstrap-social.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/owl.theme.default.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/components.css">
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
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">

                    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right">
                            <div class="dropdown-header">Notifications
                                <div class="float-right">
                                    <a href="#">Mark All As Read</a>
                                </div>
                            </div>
                            <div class="dropdown-list-content dropdown-list-icons">
                                <?php $current_time = time();
                                foreach ($NotipEvent as $tb_event) {
                                    $waktu = $current_time - strtotime($tb_event['k_create_at']);
                                    $hari = floor($waktu / (3600 * 24));
                                    $jam = floor(($waktu % (3600 * 24)) / 3600);
                                    $menit = floor(($waktu % 3600) / 60);
                                    $approved = $tb_event['k_check_u_id'];
                                    if ($approved == null) { ?>
                                        <div class="dropdown-item">
                                            <?php
                                            if ($approved != null) {
                                                if ($approved != null) {
                                                } else { ?>
                                                <?php
                                                }
                                            } else { ?>
                                                <div class="dropdown-item-icon bg-danger text-white">
                                                    <i class="fas fa-exclamation-triangle"></i>
                                                </div>
                                                <div class="dropdown-item-desc">
                                                    <?php foreach ($NotipUser as $tb_user) {
                                                        if ($tb_event['u_id'] == $tb_user['u_id']) {
                                                            $u_prodi = $tb_user['u_prodi'];
                                                            foreach ($Notiprodi as $tb_prodi) {
                                                                if ($u_prodi == $tb_prodi['p_id']) {
                                                                    echo strtoupper('<b style="font-weight: bold; font-size: 13px;">' . $tb_user['u_nama']) . '</b> dari prodi <b style="font-weight: bold; font-size: 13px;">' . $tb_prodi['p_nama'] . '</b>, telah mengupload kegiantan <b style="font-weight: bold; font-size: 13px;">' . $tb_event['k_nama'] . '</b>.<br>';
                                                                }
                                                            }
                                                        }
                                                    } ?>
                                                    <a href="#" data-href="<?= base_url('SuperAdmin/dataevent/approved/' . $tb_event['k_id']) ?>" onclick="confirmToApproved(this)" class="btn btn-warning btn-sm">Belum Disetujui</a>
                                                    <div class="time"><?= $hari . " hari," . $jam . " jam," . $menit . " menit yang lalu" ?></div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                <?php }
                                }
                                ?>
                            </div>
                            <div class="dropdown-footer text-center">
                                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="<?= base_url() ?>/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, <?= session()->get('u_nama'); ?></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-divider"></div>
                            <a href="<?= base_url(); ?>/SuperAdmin/logout" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <img src="<?= base_url(); ?>/assets/img/logo/campus.png" class="" alt="" style="margin-top: 20px;margin-bottom: 15px; width: 60%; aspect-ratio: 2/2; object-fit: contain ; "><br>
                        <p href="index.html" class="mt-10">Aplikasi Organisasi Universitas</p>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="index.html">AOU</a>
                    </div>
                    <ul class="sidebar-menu">
                        <?= $this->include('superadmin/layout/menu') ?>
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
                    Copyright &copy; 2023 <div class="bullet"></div> Developed By <a href="">Aplikasi Organisasi Universitas</a>
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
    <script src="<?= base_url() ?>/assets/modules/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url() ?>/assets/modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>/assets/modules/nicescroll/dist/jquery.nicescroll.min.js"></script>
    <script src="<?= base_url() ?>/assets/modules/moment/min/moment.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/stisla.js"></script>
    <script src="<?= base_url() ?>/assets/js/select2.min.js"></script>

    <!-- JS Libraies -->
    <script src="<?= base_url() ?>/assets/modules/cleave.js/dist/cleave.min.js"></script>
    <script src="<?= base_url() ?>/assets/modules/cleave.js/dist/addons/cleave-phone.id.js"></script>
    <script src="<?= base_url() ?>/assets/modules/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>/assets/modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

    <!-- Advanced Forms -->
    <script src="<?= base_url() ?>/assets/modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>

    <!-- Template JS File -->
    <script src="<?= base_url() ?>/assets/js/scripts.js"></script>
    <script src="<?= base_url() ?>/assets/js/custom.js"></script>
    <script src="<?= base_url() ?>/assets/js/phone.js"></script>
    <script src="<?= base_url() ?>/assets/js/numberRP.js"></script>
    <script src="<?= base_url() ?>/assets/js/owl.carousel.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/components-user.js"></script>
    <div id="confirm-dialog-approved" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h4 class="h4">Apa kamu akan menyetujui data ini?</h4>
                    <p>Data akan disetujui selamanya....</p>
                </div>
                <div class="modal-footer">
                    <a href="#" role="button" id="approved-button" class="btn btn-primary">Setuju</a>
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
            $("#u_id").change(function(e) {
                var u_id = $("#u_id").val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('Prodi'); ?>",
                    data: {
                        u_id: u_id
                    },
                    success: function(response) {
                        $("#p_id").html(response);
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
</body>

</html>