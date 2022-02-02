<?php  
require_once 'function.php';

// ambil data dari database admin
$tangkap = query("SELECT * FROM admin");

// ambil data dari database barang
$sbr = query("SELECT * FROM barang ORDER BY id ASC");

?>


<!DOCTYPE html>
<html>
<head>
	<title>Laporan</title>
	<link rel="stylesheet" type="text/css" href="css/laporan.css">
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


	
	<h3>Laporan Hasil Clustering</h3>

	<div class="cetak">
		<a href="cetak.php" class="btn btn-more" target="_blank">Cetak</a>
	</div>

	<?php
	$centroid = mysqli_query($kon, "SELECT * FROM centroid WHERE id_centroid='1' ");
	$row = mysqli_fetch_array($centroid); 
	$c1x = $row['c1x'];
	$c1y = $row['c1y'];
	$c2x = $row['c2x'];
	$c2y = $row['c2y'];
	$ac1=0;
	$ac2=0;
	$iterasi=1;
	$no=1;
	foreach( $sbr as $br ) {
		$min=0;
		$m1=sqrt((pow(($br['stok']-$c1x),2))+(pow(($br['jml_trj']-$c1y),2)));
		$m2=sqrt((pow(($br['stok']-$c2x),2))+(pow(($br['jml_trj']-$c2y),2)));
		$min=min($m1,$m2);
		
		$semua_anggota_m1x = [];
		$semua_anggota_m1y = [];
		$semua_anggota_m2x = [];
		$semua_anggota_m2y = [];
		if($m1==$min)
		{
			$ketmin="C1";
			$ac1++;
			$semua_anggota_m1x[]=$br['stok'];
			$semua_anggota_m1y[]=$br['jml_trj'];
		}
		elseif($m2==$min)
		{
			$ketmin="C2";
			$ac2++;
			$semua_anggota_m2x[]=$br['stok'];
			$semua_anggota_m2y[]=$br['jml_trj'];
		}
		$no++;
	}

	$total_mx1 = 0;
 	$total_my1 = 0;
 	$total_mx2 = 0;
 	$total_my2 = 0;
    foreach($semua_anggota_m1x as $anggota_key)
    {
	    $total_mx1=$total_mx1+$anggota_key;
    }
    foreach($semua_anggota_m1y as $anggota_key)
    {
	    $total_my1=$total_my1+$anggota_key;
    }
    foreach($semua_anggota_m2x as $anggota_key)
    {
	    $total_mx2=$total_mx2+$anggota_key;
    }
    foreach($semua_anggota_m2y as $anggota_key)
    {
	    $total_my2=$total_my2+$anggota_key;
    }
	$c1x_2= 38.4545;
	$c1y_2= 31.7272;
	$c2x_2= 26;
	$c2y_2= 14.3333;
	$ac1=0;
	$ac2=0;
	$iterasi++;
	?>

	<table border="1px" cellpadding="10px" cellspacing="0px" width="1000px">
 		<tr>
 			<td>NO</td>
 			<td>NAMA BARANG</td>
 			<td>FOTO BARANG</td>
 			<td>STOK BARANG</td>
 			<td>JUMLAH TERJUAL</td>
 			<td>C1</td>
 			<td>C2</td>
 			<td>HASIL</td>
 		</tr>
 		<?php $no = 1; ?>
 		<?php foreach( $sbr as $br ) : ?>
 		<tr>
 			<td><?= $no; ?></td>
 			<td><?= $br['nm_br']; ?></td>
 			<td><img src="img/<?= $br['gmb_br'];?>" width="100"></td>
 			<td><?= $br['stok']; ?></td>
 			<td><?= $br['jml_trj']; ?></td>
 			<?php  
	 			$m1_2=sqrt((pow(($br['stok']-$c1x_2),2))+(pow(($br['jml_trj']-$c1y_2),2)));
				$m2_2=sqrt((pow(($br['stok']-$c2x_2),2))+(pow(($br['jml_trj']-$c2y_2),2)));
				$min_2=min($m1_2,$m2_2);
				
				$semua_anggota_m1x_2 = [];
				$semua_anggota_m1y_2 = [];
				$semua_anggota_m2x_2 = [];
				$semua_anggota_m2y_2 = [];
				if($m1_2==$min_2)
				{
					$ketmin="Laris";
				}
				else
				{
					$ketmin="Tidak Laris";	
				}

				echo"<td>".number_format($m1_2,2)."</td>
					<td>".number_format($m2_2,2)."</td>
					<td>$ketmin</td>
		</tr>";
 			?>
 		<?php $no++; ?>
 		<?php endforeach; ?>
 	</table>
</div>
</body>
</html>