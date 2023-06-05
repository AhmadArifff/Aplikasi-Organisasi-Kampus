<?= $this->extend('admin/layout/default') ?>
<?= $this->section('title') ?>
<title>Event &mdash; ARISYA</title>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Dokumentasi Event</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Event</div>
            <div class="breadcrumb-item"><a href="<?= base_url(); ?>/AdminLK-OK/dataevent">Data Event</a></div>
            <div class="breadcrumb-item">Dokumentasi Event</div>
        </div>
    </div>

    <div class="section-body">
        <!-- <h2 class="section-title">Article Style C</h2> -->
        <div class="row">
            <?php foreach ($tb_event as $event) :
                if ($event['k_check_u_id'] != NULL) { ?>
                    <div class="col-12 col-md-4 col-lg-4">
                        <article class="article article-style-c">
                            <div class="article-header">
                                <div class="article-image" data-background="<?= base_url('Event/' . $event['k_foto']) ?>">
                                </div>
                            </div>
                            <div class="article-details">
                                <?php $current_time = time();
                                $waktu = $current_time - strtotime($event['k_create_at']);
                                $hari = floor($waktu / (3600 * 24));
                                $jam = floor(($waktu % (3600 * 24)) / 3600);
                                $menit = floor(($waktu % 3600) / 60);
                                ?>
                                <div class="article-category"><a href="#"><?= $event['k_jeniskegiatan'] ?></a>
                                    <div class="bullet"></div> <a href="#"><?= $hari . " hari, " . $jam . " jam, " . $menit . " menit yang lalu" ?></a>
                                </div>
                                <div class="article-title">
                                    <h2><a class="text-blue"><?= $event['k_nama'] ?></a></h2>
                                </div>
                                <p><?= $event['k_deskripsikegiatan'] ?></p>
                                <?php
                                foreach ($tb_user as $data) {
                                    if ($event['u_id'] == $data['u_id']) {
                                        $u_id = $data['u_id'];
                                ?>
                                        <div class="article-user">
                                            <?php
                                            $hostname = 'localhost';
                                            $username = 'root';
                                            $password = '';
                                            $database = 'organisasi_kampus_widyatama';

                                            $connection = mysqli_connect($hostname, $username, $password, $database);

                                            // Check if the connection was successful
                                            if (!$connection) {
                                                die('Failed to connect to MySQL: ' . mysqli_connect_error());
                                            }

                                            $query = "SELECT * FROM tb_anggota_organisasi WHERE u_id = '$u_id' ORDER BY ao_create_at DESC LIMIT 1";
                                            $result = mysqli_query($connection, $query);

                                            if (mysqli_num_rows($result) > 0) {
                                                $tb_anggotaorganisasi = mysqli_fetch_assoc($result);
                                            ?>
                                                <img alt="image" src="<?= base_url('Anggota-LKOK/' . $tb_anggotaorganisasi['ao_foto']) ?>">
                                            <?php } ?>
                                            <div class=" article-user-details">
                                                <div class="user-detail-name">
                                                    <a class="text-blue"><?= $data['u_nama'] ?></a>
                                                </div>
                                                <?php
                                                foreach ($tb_prodi as $dataprodi) {
                                                    if ($data['u_prodi'] == $dataprodi['p_id']) { ?>
                                                        <div class="text-job"><?= $dataprodi['p_nama'] ?></div>
                                                <?php }
                                                } ?>
                                            </div>
                                        </div>
                                <?php }
                                } ?>
                            </div>
                        </article>
                    </div>
            <?php }
            endforeach ?>
        </div>
    </div>
</section>
<?= $this->endSection() ?>