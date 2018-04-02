<?php
include "koneksi.php";
$koneksiObj = new Koneksi();
$koneksi = $koneksiObj->ambilKoneksi();

if($koneksi->connect_error){
	die("Koneksinya gagal : ".$koneksi->connect_error);
}else{
	//echo "Koneksi Sukses !";
}

$query = "delete from qomar_data where nim = ".$_GET["nim"];
//echo "<br><br>" . $query;

if ($koneksi->query($query) == true){
	echo "<br><br>Data dengan nim '" . $_GET["nim"] . "' Sudah Dihapus. Data bisa dilihat ".
	'<a href="main.php">disini</a>';
}else{
	echo "error : " . $query . " -> " . $koneksi->error;
}
$koneksi->close();
?>