<?= $this->extend('admin/layout/default') ?>
<?= $this->section('title') ?>
<title>Edit Data Packaging Barang &mdash; ARISYA</title>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Database Barang</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Database Barang</div>
            <div class="breadcrumb-item"><a href="<?= base_url(); ?>/admin/databasebarang/datapackagingbarang">Data Packaging Barang</a></div>
            <div class="breadcrumb-item">Edit Packaging Barang</div>
        </div>
    </div>
</section>
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Edit Packaging Barang</h4>
                    </div>

                    <div class="card-body">
                        <?php if (!empty(session()->getFlashdata('error'))) : ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <h4>Periksa Entrian Form</h4>
                                </hr />
                                <?php echo session()->getFlashdata('error'); ?>
                            </div>
                        <?php endif; ?>
                        <form method="post" action="" id="text-editor" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="row">
                                <input type="hidden" name="no" value="<?= $tb_packaging['pa_id'] ?>" />
                                <div class="form-group col-6">
                                    <label>Nama Packaging</label>
                                    <input type="text" name="pa_nama" class="form-control" placeholder="Masukan Nama Packaging" value="<?= $tb_packaging['pa_nama'] ?>" required>
                                </div>
                                <div class=" form-group col-6">
                                    <label>Harga Packaging</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Rp.
                                            </div>
                                        </div>
                                        <input type="text" name="pa_harga" class="form-control currency" placeholder=" Masukan Harga Packaging" value="<?= $tb_packaging['pa_harga'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Foto Packaging Barang</label>
                                    <input type="file" name="pa_foto" class="form-control" id="preview_gambar" accept=".jpg, .jpeg, .png" /></p>
                                </div>
                                <div class="form-group">
                                    <label for="">Preview Foto Packaging Barang Sebelumnya</label>
                                    <img src="<?= base_url('foto-packaging/' . $tb_packaging['pa_foto']) ?>" id="gambar_load" style="border-radius: 5px;" class="form-control h-auto" height="100%"></p>
                                    <input id="" type="text" class="form-control" name="preview" placeholder="" value="<?= $tb_packaging['pa_foto'] ?>" hidden>
                                </div>
                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" name="submit">
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="simple-footer">
                    Copyright &copy; Arisya 2023
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>