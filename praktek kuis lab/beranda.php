<?php

include("koneksi.php");

$id = $_GET["id"];

$sql = mysqli_query($conn,"SELECT * FROM alumni WHERE id='$id'");
$array = mysqli_fetch_assoc($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e45c3e1c15.js" crossorigin="anonymous"></script>
    <style>
        .container{
            margin-left : 28%;
        }
    </style>
</head>
<body>
    <nav id="nav" class="navbar navbar-dark bg-info">
        <div class="container-fluid">
            <p class="navbar-brand ms-5 fst-bold p-2 mt-2">WEB ALUMNI</p>
                <a href="login.php" class="dropdown-item fst-bold me-5">Log Out</a>
            </div>
        </div>
    </nav>
    <div class="container">
        <h4 class="fst mt-2">Selamat Datang  <?php echo $array["username"]; ?> , <?php echo date("l jS F Y "); ?></h4>
            <table>
                <tr class="row">
                    <td class="col mx-5 p-3">
                        <a href="pesanalumni.php?id=<?php echo $array["id"]; ?>" class="btn btn-success" role="button">Input Pesan Alumni</a>
                    </td>
                    <td class="col mx-5 p-3">
                        <a href="cetakalumni.php?id=<?php echo $array["id"]; ?>" class="btn btn-primary" role="button">Lihat Pesan Alumni</a>
                    </td>
                </tr>
            </table>
        </div>
        <div class="form-group">
        </div>
    </div>
</body>
</html>