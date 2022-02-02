<?php

require_once 'function.php'; 
$sbr = query('SELECT *FROM barang');
$tangkap = query("SELECT * FROM admin");
if (isset($_POST['tambah']))
{
	header("Location: tambah_br.php");
	exit;
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Halaman Data</title>
	<link rel="stylesheet" href="css/data.css">
</head>
<body>

<div class="container">

	<div class="utama1">
		<marquee scrolldelay="50"><b><font color="#F39422">Hello <?= $tangkap[0]["nm_lengkap"]; ?>, Selamat Datang Di Data Mining Clustering Algoritma K-Means</font></b> &nbsp;&nbsp;|&nbsp;&nbsp;<b><?php date_default_timezone_set('Asia/Jakarta'); echo date(" h:i:s a , d-M-Y"); ?>
				&nbsp;&nbsp;|&nbsp;&nbsp;</b></marquee>
	</div>

	<div class="utama2">
		<a href="index.php">Home</a>
		<a href="data.php">Data</a>
		<a href="proses_data.php">Proses Clustering</a>
		<a href="hasil.php">Hasil Clustering</a>
		<a href="laporan.php">Laporan</a>
		<a href="logout.php">Logout</a>	
	</div>
			



	<div class="data1">
		<p>Data Mahasiswa</p>
	</div>

	<div class="data2">
		<form action="" method="POST">
			<button type="submit" name="tambah">Tambah Data</button>
		</form>
	</div>

	<div class="table">
		<table border="1px" cellpadding="10px" cellspacing="0px" width="1000px">
			<tr>
				<th>NO.</th>
				<th>NAMA BARANG</th>
				<th>FOTO BARANG</th>
				<th>STOK (X)</th>
				<th>JUMLAH TERJUAL (Y)</th>
				<th>AKSI</th>
			</tr>
			
			<?php $no=1; ?>
			<?php foreach($sbr as $br) : ?>
			<tr>
				<td><?= $no; ?></td>
				<td><?= $br['nm_br']; ?></td>
				<td><img src="img/<?= $br['gmb_br']; ?>" width="100"></td>
				<td><?= $br['stok']; ?></td>
				<td><?= $br['jml_trj']; ?></td>
				<td class="aksi">
					<div class="aksi1">
						<a href="ubah.php?id=<?= $br["id"]; ?>">Ubah</a>
					</div> 
					<div class="aksi2">
						<a href="hapus.php?id=<?= $br["id"]; ?>" onclick="return confirm('yakin?');">Hapus</a>
					</div>
				</td>
			</tr>
			<?php $no++; ?>
			<?php endforeach; ?>
		</table>
	</div>
</div>

</body>
</html>

			