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
            <a href="<?= base_url() ?>user" class="btn btn-md btn-circle btn-primary">
                <i class="fas fa-arrow-left"></i>
            </a>
            &nbsp;
            <h1 class="h2 mb-0 text-gray-800">Detail User</h1>
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
                            src="<?= base_url() ?>assets/upload/pengguna/<?= $d->foto ?>" alt="">
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
                                        <th width="180px"><h6>ID User</h6></th>
                                        <th width="10px">:</th>
                                        <td>
                                            <h6 class="h6 text-gray-800"><b><?= $d->id_user ?></b></h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="180px"><h6>Nama User</h6></th>
                                        <th width="10px">:</th>
                                        <td>
                                            <h6 class="h6 text-gray-800"><?= $d->nama ?></h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="180px"><h6>Telepon</h6></th>
                                        <th width="10px">:</th>
                                        <td>
                                            <h6 class="h6 text-gray-800"><?= $d->notelp ?></h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="180px"><h6>Email</h6></th>
                                        <th width="10px">:</th>
                                        <td>
                                            <h6 class="h6 text-gray-800"><?= $d->email ?></h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="180px"><h6>Level</h6></th>
                                        <th width="10px">:</th>
                                        <td>
                                            <h6 class="h6 text-gray-800"><?= $d->level ?></h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="180px"><h6>Status</h6></th>
                                        <th width="10px">:</th>
                                        <td>
                                                <?php if($d->status == "Aktif"): ?>
                                            <h6 class="h6 text-success">
                                                <?php else: ?>
                                            <h6 class="h6 text-gray-800">
                                                <?php endif; ?>
                                                <?= $d->status ?>
                                            </h6>
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
<script src="<?= base_url(); ?>assets/js/pengguna.js"></script>

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

    })
});
</script>
<?php endif; ?>