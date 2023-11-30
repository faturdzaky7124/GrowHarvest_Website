<?php
// Koneksi ke database (ubah sesuai dengan detail database Anda)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Jika metode request adalah GET
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Query untuk mengambil data dari tabel tb_transaksi
    $sql = "SELECT * FROM tb_transaksi";

    // Eksekusi query
    $result = $conn->query($sql);

    // Cek apakah hasilnya tidak kosong
    if ($result->num_rows > 0) {
        // Mengambil hasil dan mengembalikannya sebagai JSON
        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        header('Content-Type: application/json');
        echo json_encode($rows);
    } else {
        echo "Tidak ada data transaksi";
    }
}

// Tutup koneksi database
$conn->close();
?>
