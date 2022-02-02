<?php 
require_once 'function.php';

if( isset($_POST["tambah"]) )
{
	//cek apakah data berhasil ditambahkan atau tidak 
	if( tambah($_POST) > 0)
	{
		//menampilkan berhasil dengan alert javascript
		echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'data.php';
			</script>";
	}
	else
	{
		echo "
			<script>
				alert('data gagal ditambahkan!');
				document.location.href = 'data.php';
			</script>";
	}
}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Tambah Data</title>
	<link rel="stylesheet" type="text/css" href="css/tambah.css">
</head>
<body>

<div class="container">
	<div class="tambah">
		<h3 align="center"><b>Tambah Data Barang</b></h3>
	</div>

	<div class="form">
		<form action="" method="POST" enctype="multipart/form-data">
			<input type="text" name="nm_br" placeholder="Nama Barang" required autocomplete="off">

			<label for="gambar">Pilih Gambar Barang</label>
			<input type="file" name="gmb" id="gambar" required>

			<input type="text" name="stok" placeholder="Stok Barang" required autocomplete="off">

			<input type="text" name="jml_terjual" placeholder="Jumlah Terjual" required autocomplete="off">

			<button type="submit" name="tambah">TAMBAH DATA</button>
		</form>
	</div>
</div>
</body>
</html>

