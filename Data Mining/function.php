<?php

// koneksi ke database
$host = "localhost";
$user = "root";
$pass = "";
$db   = "fajar_siddiq";

$kon = mysqli_connect($host,$user,$pass,$db);


// function untuk query
function query($simpan)
{
	global $kon;
	$result = mysqli_query($kon , $simpan);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result))
	{
		$rows[] = $row; 
	}
	return $rows;
}


// function untuk tambah data ========================
function tambah($data){
	global $kon;
	$nm_barang = htmlspecialchars($data['nm_br']);
	$gambar  = upload();
	if( !upload())
	{
		return false;
	}
	$stok = htmlspecialchars($data['stok']);
	$terjual = htmlspecialchars($data['jml_terjual']);
	//upload gambar 

	$query = "INSERT INTO barang VALUES
			('', '$nm_barang','$gambar','$stok','$terjual')";

	mysqli_query($kon, $query);
	
	return mysqli_affected_rows($kon);
}


function upload()
{
	$namaFile = $_FILES['gmb']['name'];
	$ukuranFile = $_FILES['gmb']['size'];
	$error = $_FILES['gmb']['error'];
	$tmpName = $_FILES['gmb']['tmp_name'];

	//cek apakah ada gambar diupload atau tidak
	if( $error === 4 )
	{
		echo "<script>
				alert('pilih gambar barang terlebih dahulu');
			  </script>";
		return false;
	}

	$ekstensiGambarValid = ['jpg','jpeg','png','jfif'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if(!in_array($ekstensiGambar, $ekstensiGambarValid) )
	{
		echo "<script>
				alert('yang anda upload bukan gambar!');
			  </script>";
		return false;
	}

	// MENGECEK UKURAN FILE 
	if( $ukuranFile > 1000000 )
	{
		echo "<script>
				alert('ukuran gambar terlalu besar!');
			  </script>";
		return false;
	}

	// MENCEGAH ADA DUA DATA GAMBAR DG NAMA SAMA. gambar boleh sama tapi untuk nama harus beda karena akan membingungkan databasenya 
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;


	// LOLOS PENGECEKAN, GAMBAR SIAP DIUPLOAD
	// move_uploaded_file(filename, destination)
	// filename = $tmpName dan destination = 'img/' . $namaFile
	move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
	return $namaFileBaru;	
}


// function ubah
function ubah($data)
{
	global $kon;
	$id = $data["id"];
	$nm_barang = htmlspecialchars($data["nm_brg"]);
	$gambarLama = htmlspecialchars($data["gambarLama"]);
	$stok_barang = htmlspecialchars($data["stok"]);
	$jml_terjual = htmlspecialchars($data["jml_trj"]);


	//cek apakah user pilih gambar baru atau tidak
	if ($_FILES['gmb'] ['error'] === 4 )
	{
		$gambar = $gambarLama;
	}
	else
	{
		$gambar = upload();
	}

	$query = "UPDATE barang SET
				nm_br = '$nm_barang',
				gmb_br = '$gambar',
				stok = '$stok_barang',
				jml_trj = '$jml_terjual'
			  WHERE id = $id	
			"; 

	mysqli_query($kon, $query);
	
	return mysqli_affected_rows($kon);
}



// function hapus =========================
function hapus($id)
{
	global $kon;
	mysqli_query($kon, "DELETE FROM barang WHERE id = $id");
	return mysqli_affected_rows($kon); 
}


?>