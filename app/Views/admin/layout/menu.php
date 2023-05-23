<li class="menu-header">Menu</li>
<li <?= ($AdminDashboard == 'dashboard') ? 'class="active"' : '' ?>>
    <a href="<?= base_url(); ?>/admin/dashboard" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
</li>
<li class="nav-item <?= ($RegisterUser == 'registeruser') ? 'active' : '' ?>">
    <a class="nav-link" href="<?= base_url(); ?>/admin/databaseuser/datauser"><i class="far fa-user "></i> <span>Database Users</span></a>
</li>
<li class="nav-item dropdown <?= ($MenuDataBarang == 'menudatabarang')  ? 'active' : '' ?>">
    <a href="#" class="nav-link has-dropdown"><i class="fas"><ion-icon name="gift-sharp"></ion-icon></i> <span>Database Barang</span></a>
    <ul class="dropdown-menu">
        <li <?= ($DataBarangSupplier == 'databarangsupplier') ? 'class="active"' : '' ?>><a class="nav-link" href="<?= base_url(); ?>/admin/databasebarang/dataitembarang">Database Item Barang</a></li>
        <li <?= ($DataPaketBarang == 'datapaketbarang') ? 'class="active"' : '' ?>><a class="nav-link" href="<?= base_url(); ?>/admin/databasebarang/datapaketbarang">Paket Barang</a></li>
        <li <?= ($DataPackingBarang == 'datapackingbarang') ? 'class="active"' : '' ?>><a class="nav-link" href="<?= base_url(); ?>/admin/databasebarang/datapackagingbarang">Packaging Barang</a></li>
    </ul>
</li>
<li class="nav-item dropdown <?= ($MenuDataTransaksi == 'menudatatransaksi')  ? 'active' : '' ?>">
    <a href="#" class="nav-link has-dropdown"><i class="fas"><ion-icon name="receipt-sharp"></ion-icon></i> <span>Data Transaksi</span></a>
    <ul class="dropdown-menu">
        <li <?= ($DataPeriodeTransaksi == 'dataperiodetransaksi') ? 'class="active"' : '' ?>><a class="nav-link" href="<?= base_url(); ?>/admin/datatransaksi/dataperiodepembayaran">Periode Pembayaran</a></li>
        <li <?= ($DataTransaksi == 'datatransaksi') ? 'class="active"' : '' ?>><a class="nav-link" href="<?= base_url(); ?>/admin/datatransaksi/datatransaksi">Transaksi Paket</a></li>
        <li <?= ($DataTransaksiCicilan == 'datatransaksicicilan') ? 'class="active"' : '' ?>><a class="nav-link" href="<?= base_url(); ?>/admin/datatransaksi/datacicilan">Transaksi Cicilan</a></li>
        <li <?= ($DataTransaksiLogCicilan == 'datatransaksilogcicilan') ? 'class="active"' : '' ?>><a class="nav-link" href="<?= base_url(); ?>/admin/datatransaksi/datalogcicilan">Transaksi Log Cicilan</a></li>
    </ul>
</li>