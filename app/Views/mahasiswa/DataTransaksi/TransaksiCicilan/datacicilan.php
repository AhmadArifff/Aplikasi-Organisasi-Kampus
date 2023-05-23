<?= $this->extend('coordinator/layout/default') ?>
<?= $this->section('title') ?>
<title>Data Transaksi Cicilan Paket Barang &mdash; ARISYA</title>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="section">
    <?= csrf_field(); ?>
    <div class="section-header">
        <h1>Data Transaksi</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Data Transaksi</div>
            <div class="breadcrumb-item">Data Cicilan Pembayaran</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-18">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Cicilan Pembayaran</h4>
                        <div class="card-header-action">
                            <!-- <a href="<?= base_url(); ?>/coordinator/datatransaksi/cicilan" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</a> -->
                            <a href="<?= base_url('coordinator/coordinatorcontrollers/exportfileexcelcicilan') ?>" class="btn btn-primary"><i class="fas fa-download"></i> Export Data</a>
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
                                    <th>Nama Pengambil Paket</th>
                                    <th>Nama Paket</th>
                                    <th>Jumlah Paket</th>
                                    <th>Status Cicilan Paket</th>
                                    <th>Periode Cicilan</th>
                                    <th>Jumlah Total Cicilan</th>
                                    <th>Jumlah Cicilan Masuk</th>
                                    <th>Jumlah Cicilan Outstanding</th>
                                    <th>Jumlah Total Biaya</th>
                                    <th>Jumlah Biaya Masuk</th>
                                    <th>Jumlah Biaya Outstanding</th>
                                    <th>Action Button</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($tb_cicilan as $cicilan) : ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?php foreach ($DataUser as $data) :
                                                if ($cicilan['u_id'] == $data['u_id']) {
                                                    echo $data['u_nama'];
                                                }
                                            endforeach ?></td>
                                        <td>
                                            <?php
                                            // $j = 1;
                                            foreach ($DataTransaksiFungsi as $TransaksiFungsi) {
                                                if ($TransaksiFungsi['t_id'] == $cicilan['t_id']) {
                                                    $t_qty = $TransaksiFungsi['t_qty'];
                                                    foreach ($DataPaket as $paket) {
                                                        if ($cicilan['p_id'] == $paket['p_id']) {
                                                            $pnama = $paket['p_nama'];
                                                            echo $pnama;
                                                        }
                                                    }
                                                }
                                            }
                                            ?>
                                        </td>
                                        <td><?= $t_qty ?></td>
                                        <td><?php if ($cicilan['c_biaya_outstanding'] == 0) { ?>
                                                <button class="btn btn-primary btn-sm" disabled>Sudah Lunas</button>
                                            <?php  } else { ?>
                                                <button class="btn btn-warning btn-sm" disabled>Belum Lunas</button>
                                            <?php } ?>
                                        </td>
                                        <td><?php foreach ($DataPayPeriode as $PayPeriode) :
                                                if ($cicilan['pe_id'] == $PayPeriode['pe_id']) {
                                                    echo $PayPeriode['pe_nama'];
                                                }
                                            endforeach ?></td>
                                        <td><?= $cicilan['c_total_cicilan'] ?></td>
                                        <td><?= $cicilan['c_cicilan_masuk'] ?></td>
                                        <td><?= $cicilan['c_cicilan_outstanding'] ?></td>
                                        <td>Rp. <?php $angka =  $cicilan['c_total_biaya'];
                                                $string = number_format($angka, 2);
                                                echo $string; ?></td>
                                        <td id="text-color-plus"><?php $angka =  $cicilan['c_biaya_masuk'];
                                                                    if ($angka != null) {
                                                                        $string = number_format($angka, 2);
                                                                        echo "Rp. +" . $string;
                                                                    } ?></td>
                                        <td id="text-color-min">Rp. <?php $angka =  $cicilan['c_biaya_outstanding'];
                                                                    if ($angka != null) {
                                                                        $string = number_format($angka, 2);
                                                                        echo $string;
                                                                    } ?></td>
                                        <td>
                                            <!-- <a href="<?= base_url('coordinator/datatransaksi/cicilan/' . $cicilan['c_id'] . '/edit') ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a> -->
                                            <a href="#" data-href="<?= base_url('coordinator/datatransaksi/cicilan/' . $cicilan['c_id'] . '/delete') ?>" onclick="confirmToDelete(this)" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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