    <!-- Begin Page Content -->
    <div class="container-fluid">
    	<style>
    		.container-fluid {
    			height: 80vh;
    			overflow-y: scroll;
    		}
    	</style>

    	<!-- Page Heading -->
    	<ol class="breadcrumb align-items-center justify-content-between mb-4">
    		<li class="breadcrumb-item">
    			<a href="home" style="text-decoration:none">Dashboard</a>
    			<span>/</span>
    			<span>Buku hibah</span>
    		</li>
    		<div class="dropdown">

    			<button class="btn btn-sm btn-primary btn-icon-split" type="button" data-toggle="dropdown" aria-popup="true" aria-expanded="true">
    				<span class="text text-white">Export</span>
    				<span class="icon text-white-50">
    					<i class="fa fa-file-export"></i>
    				</span>
    			</button>

    			<div class="dropdown-menu">
    				<a class="dropdown-item" href="<?= base_url() ?>hibah/ExportPdf"><i class="fas fa-file-pdf"></i> PDF</a>
    				<a class="dropdown-item" href="<?= base_url() ?>hibah/export"><i class="fas fa-file-excel"></i> EXCEL</a>
    			</div>

    			<button class="btn btn-sm btn-primary btn-icon-split" type="button" aria-popup="true" aria-expanded="true">
    				<a href="<?= base_url() ?>hibah/print" style="text-decoration:none">
    					<span class="text text-white">PRINT</span>
    					<span class="icon text-white-50">
    						<i class="fas fa-print"></i>
    					</span>
    				</a>
    			</button>
    		</div>
    	</ol>


    	<center>
    		<br>
    		<h3 class=""><b> LAPORAN BUKU HIBAH </b></h3>
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
    								<th>No Hibah</th>
    								<th>Tanggal</th>
    								<th>Kategori</th>
    								<th>Judul</th>
    								<th>Cetakan</th>
    								<th>Penanggung Jawab</th>
    								<th>Kota</th>
    								<th>Penerbit</th>
    								<th>Tahun</th>
    								<th>Lokasi</th>
    							</tr>
    						</thead>
    						<tbody style="cursor:pointer;">
    							<?php $no = 1;
								foreach ($hibah as $b) { ?>
    								<tr>
    									<td onclick="detail('<?= $b->id ?>')"><?= $no ?></td>
    									<td onclick="detail('<?= $b->id ?>')"><?= $b->no_hibah ?></td>
    									<td onclick="detail('<?= $b->id ?>')"><?= date('d-m-Y', strtotime($b->tanggal)) ?></td>
    									<td onclick="detail('<?= $b->id ?>')"><?= $b->kategori ?></td>
    									<td onclick="detail('<?= $b->id ?>')"><?= $b->judul ?></td>
    									<td onclick="detail('<?= $b->id ?>')"><?= $b->cetakan ?></td>
    									<td onclick="detail('<?= $b->id ?>')"><?= $b->penanggungjawab ?></td>
    									<td onclick="detail('<?= $b->id ?>')"><?= $b->kota ?></td>
    									<td onclick="detail('<?= $b->id ?>')"><?= $b->penerbit ?></td>
    									<td onclick="detail('<?= $b->id ?>')"><?= $b->tahun ?></td>
    									<td onclick="detail('<?= $b->id ?>')"><?= $b->lokasi ?></td>
    								</tr>
    							<?php $no++;
								} ?>
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
    <script src="<?= base_url(); ?>assets/js/hibah.js"></script>
    <script src="<?= base_url(); ?>assets/js/loading.js"></script>
    <?php if ($this->session->flashdata('Pesan')) : ?>
    	<?= $this->session->flashdata('Pesan'); ?>
    <?php else : ?>
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
