<?php

include("koneksip.php");
if (isset($_POST["btn-daftar"])) {
    $jenis_pendaftaran  = $_POST["jenis_pendaftaran"];
    $skhun  = $_POST ["skhun"];
    $ijazah = $_POST ["ijazah"];
    $nama   = $_POST["nama"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $nisn   = $_POST ["nisn"];
    $alamat = $_POST ["alamat"];
    $email  = $_POST ["email"];

	$sql=mysqli_query ($koneksi, "INSERT INTO daftarbaru (id, jenis_pendaftaran,skhun,ijazah, nama, jenis_kelamin, nisn,alamat, email)
												VALUES ('', '$jenis_pendaftaran', '$skhun', '$ijazah', '$nama', '$jenis_kelamin', '$nisn',  '$alamat','$email')");
    if ($sql) {
        header("location: index.php");
    }
    
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Siswa Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>
<body>

<?php
// Deklarasi Variabel
$error_jenis_pendaftaran="";
$error_skhun="";
$error_ijazah="";
$error_nama="";
$error_jenis_kelamin="";
$error_nisn="";
$error_alamat="";
$error_email="";

$jenis_pendaftaran="";
$skhun="";
$ijazah="";
$nama="";
$jenis_kelamin="";
$nisn="";
$alamat="";
$email="";

$pesan_sukses="";

// Jika method POST dijalankan
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	//Jenis Pendaftaran
	if(empty($_POST["jenis_pendaftaran"])){
		$error_jenis_pendaftaran="Jenis Pendaftaran tidak boleh kosong";
	}
	else{
		$error_jenis_pendaftaran=cek_input($_POST["jenis_pendaftaran"]);
		}
	
	// SKHUN
	if(empty($_POST["skhun"])){
		$error_skhun="Nomor Seri SKHUN tidak boleh kosong";
	}
	else{
		$skhun=cek_input($_POST["skhun"]);
		if(!is_numeric($skhun)){
			$error_skhun="Nomor Seri SKHUN hanya boleh berisi angka";
		}

	}

	// Ijazah
	if(empty($_POST["ijazah"])){
		$error_ijazah="Nomor Seri Ijazah tidak boleh kosong";
	}
	else{
		$ijazah=cek_input($_POST["ijazah"]);
		if(!is_numeric($ijazah)){
			$error_ijazah="Nomor Seri Ijazah hanya boleh berisi angka";
		}
	}

	// Nama Lengkap
	if(empty($_POST["nama"])){
		$error_nama="Nama tidak boleh kosong";
	}
	else{
		$nama=cek_input($_POST["nama"]);
		if(!preg_match("/^[a-zA-z ]*$/", $nama)){
			$error_nama="Inputan Hanya Boleh Huruf dan Spasi";
		}
	}

	// Jenis Kelamin
	if(empty($_POST["jenis_kelamin"])){
		$error_jenis_kelamin="Pilihan tidak boleh kosong";
	}
	else{
		$jenis_kelamin=cek_input($_POST["jenis_kelamin"]);
	}

	// NISN
	if(empty($_POST["nisn"])){
		$error_nisn="NISN tidak boleh kosong";
	}
	else{
		$nisn=cek_input($_POST["nisn"]);
		if(!is_numeric($nisn)){
			$error_nisn="NISN hanya boleh berisi angka";
		}
	}

	// Alamat Jalan
	if(empty($_POST["alamat"])){
		$error_alamat="Alamat Jalan tidak boleh kosong";
	}
	else{
		$alamat=cek_input($_POST["alamat"]);
	}

	// Email
	if(empty($_POST["email"])){
		$error_email="Email tidak boleh kosong";
	}
	else{
		$email=cek_input($_POST["email"]);
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$error_email="Format Email Invalid";
		}
	}


	// Jika tidak ada error maka data akan disimpan
	if ($error_jenis_pendaftaran ==""   && $error_skhun=="" && $error_ijazah=="" && $error_nama=="" && $error_jenis_kelamin=="" && $error_nisn=="" && $error_alamat==""   && $error_email=="" ) {
	
		include 'koneksip.php';

		// Memasukkan data ke tabel daftar
		$sql=mysqli_query ($koneksi, "INSERT INTO daftarbaru (id,jenis_pendaftaran,skhun,ijazah, nama, jenis_kelamin, nisn,alamat, email)VALUES ('', '$jenis_pendaftaran',   '$skhun', '$ijazah', '$nama', '$jenis_kelamin', '$nisn',  '$alamat','$email')");

		$pesan_sukses="Berhasil simpan data";
	}
	else{
		$pesan_sukses="Gagal simpan data";
	}

}
function cek_input($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}


?>
<div class="container">
<div class="row">
	<div class="col-md-9">
		<div class="card">
		<h4 class="alert alert-primary fst text-center mt-5" role="alert">PENDAFTARAN SISWA BARU</h4>
			</div>
			
			<div class="card-body">
				<!-- Mengarahkan action ke halaman itu sendiri -->
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<div class="form-group row">
						<label for="jenis_pendaftaran" class="col-sm-3 col-form-label">Jenis Pendaftaran</label>
						<div class="col-sm-9">
						    <input type="radio" name="jenis_pendaftaran" value="Baru">Baru
							<input type="radio" name="jenis_pendaftaran" value="Pindahan">Pindahan
							<span class="warning"><?php echo $error_jenis_pendaftaran; ?></span>
						</div>
					</div>
				

					<div class="form-group row">
						<label for="skhun" class="col-sm-3 col-form-label">No. Seri SKHUN Sebelumnya</label>
						<div class="col-sm-9">
							<input type="text" name="skhun" class="form-control <?php echo ($skhun !="" ? "is_invalid" : ""); ?>" id="skhun" placeholder="No. Seri SKHUN Sebelumnya" value="<?php echo $skhun; ?>"><span class="warning"><?php echo $error_skhun; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="ijazah" class="col-sm-3 col-form-label">No. Seri Ijazah Sebelumnya</label>
						<div class="col-sm-9">
							<input type="text" name="ijazah" class="form-control <?php echo ($ijazah !="" ? "is_invalid" : ""); ?>" id="ijazah" placeholder="No. Seri Ijazah Sebelumnya" value="<?php echo $ijazah; ?>"><span class="warning"><?php echo $error_ijazah; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
						<div class="col-sm-9">
							<input type="text" name="nama" class="form-control <?php echo ($error_nama !="" ? "is_invalid" : ""); ?>" id="nama" placeholder="Nama" value="<?php echo $nama; ?>"><span class="warning"><?php echo $error_nama; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
						<div class="col-sm-9">
							<input type="radio" name="jenis_kelamin" value="Laki-laki">Laki-laki
							<input type="radio" name="jenis_kelamin" value="Perempuan">Perempuan
							<span class="warning"><?php echo $error_jenis_kelamin; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="nisn" class="col-sm-3 col-form-label">NISN</label>
						<div class="col-sm-9">
							<input type="text" name="nisn" class="form-control <?php echo ($error_nisn !="" ? "is_invalid" : ""); ?>" id="nisn" placeholder="NISN" value="<?php echo $nisn; ?>"><span class="warning"><?php echo $error_nisn; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="alamat" class="col-sm-3 col-form-label">Alamat Jalan</label>
						<div class="col-sm-9">
							<input type="text" name="alamat" class="form-control <?php echo ($error_alamat !="" ? "is_invalid" : ""); ?>" id="alamat" placeholder="Alamat Jalan" value="<?php echo $alamat; ?>"><span class="warning"><?php echo $error_alamat; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="email" class="col-sm-3 col-form-label">E-mail Pribadi</label>
						<div class="col-sm-9">
							<input type="text" name="email" class="form-control <?php echo ($error_email !="" ? "is_invalid" : ""); ?>" id="email" placeholder="Email" value="<?php echo $email; ?>"><span class="warning"><?php echo $error_email; ?></span>
						</div>
					</div>

						<div class="form-group mt-3 gap-2 d-md-flex justify-content-md-end">
							<button type="submit" name="btn-daftar" class="btn btn-success fst" >DAFTAR</button>
                            <button type="reset" class="btn btn-danger fst" >RESET</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

</body>
</html>