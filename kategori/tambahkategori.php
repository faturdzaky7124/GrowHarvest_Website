<?php 
	require "../function/session.php";
	require "../function/koneksi.php";

	if( isset($_POST["tombolsimpankategori"]) ) {

		if (tambahkategori ($_POST) > 0 ) {
			echo "
			<script>
					window.location='../kategori/indexKategori.php';
			</script>
			";
		}else {
			echo "
				<script>
					alert('data gagal ditambahkan');
					window.location='../kategori/indexKategori.php';
				</script>
			";
		}		
	}
	?>