<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LAPORAN PENGADAAN BUKU</title>
        <style>
            #table {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
                
            }

            #table td, #table th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            #table tr:nth-child(even){background-color: #f2f2f2;}

            #table tr:hover {background-color: #ddd;}

            #table th {
                padding-top: 10px;
                padding-bottom: 10px;
                text-align:center;
                background-color: #4CAF50;
                color: white;
            }
        </style>
    </head>
    <body>
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
                <div style="text-align:center">
                                
                    <h1 class=""><b> LAPORAN BUKU HIBAH </b></h1> 
                    <br>
                </div>
                            <table id="table" style="text-align:center">
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
    </body>
</html>