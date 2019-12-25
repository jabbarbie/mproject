<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pegawai </title>

    <style>
        h1,h2,h3,h4,h5,h6,p {
            margin: 0;
            padding: 0;
        }
        .judul { 
            font-size: 1.2em;
            color: #013565;

        }
        .judul_sub{
            font-size: 1.4em;
            color: #013565;
            letter-spacing: 0.1em;
            font-weight: bold; 
            text-transform: uppercase;

        }
        .judul_subsub {
            font-size: 0.9em;
            color: #013565;

        }
        /* Wrapper */
        #wrapper {
            text-align: left;
        }
        /* Header */
        header {
            margin-bottom: 2em;

        }
        /*  */
        body {
            font-size: 12px;
            font-family: 'FreeSans';

        }
        table {
            background-color: #e8e8e8;
            margin: 0;
            font-size: 0.9em;
        }
        thead th{
            background-color: #3871c2;
            color: white;
            padding: 0.5em;
            font-weight: normal;
            text-align: center;
        }
        tbody td {
            padding: 0.5em
        }

        .judultable {
            font-size: 0.8em;
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <header>
            <div id="tulisan">
                <p class='judul_sub'>Laporan Pegawai Konsolidasi</p>
                <p class='judul'>PT. BANK MANDIRI (PERSERO) Tbk. & Entitas Anak</p>
            </div>
        </header>

        <div class="judultable">
            <p>Laporan Pegawai</p>
            <p>Untuk periode tanggal 01 Desember 2019 sampai 31 Desemper 2019 </p>
        </div>
        <table border="0" cellspacing=0 width="100%">
            <thead>
                <tr>
                    <th width="10%">No</th>
                    <th >NIK</th>
                    <th>Nama Pegawai</th>    
                    <th>Target</th>
                    <th>Realisasi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $key => $value): ?>
                    <?php
                        $jumlahagen = 0;
                        if(count($value['sate']) > 0) {
                            $jumlahagen = count($value['sate']);

                        }    
                    ?>
                    <tr>
                        <td align=right rowspan="<?= ($jumlahagen+1) ?>" valign="top"><?= ($key+1).'.' ?></td>
                        <td align="center" rowspan="<?= ($jumlahagen+1) ?>" valign="top"><?= $value['nik'] ?></td>
                        <td><?= $value['nama_pegawai'] ?></td>
                        <td align="center"><?= $value['default_target'] ?></td>
                        <td align="center"><?= $value['jumlah'] ?></td>
                    </tr>
                    <?php if($jumlahagen > 0):?>
                    <?php foreach($value['sate'] as $k => $r): ?>
                    <tr>
                        <td><?= $r['nama_agen'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>
</html>