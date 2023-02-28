<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#" style="text-decoration:none">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">My Dashboard</li>
</ol>
    

    <!-- Content Row -->
    <div class="row">

    <!-- Akses dashbord Admin dan petugas -->
    <?php if($this->session->userdata('level') == 'Administrasi'): ?>
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4" id="User">
        <a href="user" style="text-decoration:none">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h4 text-xs-800 font-weight-bold text-primary text-uppercase mb-1">User
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        </div>

        <?php endif; ?>

    <!-- Akses dashbord Admin dan petugas -->
    <?php if($this->session->userdata('level') == 'Administrasi' || $this->session->userdata('level') == 'Petugas'): ?>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4" id="pegawai">
        <a href="pegawai" style="text-decoration:none">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pegawai
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jmlpegawai ?> Orang</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-tie fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <!-- <div class="col-xl-3 col-md-6 mb-4" id="buku">
        <a href="buku" style="text-decoration:none">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Buku
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jmlbuku ?> Buah</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        </div> -->

        <!-- Earnings (Monthly) Card Example -->
        <!-- <div class="col-xl-3 col-md-6 mb-4" id="pengadaan">
        <a href="pengadaan" style="text-decoration:none">
            <div class="card border-left-success shadow h-100 py-2">
            <div style="cursor:pointer;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pengadaan</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $jmlpengadaan ?> Data
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-cart-plus fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </a>
        </div> -->
         <!-- Earnings (Monthly) Card Example -->
         <!-- <div class="col-xl-3 col-md-6 mb-4" id="hibah">
        <a href="hibah" style="text-decoration:none">
            <div class="card border-left-warning shadow h-100 py-2">
            <div style="cursor:pointer;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Data Buku Hibah</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $jmlhibah ?> Data
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                        <i class="fa fa-handshake fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </a>
        </div> -->

                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4"  id="pembelian">
        <a href="peminjaman" style="text-decoration:none">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Data Buku Inventaris
                            
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jmlpembelian ?> Data</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-cart-arrow-down fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </a>

                <!-- Pending Requests Card Example -->
                <!-- <div class="col-xl-3 col-md-6 mb-4"  id="pembelian_Buku_Keliling">
                <a href="buku_keliling" style="text-decoration:none">
                    <div class="card border-left-secondary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">pembelian Buku Keliling
                                    
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jmlbuku_keliling ?> Data</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-truck fa-3x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                </div> -->

                <?php endif; ?>

                <!-- Akses dashbord Kepala -->
                <?php if($this->session->userdata('level') == 'Kepala'): ?>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4" id="L1">
                <a href="laporan/pengadaan" style="text-decoration:none">
                    <div class="card border-left-success shadow h-100 py-2">
                    <div style="cursor:pointer;">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Laporan Pengadaan Buku</div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $jmlpengadaan ?> Data
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-file fa-3x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </a>
                </div>
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4" id="L2">
                <a href="laporan/hibah" style="text-decoration:none">
                    <div class="card border-left-warning shadow h-100 py-2">
                    <div style="cursor:pointer;">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Laporan Buku Hibah</div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $jmlhibah ?> Data
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                <i class="fas fa-file fa-3x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </a>
                </div>

                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4"  id="L3">
                <a href="laporan/pembelian" style="text-decoration:none">
                    <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Laporan Buku Pembelian
                                    
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jmlpembelian ?> Data</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-file fa-3x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </a>

                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4"  id="L4">
                <a href="laporan/buku_keliling" style="text-decoration:none">
                    <div class="card border-left-secondary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Laporan P.Buku Keliling
                                    
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jmlbuku_keliling ?> Data</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-file fa-3x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
                </div>



                <?php endif; ?>




   <!-- <div class="row">

        <!-- Area laporan Chart 

        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4" id="grafik">

                <!-- Card Header - Dropdown
                
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-gradient-primary">
                    <h6 class="m-0 font-weight-bold border-0 text-white">Statistik Peminjaman</h6>
                    
                    <div class="col-lg-2">
                        <select name="tahun" id="tahun" class="form-control" onchange="filterTahun()">
                            <option value="<?= $yearnow ?>"><?= $yearnow ?></option>
                            <option value="<?= $previousyear ?>"><?= $previousyear ?></option>
                            <option value="<?= $twoyearago ?>"><?= $twoyearago ?></option>
                        </select>
                    </div>
                </div>
                <!-- Card Body 
                <div class="card-body">
                    <div class="chart-area" id="chart">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>-->

            </div>
        </div>
    </div>

    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Page level plugins -->
<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/sbadmin/vendor/chart.js/Chart.min.js"></script>
<!-- Page level custom scripts -->
<script src="<?= base_url(); ?>assets/js/chart/chart-area.js"></script>

<script src="<?= base_url(); ?>assets/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="<?= base_url(); ?>assets/js/dashboard.js"></script>

<?php if($this->session->flashdata('Pesan')): ?>

<?php else: ?>
<script>
$(document).ready(function() {
    let timerInterval
    Swal.fire({
        title: 'Memuat...',
        timer: 1000,
        onBeforeOpen: () => {
            Swal.showLoading()
        },
        onClose: () => {
            clearInterval(timerInterval)
        }
    }).then((result) => {
        $("user").addClass("bounceIn");
        $("#pegawai").addClass("bounceIn");
        $("#buku").addClass("bounceIn");
        $("#pengadaan").addClass("bounceIn");
        $("#pembelian").addClass("bounceIn");
        $("#hibah").addClass("bounceIn");
        $("#pembelian_Buku_Keliling").addClass("bounceIn");
        $("#L1").addClass("bounceIn");
        $("#L2").addClass("bounceIn");
        $("#L3").addClass("bounceIn");
        $("#L4").addClass("bounceIn");
        $("#top3pegawai").addClass("bounceIn");
        $("#grafik").addClass("bounceIn");
        
    })
});
</script>
<?php endif; ?>
