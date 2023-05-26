<li class="menu-header">Menu</li>
<li <?= ($AdminDashboard == 'dashboard') ? 'class="active"' : '' ?>>
    <a href="<?= base_url(); ?>/mahasiswa/dashboard" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
</li>
<li class="nav-item <?= ($RegisterUser == 'registeruser')  ? 'active' : '' ?>">
    <a class="nav-link" href="<?= base_url(); ?>/mahasiswa/databaseuser/datauser"><i class="far fa-user "></i> <span>Database Users</span></a>
</li>
<li class="nav-item dropdown <?= ($MenuDataTransaksi == 'menudatatransaksi')  ? 'active' : '' ?>">
    <a href="#" class="nav-link has-dropdown"><i class="fas"><ion-icon name="receipt-sharp"></ion-icon></i> <span>Data Transaksi</span></a>
    <ul class="dropdown-menu">
        <li <?= ($DataTransaksi == 'datatransaksi') ? 'class="active"' : '' ?>><a class="nav-link" href="<?= base_url(); ?>/mahasiswa/datatransaksi/datatransaksi">Transaksi Paket</a></li>
        <li <?= ($DataTransaksiCicilan == 'datatransaksicicilan') ? 'class="active"' : '' ?>><a class="nav-link" href="<?= base_url(); ?>/mahasiswa/datatransaksi/datacicilan">Transaksi Cicilan</a></li>
        <li <?= ($DataTransaksiLogCicilan == 'datatransaksilogcicilan') ? 'class="active"' : '' ?>><a class="nav-link" href="<?= base_url(); ?>/mahasiswa/datatransaksi/datalogcicilan">Transaksi Log Cicilan</a></li>
    </ul>
</li>