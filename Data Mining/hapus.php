<?php  
require_once('function.php');

$simpanid = $_GET["id"];

if (hapus($simpanid) > 0) {
	echo "
			<script>
				alert('data berhasil dihapus!');
				document.location.href = 'data.php';
			</script>
		";
}else
{
	echo "
			<script>
				alert('data gagal dihapus!');
				document.location.href = 'data.php';
			</script>
		";
}

?>