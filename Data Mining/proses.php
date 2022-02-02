 <?php
include("function.php");
 mysqli_query($kon,"UPDATE centroid set 
c1x='$_POST[nc1x]',	
c1y='$_POST[nc1y]',	
c2x='$_POST[nc2x]',	
c2y='$_POST[nc2y]' WHERE id='1' ");
 echo"<script>alert('Data Berhasil Di Proses');window.location.href='hasil.php'</script>";
?>