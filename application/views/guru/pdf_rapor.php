<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    @media dompdf {
        h4{
            text-align:center
        }
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        .col {
            float: left;
            width: 20%;
            padding: 10px;
            height: 130px;
        }


    }
    </style>
</head>
<body>

        <h4 class="text-success">Rapor Peserta Didik</h4>
        <div class="row">
            <div class="col">
                <p>Nama</p>
                <p>Semester</p>
                <p>Tahun Ajaran</p>
            </div>
            <div class="col">
                <p>: <?= $rapor1[0]['nama']; ?></p>
                <p>: <?= $rapor1[0]['semester']; ?></p>
                <p>: <?= $rapor1[0]['tahun_ajaran']; ?></p>
            </div>
        </div>
            <table border=1>
                <tr>
                    <th rowspan=2>No.</th>
                    <th rowspan=2>Bidang Pengembangan</th>
                    <th colspan=2>Pengetahuan</th>
                    <th colspan=2>Keterampilan</th>
                    <th colspan=2>Sikap</th>
                </tr>
                <tr>
                    <th>Penilaian</th>
                    <th>Deskripsi</th>
                    <th>Penilaian</th>
                    <th>Deskripsi</th>
                    <th>Penilaian</th>
                    <th>Deskripsi</th>
                </tr>
            <?php 
            $no = 1;
            foreach($rapor as $rp) :?>
                <tr>
                    <td><?= $no++;?></td>
                    <td><?= $rp['nama_pengembangan'];?></td>
                    <td><?= $rp['keterampilan'];?></td>
                    <td><?= $rp['deskripsi_keterampilan'];?></td>
                    <td><?= $rp['pengetahuan'];?></td>
                    <td><?= $rp['deskripsi_pengetahuan'];?></td>
                    <td><?= $rp['sikap'];?></td>
                    <td><?= $rp['deskripsi_sikap'];?></td>
                </tr>
            <?php endforeach;?>
            </table>
</body>
</html>