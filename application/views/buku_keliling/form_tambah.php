<!-- Begin Page Content -->
<div class="container-fluid">
    <style>
            .container-fluid{
                height: 80vh;
                overflow-y:scroll;
            }
    </style>

    <form action="<?= base_url() ?>buku_keliling/proses_tambah" name="myForm" method="POST" enctype="multipart/form-data"
        onsubmit="return validateForm()">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="d-sm-flex">
                <a href="<?= base_url() ?>buku_keliling" class="btn btn-md btn-circle btn-primary">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <h1 class="h2 mb-0 text-gray-800">Tambah Buku buku_keliling</h1>
            </div>
            <button type="submit" class="btn btn-primary btn-md btn-icon-split">
                <span class="text text-white">Simpan Data</span>
                <span class="icon text-white-50">
                    <i class="fas fa-save"></i>
                </span>
            </button>

        </div>

        <div class="d-sm-flex  justify-content-between mb-0">
            <div class="col-lg-8 mb-4">
                <!-- Illustrations -->
                <div class="card border-bottom-primary shadow mb-4">
                    <div class="card-header py-3 bg-primary">
                        <h6 class="m-0 font-weight-bold text-white">Form Buku</h6>
                    </div>
                    <div class="card-body">

                    <div class="d-sm-flex align-items-center justify-content-between mb-0">
                            <div class="col-lg-6">
                                <!-- Tanggal -->
                                <div class="form-group"><label>Tanggal</label>
                                    <input class="form-control"  name="tanggal" type="date" placeholder="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <!-- No Inventaris -->
                                <div class="form-group"><label>No Inventaris</label>
                                    <input class="form-control" name="no_inventaris" type="text" placeholder="">
                                    <!--<input type="text" readonly class="form-control" value="<?=$no_inventaris;?>" name="no_inventaris">-->
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <!-- Judul Buku -->
                            <div class="form-group"><label>Judul Buku</label>
                                <input class="form-control" name="judul" type="text" placeholder="">
                            </div>
                            <!-- Asal -->
                            <div class="form-group"><label>Asal</label>
                                <input class="form-control" name="asal" type="text" placeholder="">
                            </div>

                            <!-- Pengarang -->
                            <div class="form-group"><label>Pengarang</label>
                                <input class="form-control" name="pengarang" type="text" placeholder="">
                            </div>

                            <!-- Penanggung Jawab -->
                            <div class="form-group"><label>Penanggung Jawab</label>
                                <input class="form-control" name="penanggungjawab" type="text" placeholder="">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <!-- Kota -->
                            <div class="form-group"><label>Kota</label>
                                <input class="form-control" name="kota" type="text" placeholder="">
                            </div>

                            <!-- Penerbit -->
                            <?php if($jmlPenerbit > 0): ?>
                            <div class="form-group"><label>Penerbit</label>
                                <select name="penerbit" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($penerbit as $p): ?>
                                    <option value="<?= $p->penerbit ?>"><?= $p->penerbit ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <?php else: ?>
                            <div class="form-group"><label>Penerbit</label>
                                <input type="hidden" name="penerbit">
                                <div class="d-sm-flex justify-content-between">
                                    <span class="text-danger"><i>(Belum Ada Data Penerbit!)</i></span>
                                    <a href="<?= base_url() ?>penerbit" class="btn btn-sm btn-primary btn-icon-split">
                                        <span class="icon text-white">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <?php endif; ?>
                        
                        </div>

                        <div class="d-sm-flex align-items-center justify-content-between mb-0">
                            <div class="col-lg-4">
                                <!-- Tahunl -->
                                <div class="form-group"><label>Tahun</label>
                                    <input class="form-control" name="tahun" type="number" placeholder="">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <!-- Jumlah Judul -->
                                <div class="form-group"><label>Jumlah Judul</label>
                                    <input class="form-control" name="jumlahjudul" type="number" placeholder="">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <!-- Jumlah EKS -->
                                <div class="form-group"><label>Jumlah EKS</label>
                                    <input class="form-control" name="jumlaheks" type="number" placeholder="">
                                </div>
                            </div>
                        </div>


                        <br>
                    </div>
                </div>

            </div>

            <div class="col-lg-4 mb-4">
                <!-- Illustrations -->
                <div class="card border-bottom-primary shadow mb-4">
                    <div class="card-header py-3 bg-primary">
                        <h6 class="m-0 font-weight-bold text-white">Foto</h6>
                    </div>
                    <div class="card-body">
                        <div class="card bg-warning text-white shadow">
                            <div class="card-body">
                                Format
                                <div class="text-white-45 small">.png .jpeg .jpg .tiff .gif .tif</div>
                            </div>
                        </div>
                        <br>
                        <center>
                            <div id="img">
                                <img src="<?= base_url() ?>assets/icon/book.png" id="outputImg" width="200"
                                    maxheight="300">
                            </div>
                            <div id="pdf">
                                <embed src="<?= base_url() ?>assets/icon/book.png" id="outputPdf" width="300"
                                    height="400" type="application/pdf">
                            </div>
                        </center>
                        <br>
                        <!-- foto -->
                        <div class="form-group">
                            <div class="custom-file">
                                <input class="custom-file-input" type="file" id="GetFile" name="photo"
                                    onchange="VerifyFileNameAndFileSize()" accept=".png,.gif,.jpeg,.tiff,.jpg">
                                <label class="custom-file-label" for="customFile">Pilih File</label>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </form>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/buku_keliling.js"></script>
<script src="<?= base_url(); ?>assets/js/loading.js"></script>
<script src="<?= base_url(); ?>assets/js/validasi/validasiform.js"></script>
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
        timer: 500,
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