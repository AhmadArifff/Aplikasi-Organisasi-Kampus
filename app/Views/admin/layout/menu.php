<li class="menu-header">Menu</li>
<li <?= ($Dashboard == 'dashboard') ? 'class="active"' : '' ?>>
    <a href="<?= base_url(); ?>/AdminLK-OK/dashboard" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
</li>
<li class="nav-item <?= ($DataanggotaLKOK == 'DataanggotaLKOK')  ? 'active' : '' ?>">
    <a href="<?= base_url(); ?>/AdminLK-OK/dataanggotaLK-OK" class="nav-link"><i class="fas"><ion-icon name="tennisball-outline"></ion-icon></i> <span>Anggota LK/OK</span></a>
</li>
<li class="nav-item <?= ($Event == 'event')  ? 'active' : '' ?>">
    <a href="<?= base_url(); ?>/AdminLK-OK/dataevent" class="nav-link"><i class="fas"><ion-icon name="megaphone-outline"></ion-icon></i> <span>Event</span></a>
</li>

