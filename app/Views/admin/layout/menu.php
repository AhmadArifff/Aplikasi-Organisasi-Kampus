<li class="menu-header">Menu</li>
<li <?= ($Dashboard == 'dashboard') ? 'class="active"' : '' ?>>
    <a href="<?= base_url(); ?>/admin/dashboard" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
</li>
<li class="nav-item <?= ($User == 'user') ? 'active' : '' ?>">
    <a class="nav-link" href="<?= base_url(); ?>/admin/datauser"><i class="far fa-user "></i> <span>Users</span></a>
</li>
<li class="nav-item <?= ($Fakultas == 'fakultas') ? 'active' : '' ?>">
    <a class="nav-link" href="<?= base_url(); ?>/admin/fakultas"><i class="far "><ion-icon name="business-outline"></ion-icon></i> <span>Fakultas</span></a>
</li>
<li class="nav-item <?= ($LKOK == 'lkok')  ? 'active' : '' ?>">
    <a href="<?= base_url(); ?>/admin/LK-OK" class="nav-link"><i class="fas"><ion-icon name="tennisball-outline"></ion-icon></i> <span>LK/OK</span></a>
</li>
<li class="nav-item <?= ($Event == 'event')  ? 'active' : '' ?>">
    <a href="<?= base_url(); ?>/admin/event" class="nav-link"><i class="fas"><ion-icon name="megaphone-outline"></ion-icon></i> <span>Event</span></a>
</li>