<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>

    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">

    <style>
        .table-bordered th,
        .table-bordered thead th,
        .table-bordered td {
            border: 1px solid #000;
        }
    </style>

</head>

<body>
    <div class="container">
        <h3 class="mb-0">KLINIK MITRA MEDIKA</h3>
        <small>Jalanin Aja Dulu Desa Harapan Palsu</small>
        <hr>
        <h4 class="text-center">LAPORAN DATA KUNJUNGAN</h4>

        <table class="table table-bodered table-sm">
            <tr>
                <th>No.</th>
                <th>tgl. Kunjungan</th>
                <th>Nama Pasien</th>
                <th>L/P</th>
                <th>Umur</th>
                <th>Keluhan</th>
                <th>Diagnosa</th>
                <th>Penatalaksanaan</th>
            </tr>
            <?php $no = 1;
            foreach ($kunjungan as $r) { ?>
                <tr>
                    <td class="text-center"><?= $no; ?></td>
                    <td><?= $r['tgl_berobat']; ?></th>
                    <td><?= $r['nama_pasien']; ?></th>
                    <td><?= $r['jenis_kelamin']; ?></th>
                    <td><?= $r['umur']; ?></th>
                    <td><?= $r['keluhan_pasien']; ?></th>
                    <td><?= $r['hasil_diagnosa']; ?></th>
                    <td><?= $r['jenis_kelamin']; ?></th>
                </tr>
            <?php $no++;
            } ?>
        </table>
        <br>
        <table width="100%">
            <tr>
                <td></td>
                <td width="300px">
                    <p>
                        Bekasi Timur, <?= date('d-m-Y'); ?>
                        <br>
                        Administrator,
                        <br><br><br><br>
                        <b>____________________________</b>
                    </p>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>