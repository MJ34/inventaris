<!-- Begin Page Content -->
<div class="container-fluid">
<style>
        .container-fluid{
            height: 80vh;
            overflow-y:scroll;
        }
    </style>

    <!-- Page Heading -->
    <ol class="breadcrumb align-items-center justify-content-between mb-4">
    <li class="breadcrumb-item">
        <a href="home" style="text-decoration:none">Dashboard</a>
        <span>/</span>
        <span>Buku Hibah</span>
    </li>
    <a href="<?= base_url() ?>hibah/tambah"  class="btn btn-sm btn-primary btn-icon-split">
            <span class="text text-white">Tambah Data</span>
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
        </a>
    </ol>

    <div class="col-lg-12 mb-4" id="container">

        <!-- Illustrations -->
        <div class="card shadow mb-4 border-bottom-primary">
            <div class="card-body">
                
                <div class="table-responsive">
                    <table class=" table table-bordered table-striped table-hover table" id="dtHorizontalExample" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th>Foto</th>
								<th>No Hibah</th>
                                <th>Tanggal</th>
                                <th>Judul</th>
                                <th>Penanggung Jawab</th>
                                <th>Kota</th>
                                <th>Penerbit</th>
                                <th>Tahun</th>
                                <th>Jumlah Judul</th>
                                <th width="1%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody style="cursor:pointer;">
                            <?php $no=1; foreach ($hibah as $b) { ?>
                            <tr>
                                <td onclick="detail('<?= $b->id ?>')"><?= $no?></td>
                                <td onclick="detail('<?= $b->id ?>')"><img style="border-radius: 5px;"
                                        src="assets/upload/hibah/<?= $b->foto ?>" alt="" width="50px"></td>
                                <td onclick="detail('<?= $b->id ?>')"><?= $b->no_hibah ?></td>
                                <td onclick="detail('<?= $b->id ?>')"><?= date('d-m-Y', strtotime($b->tanggal)) ?></td>
                                <td onclick="detail('<?= $b->id ?>')"><?= $b->judul ?></td>
                                <td onclick="detail('<?= $b->id ?>')"><?= $b->penanggungjawab ?></td>
                                <td onclick="detail('<?= $b->id ?>')"><?= $b->kota ?></td>
                                <td onclick="detail('<?= $b->id ?>')"><?= $b->penerbit ?></td>
                                <td onclick="detail('<?= $b->id ?>')"><?= $b->tahun ?></td>
                                <td onclick="detail('<?= $b->id ?>')"><?= $b->jumlahjudul ?></td>
                                <td>
                                    <center>
                                        <a href="<?= base_url() ?>hibah/ubah/<?= $b->id ?>"
                                            class="btn btn-circle btn-success btn-sm">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <a href="#" onclick="konfirmasi('<?= $b->id ?>')"
                                            class="btn btn-circle btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </center>
                                </td>
                            </tr>
                            <?php $no++;}?>
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
<?php if($this->session->flashdata('Pesan')): ?>
<?= $this->session->flashdata('Pesan'); ?>
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
