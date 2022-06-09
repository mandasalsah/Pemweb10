<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Alumni</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e45c3e1c15.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php
    
    include("koneksi.php");
    $id = $_GET["id"];
    $sql = mysqli_query($conn,"SELECT * FROM pesanalumni ORDER BY name");
    if (!$sql) {
        die("Gagal Cetak data");
    }
    
    ?>
    <div class="container mt-3">
        <h4 class="alert alert-info text-center">DATA PESAN ALUMNI</h4>
        <table class="table table-bordered border-dark">
            <tr class="table-active text-center">
                <th>No</th>
                <th>Tanggal Kirim</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Tahun Lulus</th>
                <th>Pekerjaan</th>
                <th>Pesan</th>
                <th>Opsi</th>
            </tr>
            <tr>
            <?php
            $no=1;
            while($array = mysqli_fetch_row($sql)){
                echo "<tr class='text-center'>
                <td>$no</td>
                <td>$array[1]</td>
                <td>$array[2]</td>
                <td>$array[3]</td>
                <td>$array[4]</td>
                <td>$array[5]</td>
                <td>$array[6]</td>
                <td>$array[7]</td>
                <td><a href='editalumni.php?id=".$array["0"]."&user=".$id."' class='btn btn-success' role='button'>Edit</a> <a href='hapusalumni.php?id=".$array["0"]."&user=".$id."' class='btn btn-danger' role='button'>Hapus</a></td>
                </tr>";
                $no++;
            }
            ?>
            </tr>
        </table>
        <a href="beranda.php?id=<?php echo $id; ?>" class="btn btn-info" role="button">KEMBALI</a>
    </div>
</body>
</html>