<?= $this->extend('coordinator/layout/default') ?>
<?= $this->section('title') ?>
<title>Database Users &mdash; ARISYA</title>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="section">
    <?= csrf_field(); ?>
    <div class="section-header">
        <h1>Database Users</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Database Users</div>
            <div class="breadcrumb-item">Data Users</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-18">
                <div class="card">
                    <div class="card-header">
                        <h4>Data User</h4>
                        <div class="card-header-action">
                            <a href="<?= base_url(); ?>/coordinator/databaseuser/registeruser" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
                            <a href="<?= base_url('coordinator/coordinatorcontrollers/exportfileexceluser') ?>" class="btn btn-primary"><i class="fas fa-download"></i> Export Data</a>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <?php if (session()->getFlashdata('success')) : ?>
                            <div class="alert alert-success w-auto" role="alert">
                                <?php echo session()->getFlashdata('success'); ?>
                            </div>
                        <?php endif; ?>
                        <?php if (session()->getFlashdata('error')) : ?>
                            <div class="alert alert-danger w-auto" role="alert">
                                <?php echo session()->getFlashdata('error'); ?>
                            </div>
                        <?php endif; ?>
                        <table id="myTable" class="table table-striped table-bordered">
                            <thead>
                                <tr class="table-primary">
                                    <th class="text-center">#</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Full Name</th>
                                    <th>Role Akses</th>
                                    <th>Nama Refernsi</th>
                                    <th>Email</th>
                                    <th>NIK KTP</th>
                                    <th>Nama Lengkap KTP</th>
                                    <th>Tempat Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Provinsi</th>
                                    <th>Kota</th>
                                    <th>Kelurahan</th>
                                    <th>Kecamatan</th>
                                    <th>KodePos</th>
                                    <th>Action Button</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($tb_user as $user) : ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $user['u_username'] ?></td>
                                        <td><?= $user['u_password'] ?></td>
                                        <td><?= $user['u_fullname'] ?></td>
                                        <td><?= $user['u_role'] ?> </td>
                                        <td><?php foreach ($datauser as $data) :
                                                if ($user['u_referensi'] == $data['u_id']) {
                                                    echo $data['u_nama'];
                                                }
                                            endforeach ?></td>
                                        <td><?= $user['u_email'] ?></td>
                                        <td><?= $user['u_nik'] ?></td>
                                        <td><?= $user['u_nama'] ?></td>
                                        <td><?= $user['u_tempat_lahir'] ?>, <?= $user['u_tanggal_lahir'] ?></td>
                                        <td><?= $user['u_jenis_kelamin'] ?></td>
                                        <td><?php foreach ($provinsi as $tb_provinsi) :
                                                if ($user['u_provinsi'] == $tb_provinsi['id_provinsi']) {
                                                    echo $tb_provinsi['nama_provinsi'];
                                                }
                                            endforeach ?></td>
                                        <td><?php foreach ($kabupaten as $tb_kabupaten) :
                                                if ($user['u_kota'] == $tb_kabupaten['id_kabupaten']) {
                                                    echo $tb_kabupaten['nama_kabupaten'];
                                                }
                                            endforeach ?></td>
                                        <td><?= $user['u_kelurahan'] ?></td>
                                        <td><?php foreach ($kecamatan as $tb_kecamatan) :
                                                if ($user['u_kecamatan'] == $tb_kecamatan['id_kecamatan']) {
                                                    echo $tb_kecamatan['nama_kecamatan'];
                                                }
                                            endforeach ?></td>
                                        <td><?= $user['u_kodepos'] ?></td>
                                        <td>
                                            <a href="<?= base_url('coordinator/databaseuser/datauser/' . $user['u_id'] . '/edit') ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                            <a href="#" data-href="<?= base_url('coordinator/databaseuser/datauser/' . $user['u_id'] . '/delete') ?>" onclick="confirmToDelete(this)" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php $i++;
                                endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div id="confirm-dialog" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h4 class="h4">Apa kamu yakin hapus data ini?</h4>
                <p>Data akan dihapus dan hilang selamanya....</p>
            </div>
            <div class="modal-footer">
                <a href="#" role="button" id="delete-button" class="btn btn-danger">Delete</a>
                <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmToDelete(el) {
        $("#delete-button").attr("href", el.dataset.href);
        $("#confirm-dialog").modal('show');
    }
</script>
<?= $this->endSection() ?>