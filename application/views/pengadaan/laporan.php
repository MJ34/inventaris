<?php
function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);

	// variabel pecahkan 1 = tanggal
	// variabel pecahkan 0 = bulan
	// variabel pecahkan 2 = tahun

	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">
<style>
        .container-fluid{
            height: 550px;
            overflow-y:scroll;
        }
    </style>

    <!-- Page Heading -->
    <ol class="breadcrumb align-items-center justify-content-between mb-4">
    <li class="breadcrumb-item">
        <a href="home" style="text-decoration:none">Dashboard</a>
        <span>/</span>
        <span>Pengadaan Buku</span>
    </li>
        <div class="dropdown">  
                <button class="btn btn-sm btn-primary btn-icon-split" type="button" data-toggle="dropdown" aria-popup="true" aria-expanded="true">
                    <span class="text text-white">Export</span>
                    <span class="icon text-white-50">
                    <i class="fa fa-file-export"></i>
                    </span>
                </button>
    
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?= base_url() ?>pengadaan/ExportPdf"><i class="fas fa-file-pdf"></i>  PDF</a>
                    <a class="dropdown-item" href="<?= base_url() ?>pengadaan/export"><i class="fas fa-file-excel"></i>  EXCEL</a>
                </div>
    
                <button class="btn btn-sm btn-primary btn-icon-split" type="button" aria-popup="true" aria-expanded="true">
                        <a href="<?= base_url() ?>pengadaan/print" style="text-decoration:none">
                        <span class="text text-white">PRINT</span>
                        <span class="icon text-white-50">
                        <i class="fas fa-print"></i>
                        </span>
                        </a>
                </button>            
            </div>
    </ol>


        <center>
            <br><h2 class=""><b> LAPORAN PENGADAAN BUKU </b></h2> 
        </center>

        <div class="col-lg-16 mb-2" id="container">

        <!-- Illustrations -->
        <div class=" mb-4 ">
            <div class="card-body">
                
                <div class="table-responsive">
                    <table class=" table table-bordered table-hover table" id="dtHorizontalExample" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th>Tanggal</th>
                                <th>Judul Buku</th>
                                <th>Asal Buku</th>
                                <th>Jumlah</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <?php $no=1; foreach ($pengadaan as $p): ?>
                            <tr>
                                <td><?= $no++ ?>.</td>
                                <td><?= tgl_indo($p->tgl) ?></td>
                                <td><?= $p->judul ?></td>
                                <td><?= $p->asal_buku ?></td>
                                <td><?= $p->jml ?></td>
                                <td><?= $p->ket ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/pengadaan.js"></script>

<?php if($this->session->flashdata('Pesan')): ?>
<?= $this->session->flashdata('Pesan') ?>
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
      
    })
});
</script>
<?php endif; ?>