<!-- Begin Page Content -->
<div class="container-fluid">
<style>
        .container-fluid{
            height: 550px;
            overflow-y:scroll;
        }
    </style>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="d-sm-flex">
            <a href="<?= base_url() ?>pegawai" class="btn btn-md btn-circle btn-primary">
                <i class="fas fa-arrow-left"></i>
            </a>
            &nbsp;
            <h1 class="h2 mb-0 text-gray-800">Detail pegawai</h1>
        </div>
        <!-- 
            <button type="submit" class="btn btn-primary btn-md btn-icon-split">
                <span class="text text-white">Simpan Data</span>
                <span class="icon text-white-50">
                    <i class="fas fa-save"></i>
                </span>
            </button>
            -->
    </div>

    <?php foreach ($data as $d): ?>

    <div class="d-sm-flex  justify-content-between mb-0">
        <div class="col-lg-12 mb-4">
            <!-- buku -->
            <div class="card border-bottom-primary shadow mb-4">
                <div class="card-body d-sm-flex">
                    <div class="col-lg-3">
                        <img width="80%" style="border-radius: 10px;"
                            src="<?= base_url() ?>assets/upload/pegawai/<?= $d->foto ?>" alt="">
                    </div>

                    <br>

                    <div class="col-sm-9">
                            <div class="card shadow mb-4 border-bottom">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr style="background:#1a75ff">
                                        <td colspan="3"> </td>
                                    </tr>
                                    <tr>
                                        <th width="180px"><h6>ID pegawai</h6></th>
                                        <th width="10px">:</th>
                                        <td>
                                            <h8 class="h8 text-gray-800"><b><?= $d->id_pegawai ?></b></h8>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="180px"><h6>Nama Lengkap</h6></th>
                                        <th width="10px">:</th>
                                        <td>
                                            <h8 class="h8 text-gray-800"><?= $d->nama_lengkap ?></h8>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="180px"><h6>Telephone</h6></th>
                                        <th width="10px">:</th>
                                        <td>
                                            <h8 class="h8 text-gray-800"><?= $d->notelp ?></h8>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="180px"><h6>Tempat</h6></th>
                                        <th width="10px">:</th>
                                        <td>
                                            <h8 class="h8 text-gray-800"><?= $d->tempat ?></h8>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="180px"><h6>Tanggal Lahir</h6></th>
                                        <th width="10px">:</th>
                                        <td>
                                            <h8 class="h8 text-gray-800"><?= $d->tgllahir ?></h8>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="180px"><h6>Umur</h6></th>
                                        <th width="10px">:</th>
                                        <td>
                                            <h8 class="h8 text-gray-800"><?= $d->umur ?></h8>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="180px"><h6>Alamat</h6></th>
                                        <th width="10px">:</th>
                                        <td>
                                            <h8 class="h8 text-gray-800"><?= $d->alamat ?></h8>
                                        </td>
                                    </tr>
                                    
                                </table>
                            </div>
                            </div>
                    </div>

                </div>
            </div>

        </div>

        <?php endforeach; ?>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/pegawai.js"></script>
<script src="<?= base_url(); ?>assets/js/validasi/formpegawai.js"></script>
<script src="<?= base_url(); ?>assets/plugin/chosen/chosen.jquery.min.js"></script>

<script>
$('.chosen').chosen({
    width: '100%',

});
</script>

<?php if($this->session->flashdata('Pesan')): ?>

<?php else: ?>
<script>
$(document).ready(function() {

    $('#pdf').hide();

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