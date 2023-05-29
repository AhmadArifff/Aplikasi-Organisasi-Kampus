<?= $this->extend('mahasiswa/layout/default') ?>
<?= $this->section('title') ?>
<title>Data LK/OK &mdash; ARISYA</title>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="section">
    <?= csrf_field(); ?>
    <div class="section-header">
        <h1>LK/OK</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">LK/OK</div>
            <div class="breadcrumb-item">Data LK/OK</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-18">
                <div class="card">
                    <div class="card-header">
                        <h4>Data LK/OK</h4>
                        <div class="card-header-action">
                            <!-- <a href="<?= base_url(); ?>/AdminLK-OK/dataLK-OK/registerLK-OK" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</a> -->
                            <!-- <a href="<?= base_url('admin/admincontrollers/exportfileexceluser') ?>" class="btn btn-primary"><i class="fas fa-download"></i> Export Data</a> -->
                            <!-- Export modal by tgl -->
                            <!-- <a href="#" data-href="<?= base_url('admin/export-data-excel') ?>" onclick="confirmToExport(this)" class="btn btn-primary"><i class="fas fa-download"></i> Export Data</a> -->

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
                                    <th>NAMA LK/OK</th>
                                    <th>Action Button</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($tb_organisasi as $data) : ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $data['o_nama'] ?></td>
                                        <td>
                                            <a href="<?= base_url('Mahasiswa/morelkok') ?>" class="btn btn-primary btn-sm"><i class="fas fa-eye "></ion-icon></i></a>
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

<?= $this->endSection() ?>