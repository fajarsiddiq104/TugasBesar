<?php

require_once 'function.php'; 
// ambil data dari database barang
$sbr = query('SELECT * FROM barang');

// ambil data dari database admin
$tangkap = query("SELECT * FROM admin");

if ( isset($_POST['proses'])) {
	header("Location: hasil.php");
	exit;
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Halaman Data</title>
	<link rel="stylesheet" href="css/proses_data.css">
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
		<p>Data Barang</p>
	</div>

	<form method="POST" action="proses.php" target="_blank">
		<ul>
			<div class="li1">
				<li>
					<label for="c1x">C1x</label>
					<input type="text" name="nc1x" id="c1x" value="45" style="background-color: rgba(0, 0, 0, .05)">
				</li>
			</div>

			<div class="li2">
				<li>
					<label for="c1y">C1y</label>
					<input type="text" name="nc1y" id="c1y" value="25" style="background-color: rgba(0, 0, 0, .05)">
				</li>
			</div>
		</ul>

		<ul>
			<div class="li3">
				<li>
					<label for="c2x">C2x</label>
					<input type="text" name="nc2x" id="c2x" value="80" style="background-color: rgba(0, 0, 0, .05)">
				</li>
			</div>

			<div class="li4">
				<li>
					<label for="c2y">C2y</label>
					<input type="text" name="nc2y" id="c2y" value="30" style="background-color: rgba(0, 0, 0, .05)">
				</li>
			</div>
		</ul>

		<ul>
			<div class="button">
				<button type="submit" name="proses">Proses</button>
			</div>
		</ul>
	</form>

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

			