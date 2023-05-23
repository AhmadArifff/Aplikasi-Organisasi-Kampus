<?= $this->extend('coordinator/layout/default') ?>
<?= $this->section('title') ?>
<title>Data Transaksi Paket Barang &mdash; ARISYA</title>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="section">
    <?= csrf_field(); ?>
    <div class="section-header">
        <h1>Data Transaksi</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Data Transaksi</div>
            <div class="breadcrumb-item">Data Transaksi Paket</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-18">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Transaksi Paket</h4>
                        <div class="card-header-action">
                            <a href="<?= base_url(); ?>/coordinator/datatransaksi/transaksi" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
                            <a href="<?= base_url('coordinator/coordinatorcontrollers/exportfileexceltransaksi') ?>" class="btn btn-primary"><i class="fas fa-download"></i> Export Data</a>
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
                                    <th>Nama Referensi</th>
                                    <th>Nama Paket</th>
                                    <th>Nama Periode Pembayaran</th>
                                    <th>Jumlah Periode Pembayaran</th>
                                    <th>Jumlah Paket</th>
                                    <th>Jumlah Total Harga Paket</th>
                                    <th>Waktu Transaksi Paket</th>
                                    <!-- <th>Status Paket</th> -->
                                    <th>Status Transaksi Paket</th>
                                    <th>Action Button</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($tb_transaksi as $transaksi) : ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td>
                                            <?php foreach ($DataUser as $data) :
                                                if ($transaksi['u_id'] == $data['u_id']) {
                                                    echo $data['u_nama'];
                                                    $referensi = $data['u_referensi'];
                                                }
                                            endforeach; ?>
                                        </td>
                                        <td>
                                            <?php foreach ($DataUser as $data) :
                                                if ($referensi == $data['u_id']) {
                                                    echo $data['u_nama'];
                                                }
                                            endforeach; ?>
                                        </td>
                                        <td>
                                            <?php foreach ($DataPaket as $paket) :
                                                if ($transaksi['p_id'] == $paket['p_id']) {
                                                    $pnama = $paket['p_nama'];
                                                    $hargajual = $paket['p_hargaJual'];
                                                    $qty = $transaksi['t_qty'];
                                                }
                                            endforeach;
                                            echo $pnama; ?>
                                        </td>
                                        <td>
                                            <?php foreach ($payperiode as $data) :
                                                if ($transaksi['pe_id'] == $data['pe_id']) {
                                                    echo $data['pe_nama'];
                                                    $jumlahperiode =  $data['pe_periode'];
                                                }
                                            endforeach; ?>
                                        </td>
                                        <td><?= $jumlahperiode ?></td>
                                        <td><?= $transaksi['t_qty'] ?></td>
                                        <td>Rp. <?php
                                                $angka = $transaksi['t_totalharga'];
                                                $string = number_format($angka, 2);
                                                echo $string; ?></td>
                                        <td><?= $transaksi['waktu'] ?></td>

                                        <td>
                                            <?php if ($transaksi['t_approval_by'] != null) { ?>
                                                <button class="btn btn-primary btn-sm" disabled>Telah Disetujui</button>
                                            <?php } else { ?>
                                                <button class="btn btn-warning btn-sm" disabled>Belum Disetujui</button>
                                            <?php } ?>
                                        </td>
                                        <!-- <td>
                                            <?php if ($transaksi['t_approval_by'] != null) { ?>
                                                <a href="<?= base_url('admin/datatransaksi/noapprovedtransaksi/' . $transaksi['t_id'] . '/noapproved') ?>" class="btn btn-primary btn-sm" disabled>Telah Disetujui</a>
                                            <?php } else { ?>
                                                <a href="#" data-href="<?= base_url('admin/datatransaksi/approvedtransaksi/' . $transaksi['t_id'] . '/approved') ?>" onclick="confirmToApproved(this)" class="btn btn-warning btn-sm">Belum Disetujui</a>
                                            <?php } ?>
                                        </td> -->
                                        <td>
                                            <!-- <a href="<?= base_url('coordinator/datatransaksi/transaksi/' . $transaksi['t_id'] . '/edit') ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a> -->
                                            <a href="#" data-href="<?= base_url('coordinator/datatransaksi/transaksi/' . $transaksi['t_id'] . '/delete') ?>" onclick="confirmToDelete(this)" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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
<div id="confirm-dialog-delete" class="modal" tabindex="-1" role="dialog">
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

<script>
    function confirmToApproved(el) {
        $("#approved-button").attr("href", el.dataset.href);
        $("#confirm-dialog-approved").modal('show');
    }

    function confirmToDelete(el) {
        $("#delete-button").attr("href", el.dataset.href);
        $("#confirm-dialog-delete").modal('show');
    }
</script>
<?= $this->endSection() ?>