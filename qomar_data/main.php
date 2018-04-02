<h1>Aplikasi Data Mahasiswa</h1>
<hr>
<a href="tambah.php">Tambah Data</a>

<?php
	include "koneksi.php";
	$koneksiObj = new Koneksi();
	$koneksi = $koneksiObj->ambilKoneksi();

	if ($koneksi->connect_error){
		die("Koneksi gagal : ".$koneksi->connect_error);
	} else {
		//echo "Koneksi Sukses !";
	}
	$qry = "select * from qomar_data";
	$data = $koneksi->query($qry);
?>

<table border="1">
	<tr>
		<th>nim</th>
		<th>nama</th>
		<th>jurusan</th>
	</tr>
	
	<?php
		if ($data->num_rows <= 0){
			echo "<tr><td>";
			echo "NO DATA";
			echo "</td></tr>";
		} else {
			while ($row = $data->fetch_assoc()) {
				echo "<tr>";
				echo "<td>".$row["nim"]."</td>";
				echo "<td>".$row["nama"]."</td>";
				echo "<td>".$row["jurusan"]."</td>";
				echo '<td><a href="edit.php?nim='. $row["nim"] .'">Edit</a>';
				echo '<td><a href="hapus.php?nim='. $row["nim"] .'">Hapus</a>';
				echo "<tr>";
			}
		}
	?>
</table>