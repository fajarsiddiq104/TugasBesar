<?php 
session_start();

if ( !isset($_SESSION['login'])) {
	header("Location: login.php");
	exit;
}

require_once 'function.php';
$tangkap = query("SELECT * FROM admin");
?>



<!DOCTYPE html>
<html>
<head>
	<title>Data Mining</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
<section>
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

	<?php  
	include 'home.php';
	?>

	<?php  
	include 'footer.php';
	?>
	
</div>
</section>
</body>
</html>
