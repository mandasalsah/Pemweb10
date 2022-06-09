<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <?php
    
    include("koneksi.php");
    
    $cek = "";
    if (isset($_POST["btn-daftar"])) {
        $name       = $_POST["name"];
        $address    = $_POST["address"];
        $email      = $_POST["email"];
        $angkatan   = $_POST["angkatan"];
        $jurusan    = $_POST["jurusan"];
        $username   = $_POST["username"];
        $password   = $_POST["password"];

        $sql = mysqli_query($conn,"INSERT INTO alumni(id,name,address,email,angkatan,jurusan,username,password) VALUES ('','$name','$address','$email','$angkatan','$jurusan','$username','$password')");

        if ($sql) {
            $cek = "Pendaftaran Berhasil";
        }
    }

    ?>
    <div class="container mt-3">
    <h3 class="alert alert-info fast text-center">Form Pendaftaran Akun Alumni</h3>
    <form action="<?php $_SERVER["PHP_SELF"];?>" method = "post">
    <div class="form-group">
        <div class="row">
                <label for="name" class="fst col-sm-2">Nama </label>
            <div class="col">
                <input type="text" name="name" id="name" class="form-control">
            </div>
        </div>
    </div>    
    <div class="form-group">
        <div class="row">
            <label for="address" class="fst col-sm-2">Alamat </label>  
            <div class="col">
                <input type="text" name="address" id="address" class="form-control">
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <label for="email" class="fst col-sm-2">Email </label>  
            <div class="col">
                <input type="text" name="email" id="email" class="form-control">
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <label for="angkatan" class="fst col-sm-2">Angkatan </label>  
            <div class="col">
                <input type="text" name="angkatan" id="angkatan" class="form-control">
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <label for="jurusan" class="fst col-sm-2">Jurusan </label>  
            <div class="col">
                <input type="text" name="jurusan" id="jurusan" class="form-control">
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <label for="username" class="fst col-sm-2">Username </label>  
            <div class="col">
                <input type="text" name="username" id="username" class="form-control">
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <label for="password" class="fst col-sm-2">Password </label>  
            <div class="col">
                <input type="password" name="password" id="password" class="form-control">
            </div>
        </div>
    </div>
    <div class="form-group mt-2">
        <button type="submit" class="btn btn-success" name="btn-daftar">DAFTAR</button>  
        <a href="login.php" class="btn btn-info" role="button">LOGIN</a>
    </div>
    </form>
    <small class="<?php echo($cek !="" ? "is-invalid" : ""); ?>"><?php echo $cek; ?></small>
    </div>
</body>
</html>