<?php
include "koneksi.php";
$koneksiObj = new Koneksi();
$koneksi = $koneksiObj->ambilKoneksi();

if($koneksi->connect_error){
	die("Koneksinya gagal : ".$koneksi->connect_error);
}else{
	//echo "Koneksi Sukses !";
}

$query = "insert into qomar_data values (
		".$_POST["nim"].",
		'".$_POST["nama"]."',
		'".$_POST["jurusan"]."')";
		


 if($koneksi->query($query) == true){
		echo "<br><br>" . $_POST["nama"] . " Sudah Tersimpan. Data bisa dilihat ".
		'<a href="main.php">disini</a>';
	} else {
		echo "error : " . $query . " -> " . $koneksi->error;
	}

//if ($koneksi->query($query) == true){
	//echo "<br><br>" . $_POST["namaBarang"] . " Sudah Tersimpan. Data bisa dilihat ".
	//'<a href="main.php">disini</a>';
//}else{
	//echo "error : " . $query . " -> " . $koneksi->error;
//}
$koneksi->close();
?>

<form action="tambah.php" method="">
	<input type="submit" value="Kembali">
</form>