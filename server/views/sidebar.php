<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/server/index.php" class="nav-link <?php if ($_SERVER['SCRIPT_NAME'] == "/server/index.php") echo "active" ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dasbor</p>
                    </a>
                </li>
                <li class="nav-header">MANAJEMEN DATA</li>
                <li class="nav-item">
                    <a href="/server/member.php" class="nav-link <?php if ($_SERVER['SCRIPT_NAME'] == "/server/member.php") echo "active" ?>">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Anggota</p>
                    </a>
                </li>
                <li class="nav-item <?php if (
                                        $_SERVER['SCRIPT_NAME'] == "/server/team.php"
                                        || $_SERVER['SCRIPT_NAME'] == "/server/league.php"
                                        || $_SERVER['SCRIPT_NAME'] == "/server/match.php"
                                        || $_SERVER['SCRIPT_NAME'] == "/server/score.php"
                                    ) echo "menu-open" ?>">
                    <a href="#" class="nav-link <?php if (
                                                    $_SERVER['SCRIPT_NAME'] == "/server/team.php"
                                                    || $_SERVER['SCRIPT_NAME'] == "/server/league.php"
                                                    || $_SERVER['SCRIPT_NAME'] == "/server/match.php"
                                                    || $_SERVER['SCRIPT_NAME'] == "/server/score.php"
                                                ) echo "active" ?>">
                        <i class="nav-icon fas fa-futbol"></i>
                        <p>Turnamen<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/server/team.php" class="nav-link <?php if ($_SERVER['SCRIPT_NAME'] == "/server/team.php") echo "active" ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Daftar Tim</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/server/league.php" class="nav-link <?php if ($_SERVER['SCRIPT_NAME'] == "/server/league.php") echo "active" ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Liga</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/server/match.php" class="nav-link <?php if ($_SERVER['SCRIPT_NAME'] == "/server/match.php") echo "active" ?>">
                                <i class=" far fa-circle nav-icon"></i>
                                <p>Pertandingan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/server/score.php" class="nav-link <?php if ($_SERVER['SCRIPT_NAME'] == "/server/score.php") echo "active" ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Skor</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="/server/news.php" class="nav-link <?php if ($_SERVER['SCRIPT_NAME'] == "/server/news.php") echo "active" ?>">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>Berita</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/server/gallery.php" class="nav-link <?php if ($_SERVER['SCRIPT_NAME'] == "/server/gallery.php") echo "active" ?>">
                        <i class="nav-icon fas fa-image"></i>
                        <p>Galeri</p>
                    </a>
                </li>
                <li class="nav-item <?php if (
                                        $_SERVER['SCRIPT_NAME'] == "/server/structure.php"
                                        || $_SERVER['SCRIPT_NAME'] == "/server/achievement.php"
                                    ) echo "menu-open" ?>">
                    <a href="#" class="nav-link <?php if (
                                                    $_SERVER['SCRIPT_NAME'] == "/server/structure.php"
                                                    || $_SERVER['SCRIPT_NAME'] == "/server/achievement.php"
                                                ) echo "active" ?>">
                        <i class="nav-icon fas fa-futbol"></i>
                        <p>Profil<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/server/structure.php" class="nav-link <?php if ($_SERVER['SCRIPT_NAME'] == "/server/structure.php") echo "active" ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pengurus</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/server/achievement.php" class="nav-link <?php if ($_SERVER['SCRIPT_NAME'] == "/server/achievement.php") echo "active" ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Prestasi</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">MANAJEMEN PENGGUNA</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>Pengaturan</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>