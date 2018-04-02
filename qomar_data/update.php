<?php
include "koneksi.php";
$koneksiObj = new Koneksi();
$koneksi = $koneksiObj->ambilKoneksi();

if($koneksi->connect_error){
	die("Koneksinya gagal : ".$koneksi->connect_error);
}else{
	//echo "Koneksi Sukses !";
}

//echo "Kode : " . $_POST["kode"];
//echo "Nama Barang : " . $_POST["namaBarang"];
//echo "Harga : " . $_POST["harga"];

$query = "update qomar_data set nama = '" . $_POST["nama"] . "', jurusan = '" . $_POST["jurusan"] . "' " .
		"where nim = " . $_POST["nim"];
		
//echo "<br><br>" . $query;
if ($koneksi->query($query) == true){
	echo "<br><br>Data " . $_POST["nama"] . " Sudah Diubah. Data bisa dilihat ".
	'<a href="main.php">disini</a>';
}else{
	echo "error : " . $query . " -> " . $koneksi->error;
}
$koneksi->close();
?>