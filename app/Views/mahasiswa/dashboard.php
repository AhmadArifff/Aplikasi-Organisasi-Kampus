<?= $this->extend('mahasiswa/layout/default') ?>
<?= $this->section('title') ?>
<title>Dashboard &mdash; AOU</title>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<?php

use App\Helpers\login_helper;

$helper = new login_helper();
$totallkok = $helper->countdata('tb_organisasi');
?>

<section class="section">
    <?= csrf_field(); ?>
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1" Style="border-radius:15px;">
                    <div class="card-icon bg-info" Style="border-radius:15px;">
                        <i class="fas"><ion-icon name="megaphone-outline"></ion-icon></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Event</h4>
                        </div>
                        <div class="card-body">
                            <?= $totallkok ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<?= $this->endSection() ?>