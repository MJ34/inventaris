<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
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
        <div style="text-align:center">
        
            <h1 class=""><b> LAPORAN BUKU HIBAH </b></h1> 
            <br>
        </div>
        <table id="table" style="text-align:center">
            <thead>
                  <tr>
                    <th width="1%">No</th>
                    <th>Tanggal</th>
                    <th>Kategori</th>
                    <th>Judul</th>
					<th>Cetakan</th>
                    <th>Penanggung Jawab</th>
                    <th>Kota</th>
                    <th>Penerbit</th>
                    <th>Tahun</th>
					<th>Lokasi</th>
                    <th>No Hibah</th>
                </tr>
            </thead>
            <tbody style="cursor:pointer;">
                            <?php $no=1; foreach ($hibah as $b) { ?>
                            <tr>
                                <td onclick="detail('<?= $b->id ?>')"><?= $no?></td>
                                <td onclick="detail('<?= $b->id ?>')"><?= date('d-m-Y', strtotime($b->tanggal)) ?></td>
                                <td onclick="detail('<?= $b->id ?>')"><?= $b->kategori ?></td>
                                <td onclick="detail('<?= $b->id ?>')"><?= $b->judul ?></td>
                                <td onclick="detail('<?= $b->id ?>')"><?= $b->cetakan ?></td>
                                <td onclick="detail('<?= $b->id ?>')"><?= $b->penanggungjawab ?></td>
                                <td onclick="detail('<?= $b->id ?>')"><?= $b->kota ?></td>
                                <td onclick="detail('<?= $b->id ?>')"><?= $b->penerbit ?></td>
                                <td onclick="detail('<?= $b->id ?>')"><?= $b->tahun ?></td>
								<td onclick="detail('<?= $b->id ?>')"><?= $b->lokasi ?></td>
                                <td onclick="detail('<?= $b->id ?>')"><?= $b->no_hibah ?></td>
                            </tr>
                            <?php $no++;}?>
                        </tbody>
        </table>

        <script type="text/javascript">
            window.print();
        </script>

</body>
</html>
