<?php  
require_once("koneksi.php");

// ambil data id dari url
$simpanid = $_GET["id"];

// query data mahasiswa berdasarkan id
//dikasih index nol karena didalam index nol baru ada data data
$br = query("SELECT * FROM barang WHERE id = $simpanid")[0];


// cek apakah data berhasil disimpan atau belum
if( isset($_POST["ub"]) )
{
	//cek apakah data berhasil diubah atau tidak 
	if( ubah($_POST) > 0)
	{
		//menampilkan berhasil dengan alert javascript
		echo "
			<script>
				alert('data berhasil diubah!');
				// saat mucul tombol ok pada alert kita mau saat dipencet langsung pindah kehalaman data.php
				document.location.href = 'data.php';
			</script>
		";
	}
	else
	{
		echo "
			<script>
				alert('data gagal diubah!');
				// saat mucul tombol ok pada alert kita mau saat dipencet langsung pindah kehalaman data.php
				document.location.href = 'data.php';
			</script>
		";
	}
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ubah Data Barang</title>
</head>
<body>

	<h1>Ubah Data Barang</h1>

	<form action="" method="POST" enctype="multipart/form-data">
		<!-- kita tambahkan satu <li> lagi buat id supaya tidak tampil di web browser kita kasih tipe hidden. ini gunanya buat where di query, kalau tidak dibikin id maka query tidak tau primery key nya yg mana --> 
		<input type="hidden" name="id" value="<?= $br['id']; ?>">
		<!-- kita tambahkan gambar lama supaya jika nati user tidak jadi mengubah gambar maka gambar lama tetap terpakai -->
		<input type="hidden" name="gambarLama" value="<?= $br['gmb_br']; ?>">
		
		<ul>
			<li>
				<label for="nm_brg">NAMA BARANG :</label>
				<input type="text" name="nm_brg" id="nm_brg" value="<?= $br['nm_br']; ?>">
			</li>
			<li>
				<label for="gambar">GAMBAR BARANG :</label><br>
				<img src="img/<?= $br['gmb_br']; ?>" width='80'><br>
				<input type="file" name="gmb" id="gambar">
			</li>
			<li>
				<label for="stok">STOK :</label>
				<input type="text" name="stok" id="stok" value="<?= $br['stok']; ?>">
			</li>
			<li>
				<label for="jml_terjual">JUMLAH TERJUAL :</label>
				<input type="text" name="jml_trj" id="jml_terjual" value="<?= $br['jml_trj']; ?>">
			</li>
			<li>
				<button type="submit" name="ub">UPDATE DATA</button>
			</li>
		</ul>
	</form>

</body>
</html>