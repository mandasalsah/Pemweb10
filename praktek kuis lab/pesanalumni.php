<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kesan Dan Pesan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e45c3e1c15.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php
    
    include("koneksi.php");
    
    $id = $_GET["id"];
    $sql = mysqli_query($conn,"SELECT * FROM alumni WHERE id='$id'");

    $array = mysqli_fetch_assoc($sql);
    $cek = "";
    if (isset($_POST["btn-simpan"])) {
        $posted         = date("Y-m-d ");
        $name           = $_POST["name"];
        $address        = $_POST["address"];
        $email          = $_POST["email"];
        $tahunlulus     = $_POST["tahunlulus"];
        $pekerjaan      = $_POST["pekerjaan"];
        $message        = $_POST["message"];

        $sql = mysqli_query($conn,"INSERT INTO pesanalumni(id,posted,name,email,address,tahunlulus,pekerjaan,message) VALUES ('','$posted','$name','$email','$address','$tahunlulus','$pekerjaan','$message')");

        if ($sql) {
            header("location: cetakalumni.php?id=".$id."");
        }
    }

    ?>
    <div class="container mt-3">
        <h3 class="alert alert-info text-center">Form Kesan dan Pesan Alumni</h3>
        <form action="<?php $_SERVER["PHP_SELF"];?>" method = "post">
            <div class="form-group">
                <div class="row">
                    <label for="name" class="fst col-sm-2">Nama</label>
                    <div class="col">
                        <input type="text" name="name" id=name class="form-control" value="<?php echo $array["name"]; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group mt-2">
                <div class="row">
                    <label for="address" class="fst col-sm-2">Alamat</label>
                    <div class="col">
                        <input type="text" name="address" id=address class="form-control" value="<?php echo $array["address"]; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group mt-2">
                <div class="row">
                    <label for="email" class="fst col-sm-2">Email</label>
                    <div class="col">
                        <input type="text" name="email" id=email class="form-control" value="<?php echo $array["email"]; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group mt-2">
                <div class="row">
                    <label for="tahunlulus" class="fst col-sm-2">Tahun Lulus</label>
                    <div class="col">
                        <input type="text" name="tahunlulus" id=tahunlulus class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group mt-2">
                <div class="row">
                    <label for="pekerjaan" class="fst col-sm-2">Pekerjaan</label>
                    <div class="col">
                        <input type="text" name="pekerjaan" id=pekerjaan class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group mt-2">
                <div class="row">
                    <label for="messange" class="fst col-sm-2">Kesan dan Pesan</label>
                    <div class="col">
                        <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group mt-2 mt-3 gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" name="btn-simpan" class="btn btn-success">SIMPAN</button>
            </div>
        </form>
    </div>
</body>
</html>