<?php
    require "../function/koneksi.php";

    if( isset($_POST["btnsave"]) ) {

		if (tambahakun ($_POST) > 0 ) {
			echo "<script>window.location='../akun/indexAkun.php';</script>";
		}else {
			echo "<script>window.location='../akun/indexAkun.php';</script>";
		}		
	}
?>
