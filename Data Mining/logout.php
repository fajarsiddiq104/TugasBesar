<?php 

session_start();

// tambahkan arry session kosong supaya ditimpa dn yakin array session benar benar kosong 
$_SESSION = [];

//tambahkan lagi unset karena kadang masih ad session yg belum terhapus
session_unset();


// kita arahkan lagi user k login
header("Location: login.php");
exit;

 ?>