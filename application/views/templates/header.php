<?php 
	if(!$this->session->userdata('login') == 'perpusweb'){
        redirect('login');
        exit;
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
	<!-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="<?= base_url(); ?>assets/icon/jateng.png">

    <title>SINOBAN | <?= $title ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>assets/sbadmin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>assets/sbadmin/css/sb-admin-blue.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/profileee.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/all.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/animate/animate.min.css" rel="stylesheet">
    <!-- Select Chosen -->
    <link href="<?= base_url(); ?>assets/plugin/datepicker/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">
    <!-- Select Chosen -->
    <link href="<?= base_url(); ?>assets/plugin/chosen/dist/css/component-chosen.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="<?= base_url(); ?>assets/sbadmin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <style type="text/css">
        .upper { text-transform: uppercase; }
        .lower { text-transform: lowercase; }
        .cap   { text-transform: capitalize; }
        .small-cap { font-variant:   small-caps; }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() ?>home">
                <div class="sidebar-brand-icon ">
                    <img src="<?= base_url(); ?>assets/icon/jateng.png" width="50">
                </div>
                <div class="sidebar-brand-text mx-3 ">SINOBAN</div>
                
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <?php if($title == 'Dashboard'): ?>
            <li class="nav-item active">
                <?php else: ?>
            <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link" href="<?= base_url(); ?>home">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

             <!-- Divider -->
             <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Kelola Data
            </div>

             <?php if($this->session->userdata('level') == 'Administrasi'): ?>
            <?php if($title == 'User' or $title == 'pegawai'): ?>
            <li class="nav-item active">
                <?php else: ?>
            <li class="nav-item">
            <?php endif; ?>
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
                    aria-controls="collapsePages">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Data Pengguna</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data Pengguna</h6>
                        <a class="collapse-item active" href="<?= base_url() ?>user"><i class="fa fa-address-book"></i> User</a>
                        <a class="collapse-item active" href="<?= base_url() ?>pegawai"><i class="fa fa-address-card"></i> Data Pegawai</a>
                    </div>
            </li>

            <?php endif; ?>

            <?php if($this->session->userdata('level') == 'Petugas'): ?>
            
                <?php if($title == 'Data Pegawai'): ?>
                    <li class="nav-item active">
                        <?php else: ?>
                    <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link" href="<?= base_url() ?>pegawai">
                    <i class="fa fa-address-card"></i>
                    <span>Data Pegawai</span>
                </a>
            </li>
            <?php endif; ?>

            <?php if($this->session->userdata('level') == 'Administrasi' || $this->session->userdata('level') == 'Petugas'): ?>

            <!-- Nav Item - Pages Collapse Menu -->
            <?php if($title == 'Buku'  or $title == 'Kategori' or $title == 'Penerbit' or $title == 'Rak'): ?>
            <li class="nav-item active">
                <?php else: ?>
            <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages1" aria-expanded="true"
                    aria-controls="collapsePages">
                    <i class="fas fa-fw fa-edit"></i>
                    <span>Data Master</span>
                </a>
                <div id="collapsePages1" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data Master</h6>
                        <a class="collapse-item active" href="<?= base_url() ?>buku"><span class="fa fa-book"></span> Buku</a>
                        <a class="collapse-item active" href="<?= base_url() ?>kategori"><span class="fa fa-list-alt"></span>  Kategori</a>
                        <a class="collapse-item active" href="<?= base_url() ?>penerbit"><span class="fas fa-book-open"> Penerbit</a>
                        <a class="collapse-item active" href="<?= base_url() ?>rak"><i class="fa fa-align-justify"></i> Rak</a>
						<a class="collapse-item active" href="<?= base_url() ?>lokasi"><i class="fa fa-align-justify"></i> Lokasi</a>
                    </div>

                </div>
            </li>

            <?php if($title == 'Inventaris'): ?>
            <li class="nav-item active">
                <?php else: ?>
            <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link" href="<?= base_url() ?>pembelian">
                    <i class="fa fa-cart-plus"></i>
                    <span>Inventaris Buku</span>
                </a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <!-- <?php if($title == 'pembelian'  or $title == 'hibah' or $title == 'buku_keliling'): ?>
            <li class="nav-item active">
                <?php else: ?>
            <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages2" aria-expanded="true"
                    aria-controls="collapsePages">
                    <i class="fas fa-fw fa-random"></i>
                    <span>Data Transaksi</span>
                </a>
                <div id="collapsePages2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data Transaksi</h6>
                        <a class="collapse-item active" href="<?= base_url() ?>pembelian"><span class="fa fa-cart-arrow-down"></span> Pembelian Buku</a>
                        <a class="collapse-item active" href="<?= base_url() ?>hibah"><i class="fa fa-handshake"></i> Hibah Buku</a>
                        <a class="collapse-item active" href="<?= base_url() ?>buku_keliling"><span class="fa fa-truck"></span> P.Buku Keliling</a>
                    </div>

                </div>
            </li> -->

            <?php endif; ?>


            <!-- Divider -->
            <hr class="sidebar-divider">

            <?php if($this->session->userdata('level') == 'Administrasi' || $this->session->userdata('level') == 'Kepala'): ?>

            <!-- Heading -->
            <div class="sidebar-heading">
                Laporan
            </div>

            <!-- Nav Item - Pages Collapse Menu  laporan-->
            <?php if($title == 'laporan_Pengadaan' or $title == 'laporan_pembelian'  or $title == 'laporan_hibah' or $title == 'laporan_buku_keliling'): ?>
            <li class="nav-item active">
                <?php else: ?>
            <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages3" aria-expanded="true"
                    aria-controls="collapsePages">
                    <i class="fas fa-fw fa-print"></i>
                    <span>Laporan</span>
                </a>
                <div id="collapsePages3" class="collapse" aria-labelledby="headingPages"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Laporan</h6>
                        <!-- <a class="collapse-item active" href="<?= base_url() ?>laporan/pengadaan">Pengadaan Buku</a> -->
                        <a class="collapse-item active" href="<?= base_url() ?>laporan/pembelian">INVENTARIS Buku</a>
                        <!-- <a class="collapse-item active" href="<?= base_url() ?>laporan/hibah">Hibah Buku</a> -->
                        <!-- <a class="collapse-item active" href="<?= base_url() ?>laporan/buku_keliling">P.Buku Keliling</a> -->
                    </div>

                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu  statistik
            <?php if($title == 'Laporan statistik Pengadaan' or $title == 'Laporan statistik Peminjaman'): ?>
            <li class="nav-item active">
                <?php else: ?>
            <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages4" aria-expanded="true"
                    aria-controls="collapsePages">
                    <i class="fa fa-chart-line"></i>
                    <span>Statistik</span>
                </a>
                <div id="collapsePages4" class="collapse" aria-labelledby="headingPages"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Statistik</h6>
                        <a class="collapse-item active" href="<?= base_url() ?>pembelian/exel">Pengadaan Buku</a>
                        <a class="collapse-item active" href="<?= base_url() ?>pembelian/statistik">Pembelian Buku</a>
                        <a class="collapse-item active" href="<?= base_url() ?>hibah/statistik">Hibah Buku</a>
                    </div>

                </div>
            </li>-->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <?php endif; ?>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Teks heading berjalan -->
                    <marquee ><b>SELAMAT DATANG <span class="upper" id="namaP"><?= $this->session->userdata('username') ?></span> DI SINOBAN WEB PERPUSTAKAAN JAWA TENGAH</b></marquee>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>



                        <!-- Nav Item - Alerts 
                        <li class="nav-item dropdown no-arrow mx-1 bounceIn">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>

                                <span class="badge badge-danger badge-counter">1</span>
                            </a>
                            -->
                            <!-- Dropdown - Alerts 
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Notifikasi
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-cog text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">8 Agustus, 2022</div>
                                        <span class="font-weight-bold">Aplikasi masih dalam pengembangan _Sabar BOSS_.</span>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Tampilkan Semua
                                    Notifikasi</a>
                            </div>
                            -->
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small" id="namaP"><?= $this->session->userdata('username') ?></span>
                                <input type="hidden" name="iduser" id="iduser" value="<?= $this->session->userdata('id_user') ?>">
                                <img class="img-profile rounded-circle" id="img"
                                    src="<?= base_url() ?>assets/upload/pengguna/<?= $this->session->userdata('foto') ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= base_url() ?>profile">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                               
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item logout" href="#" id="logout" onclick="logout()">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                
                <!-- Link BASE_URL buat file JS -->
                <input type="hidden" value="<?= base_url() ?>" id="baseurl">
