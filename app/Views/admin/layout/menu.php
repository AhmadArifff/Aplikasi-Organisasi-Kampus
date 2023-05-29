<li class="menu-header">Menu</li>
<li <?= ($Dashboard == 'dashboard') ? 'class="active"' : '' ?>>
    <a href="<?= base_url(); ?>/AdminLK-OK/dashboard" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
</li>
<li class="nav-item dropdown <?= ($LKOK == 'lkok')  ? 'active' : '' ?>">
    <a href="#" class="nav-link has-dropdown"><i class="fas"><ion-icon name="tennisball-outline"></ion-icon></i> <span>LK/OK</span></a>
    <ul class="dropdown-menu">
        <li <?= ($DataLKOK == 'datalkok') ? 'class="active"' : '' ?>><a class="nav-link" href="<?= base_url(); ?>/AdminLK-OK/dataLK-OK">LK/OK</a></li>
        <li <?= ($DataAnggotaLKOK == 'dataanggotalkok') ? 'class="active"' : '' ?>><a class="nav-link" href="<?= base_url(); ?>/AdminLK-OK/dataanggotaLK-OK">Anggota LK/OK</a></li>
    </ul>
</li>
<li class="nav-item <?= ($Event == 'event')  ? 'active' : '' ?>">
    <a href="<?= base_url(); ?>/AdminLK-OK/dataevent" class="nav-link"><i class="fas"><ion-icon name="megaphone-outline"></ion-icon></i> <span>Event</span></a>
</li>