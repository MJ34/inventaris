<!-- Begin Page Content -->
<div class="container-fluid">
<style>
            .container-fluid{
                height: 80vh;
            }
    </style>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="d-sm-flex">
            <a href="<?= base_url() ?>buku_keliling" class="btn btn-md btn-circle btn-primary">
                <i class="fas fa-arrow-left"></i>
            </a>
            &nbsp;
            <h1 class="h2 mb-0 text-gray-800">Detail Data</h1>
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
            <div class="card shadow border-bottom-primary mb-4">
                <div class="card-body d-sm-flex">
                    <div class="col-lg-2">
                        <img width="90%" style="border-radius: 10px;"
                            src="<?= base_url() ?>assets/upload/buku_keliling/<?= $d->foto ?>" alt="">
                    </div>

                    <br>
                        

                            <div class="col-sm-5">
                            <div class="card shadow mb-4 border-bottom">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr style="background:#1a75ff">
                                        <td colspan="3"> </td>
                                    </tr>
                                    <tr>
                                        <th width="180px"><h6>Tanggal</h6></th>
                                        <th width="10px">:</th>
                                        <td>
                                            <h6 class="h6 text-gray-800"><?= $d->tanggal?></h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="180px"><h6>No Inventaris</h6></th>
                                        <th width="10px">:</th>
                                        <td>
                                            <h6 class="h6 text-gray-800"><?= $d->no_inventaris?></h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="180px"><h6>Asal</h6></th>
                                        <th width="10px">:</th>
                                        <td>
                                            <h6 class="h6 text-gray-800"><?= $d->asal?></h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="180px"><h6>Penanggung Jawab</h6></th>
                                        <th width="10px">:</th>
                                        <td>
                                            <h6 class="h6 text-gray-800"><?= $d->penanggungjawab?></h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="180px"><h6>Jumlah Judul</h6></th>
                                        <th width="10px">:</th>
                                        <td>
                                            <h6 class="h6 text-gray-800"><?= $d->jumlahjudul?></h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="180px"><h6>Jumlah EKS</h6></th>
                                        <th width="10px">:</th>
                                        <td>
                                            <h6 class="h6 text-gray-800"><?= $d->jumlaheks?></h6>
                                        </td>
                                    </tr>
                                    
                                </table>
                            </div>
                            </div>
                            </div>

                            <div class="col-sm-5">
                            <div class="card shadow mb-4 border-bottom">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr style="background:#1a75ff">
                                        <td colspan="3"> </td>
                                    </tr>
                                    <tr>
                                        <th width="150px"><h6>Judul</h6></th>
                                        <th width="10px">:</th>
                                        <td>
                                            <h6 class="h6 text-gray-800"><?= $d->asal?></h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="150px"><h6>Pengarang</h6></th>
                                        <th width="10px">:</th>
                                        <td>
                                            <h6 class="h6 text-gray-800"><?= $d->pengarang?></h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="150px"><h6>Penerbit</h6></th>
                                        <th width="10px">:</th>
                                        <td>
                                            <h6 class="h6 text-gray-800"><?= $d->penerbit?></h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="150px"><h6>kota</h6></th>
                                        <th width="10px">:</th>
                                        <td>
                                            <h6 class="h6 text-gray-800"><?= $d->kota?></h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="150px"><h6>Tahun</h6></th>
                                        <th width="10px">:</th>
                                        <td>
                                            <h6 class="h6 text-gray-800"><?= $d->tahun?></h6>
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
<script src="<?= base_url(); ?>assets/js/pembelian.js"></script>
<script src="<?= base_url(); ?>assets/js/validasi/hibahform.js"></script>
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