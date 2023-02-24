<?php foreach ($data as $d) { ?>

<!-- Begin Page Content -->
<div class="container-fluid">
<style>
            .container-fluid{
                height: 80vh;
                overflow-y:scroll;
            }
    </style>

    <form action="<?= base_url() ?>hibah/proses_ubah" name="myForm" method="POST" enctype="multipart/form-data"
        onsubmit="return validateForm()">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="d-sm-flex">
                <a href="<?= base_url() ?>hibah" class="btn btn-md btn-circle btn-primary">
                    <i class="fas fa-arrow-left"></i>
                </a>
                &nbsp;
                <h3 class="h2 mb-0 text-gray-800">Ubah Data</h3>
            </div>
            <button type="submit" class="btn btn-success btn-md btn-icon-split">
                <span class="text text-white">Simpan Perubahan</span>
                <span class="icon text-white-50">
                    <i class="fas fa-save"></i>
                </span>
            </button>

        </div>

        <div class="d-sm-flex  justify-content-between mb-0">
            <div class="col-lg-8 mb-4">
                <!-- Illustrations -->
                <div class="card border-bottom-primary shadow mb-4">
                    <div class="card-header bg-primary py-3">
                        <h6 class="m-0 font-weight-bold text-white">Form Edit Buku hibah</h6>
                    </div>
                    <div class="card-body">
                        <div class="d-sm-flex align-items-center justify-content-between mb-0">
                            <div class="col-lg-6">
                                <!-- Tanggal -->
                                <div class="form-group"><label>Tanggal</label>
                                    <input class="form-control" name="tanggal" type="date" value="<?= $d->tanggal ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <!-- No Inventaris -->
                                <div class="form-group"><label>No Inventaris</label>
                                    <input class="form-control" name="no_inventaris" type="text"  value="<?= $d->no_inventaris ?>">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <!-- Judul Buku -->
                            <div class="form-group"><label>Judul Buku</label>
                                <input class="" name="id" type="hidden" value="<?= $d->id ?>">
                                <input class="form-control" name="judul" type="text" value="<?= $d->judul ?>">
                            </div>
                            <!-- Asal -->
                            <div class="form-group"><label>Asal</label>
                                <input class="form-control" name="asal" type="text" value="<?= $d->asal ?>">
                            </div>

                            <!-- Pengarang -->
                            <div class="form-group"><label>Pengarang</label>
                                <input class="form-control" name="pengarang" type="text" value="<?= $d->pengarang ?>">
                            </div>

                            <!-- Penanggung Jawab -->
                            <div class="form-group"><label>Penanggung Jawab</label>
                                <input class="form-control" name="penanggungjawab" type="text" value="<?= $d->penanggungjawab ?>">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <!-- Kota -->
                            <div class="form-group"><label>Kota</label>
                                <input class="form-control" name="kota" type="text" value="<?= $d->kota ?>">
                            </div>

                             <!-- Penerbit -->
                             <?php if($jmlPenerbit > 0): ?>
                            <div class="form-group"><label>Penerbit</label>
                                <select name="penerbit" class="form-control chosen" value="<?= $d->penerbit ?>">
                                    <?php foreach($penerbit as $p): ?>

                                    <?php if($d->penerbit == $p->penerbit): ?>
                                    <option value="<?= $p->penerbit ?>" selected><?= $p->penerbit ?></option>
                                    <?php else: ?>
                                    <option value="<?= $p->penerbit ?>"><?= $p->penerbit ?></option>
                                    <?php endif; ?>

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
                                    <input class="form-control" name="tahun" type="number" value="<?= $d->tahun ?>">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <!-- Jumlah Judul -->
                                <div class="form-group"><label>Jumlah Judul</label>
                                    <input class="form-control" name="jumlahjudul" type="number" value="<?= $d->jumlahjudul ?>">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <!-- Jumlah EKS -->
                                <div class="form-group"><label>Jumlah EKS</label>
                                    <input class="form-control" name="jumlaheks" type="number" value="<?= $d->jumlaheks ?>">
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
                                <img src="<?= base_url() ?>assets/upload/hibah/<?= $d->foto ?>" id="outputImg"
                                    width="200" maxheight="300">
                            </div>
                            <div id="pdf">
                                <embed src="<?= base_url() ?>assets/upload/hibah/<?= $d->foto ?>" id="outputPdf"
                                    width="300" height="400" type="application/pdf">
                            </div>
                        </center>
                        <br>
                        <span class="text-danger">*kosongkan jika tidak ingin merubah</span>
                        <!-- foto -->
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="hidden" name="fotoLama" value="<?= $d->foto ?>">
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
<script src="<?= base_url(); ?>assets/js/hibah.js"></script>
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

<?php } ?>