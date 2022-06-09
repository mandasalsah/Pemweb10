<?php
include("koneksi.php");
$user = $_GET["user"];
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    //query hapus
    $sql = "DELETE FROM pesanalumni WHERE id = $id";
    $query = mysqli_query($conn,$sql);

    //cek query
    if( $query ){
        header("Location: cetakalumni.php?id=".$user."");
    } else {
        die("gagal menghapus...");
    }
}

?>