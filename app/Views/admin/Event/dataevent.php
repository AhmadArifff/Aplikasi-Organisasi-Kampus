<?= $this->extend('admin/layout/default') ?>
<?= $this->section('title') ?>
<title>Data Event &mdash; AOU</title>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="section">
    <?= csrf_field(); ?>
    <div class="section-header">
        <h1>Event</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Event</div>
            <div class="breadcrumb-item">Data Event</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-18">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Event</h4>
                        <div class="card-header-action">
                            <a href="<?= base_url(); ?>/AdminLK-OK/viewevent" class="btn btn-primary"><i class="fas fa-eye"></i> Semua Event</a>
                            <a href="<?= base_url(); ?>/AdminLK-OK/dataevent/registerevent" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
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
                                    <th>NAMA PENGGUNA</th>
                                    <th>NAMA FAKULTAS</th>
                                    <th>NAMA KEGIATAN</th>
                                    <th>JENIS KEGIATAN</th>
                                    <th>DESKRIPSI KEGIATAN</th>
                                    <th>FOTO KEGIATAN</th>
                                    <th>Action Button</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($tb_event as $event) : ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?php foreach ($tb_user as $data) :
                                                if ($event['u_id'] == $data['u_id']) {
                                                    echo $data['u_nama'];
                                                }
                                            endforeach ?></td>
                                        <td><?php foreach ($tb_prodi as $data) :
                                                if ($event['p_id'] == $data['p_id']) {
                                                    echo $data['p_nama'];
                                                }
                                            endforeach ?></td>
                                        <td><?= $event['k_nama'] ?></td>
                                        <td><?= $event['k_jeniskegiatan'] ?></td>
                                        <td><?= $event['k_deskripsikegiatan'] ?> </td>
                                        <td style="text-align:center"><img src="<?= base_url('Event/' . $event['k_foto']) ?>" width="200px" style="border-radius: 5px;"></td>
                                        <td>
                                            <a href="<?= base_url('AdminLK-OK/dataevent/' . $event['k_id'] . '/edit') ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                            <a href="#" data-href="<?= base_url('AdminLK-OK/dataevent/' . $event['k_id'] . '/delete') ?>" onclick="confirmToDelete(this)" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                            <a href="<?= base_url('AdminLK-OK/viewevent/' . $event['k_id']) ?>" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
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

<!-- Modal -->
<div class="modal fade" id="confirm-dialog-export" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Export Report</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="tanggal-awal" class="col-form-label">Tanggal Awal:</label>
                    <input type="date" class="form-control" id="tanggal-awal" name="tanggal-awal">
                </div>
                <div class="form-group">
                    <label for="tanggal-akhir" class="col-form-label">Tanggal Akhir:</label>
                    <input type="date" class="form-control" id="tanggal-akhir" name="tanggal-akhir">
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" role="button" id="export-button" class="btn btn-primary">Export</a>
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

    // function confirmToExport(el) {
    //     $("#export-button").attr("href", el.dataset.href);
    //     $("#confirm-dialog-export").modal('show');
    // }
</script>
<script>
    function confirmToExport(link) {
        $('#confirm-dialog-export').modal('show');

        $('#export-button').on('click', function() {
            var tanggalAwal = $('#tanggal-awal').val();
            var tanggalAkhir = $('#tanggal-akhir').val();

            var url = link.getAttribute('data-href');

            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    'tanggal-awal': tanggalAwal,
                    'tanggal-akhir': tanggalAkhir
                },
                success: function(response) {
                    // handle success response
                },
                error: function(xhr) {
                    // handle error response
                }
            }).done(function() {
                $('#confirm-dialog-export').modal('hide');

                // tampilkan pesan sukses
                // atau redirect ke halaman lain
            }).fail(function() {
                $('#confirm-dialog-export').modal('hide');

                // tampilkan pesan error
                // atau lakukan sesuai kebutuhan
            });
        });
    }
</script>

<?= $this->endSection() ?>