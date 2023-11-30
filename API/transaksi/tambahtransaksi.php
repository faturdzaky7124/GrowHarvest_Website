<?php
// Ambil data yang diterima dalam format JSON
$data = json_decode(file_get_contents("php://input"), true);

// Koneksi ke database (sesuaikan dengan detail database Anda)
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

// Jika ada data yang diterima
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari request JSON
    $id_transaksi = $data['id_transaksi'];
    $tanggal_transaksi = $data['tanggal_transaksi'];
    $id_akun = $data['id_akun'];

    // Query untuk menyimpan data ke dalam tabel tb_transaksi
    $sql = "INSERT INTO tb_transaksi (id_transaksi, tanggal_transaksi, id_akun) VALUES ('$id_transaksi', '$tanggal_transaksi', '$id_akun')";

    if ($conn->query($sql) === TRUE) {
        echo "Data transaksi berhasil ditambahkan";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Tutup koneksi database
$conn->close();
?>
