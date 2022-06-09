<?php

include("koneksip.php");
$sql = mysqli_query($koneksi,"SELECT * FROM daftarbaru");
if (!$sql) {
    die("Gagal Cetak Data");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
        .container{
            width: 80%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h4 class="alert alert-primary fst text-center mt-3" role="alert">DATA SISWA BARU</h4>
        <table class="table table-bordered border-dark">
            <tr class="text text-center">
                <th>No</th>
                <th>Jenis Pendaftaran</th>
                <th>SKHUN</th>
                <th>Ijazah</th>
                <th>Nama Lengkap</th>
                <th>Jenis Kelamin</th>
                <th>NISN</th>
                <th>alamat</th>
                <th>Email</th>

            </tr>
            <tr>
                <?php
                $no = 1;
                while ($data = mysqli_fetch_row($sql)) {
                    echo "<tr>
                    <td>$no</td>
                    <td>$data[1]</td>
                    <td>$data[2]</td>
                    <td>$data[3]</td>
                    <td>$data[4]</td>
                    <td>$data[5]</td>
                    <td>$data[6]</td>
                    <td>$data[7]</td>
                    <td>$data[8]</td>
                    </tr>";
                    $no++;
                }
                ?>
            </tr>
        </table>
        <div class="form-group gap-2 d-md-flex justify-content-md-end">
            <a href="formpendaftaran.php" role="button" class="btn btn-danger">TAMBAH BARU</a>
            <a href="reportdatasiswabaruexcel.php" role="button" class="btn btn-success">EXPORT TO EXCEL</a>
        </div>
    </div>
</body>
</html>