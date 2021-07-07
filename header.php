<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

        <div class="logo">
            <h1><a href="/"><img src="assets/img/logo.png" alt="logo"></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto <?php if ($_SERVER['SCRIPT_NAME'] == "/index.php") echo "active" ?>" href="/">Beranda</a></li>
                <li class="dropdown">
                    <a class="<?php if (
                                    $_SERVER['SCRIPT_NAME'] == "/vission-mission.php"
                                    || $_SERVER['SCRIPT_NAME'] == "/history.php"
                                    || $_SERVER['SCRIPT_NAME'] == "/manager.php"
                                    || $_SERVER['SCRIPT_NAME'] == "/achievement.php"
                                ) echo "active" ?>" href="#"><span>Profil</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="vission-mission.php">Visi Misi</a></li>
                        <li><a href="history.php">Sejarah</a></li>
                        <li><a href="manager.php">Pengurus</a></li>
                        <li><a href="achievement.php">Prestasi</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="<?php if (
                                    $_SERVER['SCRIPT_NAME'] == "/class.php"
                                    || $_SERVER['SCRIPT_NAME'] == "/registration-member.php"
                                ) echo "active" ?>" href="#"><span>Program</span> <i class="bi bi-chevron-down"></i>
                    </a>
                    <ul>
                        <li><a class="<?php if ($_SERVER['SCRIPT_NAME'] == "/registration-member.php") echo "active" ?>" href="registration-member.php">Registrasi Anggota</a></li>
                        <li><a class="<?php if ($_SERVER['SCRIPT_NAME'] == "/class.php") echo "active" ?>" href="class.php">Kelas</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="<?php if (
                                    $_SERVER['SCRIPT_NAME'] == "/registration-team.php"
                                    || $_SERVER['SCRIPT_NAME'] == "/schedule.php"
                                    || $_SERVER['SCRIPT_NAME'] == "/standing.php"
                                ) echo "active" ?>" href="#"><span>Turnamen</span> <i class="bi bi-chevron-down"></i>
                    </a>
                    <ul>
                        <li><a class="<?php if ($_SERVER['SCRIPT_NAME'] == "//registration-team.php") echo "active" ?>" href="/registration-team.php">Registrasi Tim</a></li>
                        <li><a class="<?php if ($_SERVER['SCRIPT_NAME'] == "/schedule.php") echo "active" ?>" href="schedule.php">Jadwal Pertandingan</a></li>
                        <li><a class="<?php if ($_SERVER['SCRIPT_NAME'] == "/standing.php") echo "active" ?>" href="standing.php">Klasemen</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="<?php if (
                                    $_SERVER['SCRIPT_NAME'] == "/registration-team.php"
                                    || $_SERVER['SCRIPT_NAME'] == "/match-scheme.php"
                                ) echo "active" ?>" href="#"><span>Liga</span> <i class="bi bi-chevron-down"></i>
                    </a>
                    <ul>
                        <li><a class="<?php if ($_SERVER['SCRIPT_NAME'] == "/registration-team.php") echo "active" ?>" href="/registration-team.php">Registrasi Tim</a></li>
                        <li><a class="<?php if ($_SERVER['SCRIPT_NAME'] == "/match-scheme.php") echo "active" ?>" href="match-scheme.php">Skema Pertandingan</a></li>
                    </ul>
                </li>
                <!-- <li><a class="nav-link scrollto <?php if ($_SERVER['SCRIPT_NAME'] == "/league.php") echo "active" ?>" href="league.php">Liga</a></li> -->
                <li><a class="nav-link scrollto <?php if ($_SERVER['SCRIPT_NAME'] == "/gallery.php") echo "active" ?>" href="gallery.php">Galeri</a></li>
                <li><a class="nav-link scrollto <?php if ($_SERVER['SCRIPT_NAME'] == "/contact.php") echo "active" ?>" href="contact.php">Kontak</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->