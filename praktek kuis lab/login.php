<?php

include("koneksi.php");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
        .container{
            width: 35%;
            margin-top: 9pc;
            box-shadow: 0 3px 20px rgba(0, 0, 0, 0.3);
            padding : 25px;
        }
    </style>
</head>
<body>
    <?php
    
    $validasi = "";
    if (isset($_POST["btn-login"])) {
        $username   = $_POST["username"];
        $password   = $_POST["password"];

        $sql = mysqli_query($conn,"SELECT * FROM alumni WHERE username='$username'");

        if (mysqli_num_rows($sql) == 1) {
            $array = mysqli_fetch_assoc ($sql);
            if ($password == $array["password"]) {
                header("location: beranda.php?id=".$array['id']."");
                exit;
            }
        }
        $error = true;
    }
    if (isset($error)) {
        $validasi = "Username Atau Password Salah";
    }
    ?>
    <div class="container">
    <h4 class="text-center fst-bold">LOGIN</h4>
    <form action="" method="post">
        <div class="form-group">
            <div class="row">
                <label for="username" class="fst col-sm-2">Username</label>
                <div class="col">
                <input type="text" name="username" id="username" class="form-control">
                </div>
            </div>
        </div>
        <div class="form-group mt-2">
            <div class="row">
                <label for="password" class="fst col-sm-2">Password</label>
                <div class="col">
                <input type="password" name="password" id="password" class="form-control">
                </div>
            </div>
        </div>
        <small class="<?php echo($validasi !="" ? "is-invalid" : ""); ?> text-danger fst-italic"><?php echo $validasi; ?></small>
        <div class="form-group mt-3">
            <button type="submit" name="btn-login" class="btn btn-success">LOGIN</button>
            <a href="daftar.php" class="btn btn-info">DAFTAR</a>
        </div>
    </form>
    </div>
</body>
</html>