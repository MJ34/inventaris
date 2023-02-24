<?php  
  header ("Cache-Control: no-cache, must-revalidate");
    header ("Pragma: no-cache");
    header ("Content-type: application/x-msexcel");
    header ("Content-type: application/octet-stream");
    header ("Content-Disposition: attachment; filename= LAPORAN PENGADAAN BUKU.xls");

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

                        <style type="text/css">
                        table,th,td{
                            border-collapse: collapse;
                            padding: 15px;
                            margin: 10px;
                            color: #000;
                            width: 80%;
                            text-align:center;
                        }
                        table th {
                            padding-top: 10px;
                            padding-bottom: 50px;
                            background-color: yellow;
                            color: white;
                        }
                        </style>


                        <div style="text-align: center;">
                        <span style="margin-left: 20px;font-size: 30px;"><b>LAPORAN PENGADAAN BUKU</b></span>
                        <br><br>
                        <table border="1">

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