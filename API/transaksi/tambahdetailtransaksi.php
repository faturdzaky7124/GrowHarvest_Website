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
    $id_detail_transaksi = $data['id_detail_transaksi'];
    $jumlah = $data['jumlah'];
    $total_harga = $data['total_harga'];
    $id_transaksi = $data['id_transaksi'];
    $id_produk = $data['id_produk'];

    // Query untuk menyimpan data ke dalam tabel tb_detail_transaksi
    $sql = "INSERT INTO tb_detail_transaksi (id_detail_transaksi, jumlah, total_harga, id_transaksi, id_produk) 
            VALUES ('$id_detail_transaksi', '$jumlah', '$total_harga', '$id_transaksi', '$id_produk')";

    if ($conn->query($sql) !== TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    } else {
        echo "Data detail transaksi berhasil ditambahkan";
    }
}

// Tutup koneksi database
$conn->close();
?>
