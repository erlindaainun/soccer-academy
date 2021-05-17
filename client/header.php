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
                <li><a class="nav-link scrollto <?php if($_SERVER['SCRIPT_NAME']=="/index.php") echo "active"?>" href="/">Beranda</a></li>
                <li class="dropdown"><a href="#"><span>Profil</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="#">Visi Misi</a></li>
                        <li><a href="#">Sejarah</a></li>
                        <li><a href="#">Pengurus</a></li>
                        <li><a href="#">Prestasi</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#"><span>Program</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="#">Registrasi Anggota</a></li>
                        <li><a href="#">Kelas</a></li>
                    </ul>
                </li>
                <li><a class="nav-link scrollto" href="#contact">Galeri</a></li>
                <li><a class="nav-link scrollto <?php if($_SERVER['SCRIPT_NAME']=="/contact.php") echo "active"?>" href="contact.php">Kontak</a></li>
                <li><a class="getstarted scrollto" href="#about">Registrasi</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->