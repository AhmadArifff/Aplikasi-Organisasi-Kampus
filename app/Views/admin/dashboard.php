<?= $this->extend('admin/layout/default') ?>
<?= $this->section('title') ?>
<title>Dashboard &mdash; AOU</title>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="section">
    <?= csrf_field(); ?>
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1" Style="border-radius:15px;">
                    <div class="card-icon bg-warning">
                        <i class="fas"><ion-icon name="tennisball-outline"></ion-icon></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total LK/OK</h4>
                        </div>
                        <div class="card-body">
                            <?= countdata('tb_user') ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-info">
                        <i class="fas"><ion-icon name="megaphone-outline"></ion-icon></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Event</h4>
                        </div>
                        <div class="card-body">
                            <?= countdata('tb_user') ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<?= $this->endSection() ?>