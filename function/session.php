<?php
    // index.php
    session_start();
    if (!isset($_SESSION['nama_pengguna'])) {
        header("Location: ../admin/login.php");
        exit(); 
    }

?>