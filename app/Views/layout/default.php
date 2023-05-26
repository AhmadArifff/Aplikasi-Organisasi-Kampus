<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login &mdash; Arisya</title>
    <link rel="icon" type="image/x-icon" href="<?= base_url() ?>/assets/img/logo/favicon.ico">
    <!-- General CSS Files -->
    <link rel="icon" type="image/x-icon" href="<?= base_url() ?>/assets/img/logo/favicon.ico">
    <!-- getboostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/modules/@fortawesome/fontawesome-free/css/all.min.css">
    <!-- select search -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/select2.min.css">

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
    <style>
        .show {
            position: absolute;
            top: 0;
            right: 0;
            width: 60px;
            height: 100%;
            /* background: #333; */
            /* border: 6px solid #fff; */
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .show::before {
            content: 'Show';
            font-size: 0.6em;
            color: black;
            letter-spacing: 0.15em;
            text-transform: uppercase;
        }

        .show.hide::before {
            content: 'Hide';
        }
    </style>
</head>

<body>
    <?= $this->renderSection('content') ?>
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
    <!-- <script src="<?= base_url() ?>/assets/modules/simpleweather/jquery.simpleWeather.min.js"></script> -->
    <!-- <script src="<?= base_url() ?>/assets/modules/chart.js/dist/chart.min.js"></script> -->
    <!-- <script src="<?= base_url() ?>/assets/modules/jqvmap/dist/jquery.vmap.min.js"></script> -->
    <!-- <script src="<?= base_url() ?>/assets/modules/jqvmap/dist/maps/jquery.vmap.world.js"></script> -->
    <!-- <script src="<?= base_url() ?>/assets/modules/summernote/dist/summernote-bs4.js"></script> -->
    <!-- <script src="<?= base_url() ?>/assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script> -->
    <script src="<?= base_url() ?>/assets/modules/cleave.js/dist/cleave.min.js"></script>
    <script src="<?= base_url() ?>/assets/modules/cleave.js/dist/addons/cleave-phone.id.js"></script>
    <script src="<?= base_url() ?>/assets/modules/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>/assets/modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <!-- <script src="<?= base_url() ?>/assets/js/page/forms-advanced-forms.js"></script> -->

    <!-- Advanced Forms -->
    <script src="<?= base_url() ?>/assets/modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
    <!-- Date Range Picker -->
    <!-- <script src="<?= base_url() ?>/assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script> -->
    <!-- <script src="<?= base_url() ?>/assets/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script> -->
    <!-- <script src="<?= base_url() ?>/assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script> -->
    <!-- <script src="<?= base_url() ?>/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script> -->
    <!-- <script src="<?= base_url() ?>/assets/modules/select2/dist/js/select2.full.min.js"></script> -->
    <!-- <script src="<?= base_url() ?>/assets/modules/selectric/public/jquery.selectric.min.js"></script> -->
    <!-- <script src="<?= base_url() ?>/assets/modules/jquery-ui/jquery-ui.min.js"></script> -->


    <!-- Page Specific JS File -->
    <!-- <script src="<?= base_url() ?>/assets/js/page/components-table.js"></script> -->

    <!-- Template JS File -->
    <script src="<?= base_url() ?>/assets/js/scripts.js"></script>
    <script src="<?= base_url() ?>/assets/js/custom.js"></script>

    <script>
        let pswrd = document.querySelector('#password');
        let show = document.querySelector('.show');
        show.onclick = function() {
            if (pswrd.type === 'password') {
                pswrd.setAttribute('type', 'text');
                show.classList.add('hide');
            } else {
                pswrd.setAttribute('type', 'password');
                show.classList.remove('hide');
            }
        }
    </script>
</body>

</html>