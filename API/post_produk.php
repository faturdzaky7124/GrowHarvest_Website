<?php

// Fungsi untuk mendapatkan data produk berdasarkan ID
header ('Content-Type: application/json;charset=utf8');

// Parameter koneksi ke database (ganti dengan kredensial database sesungguhnya)
require_once('koneksi.php');

// Handle POST requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mendapatkan data JSON dari body permintaan
    $json_data = file_get_contents('php://input');
    $new_produk = json_decode($json_data, true);

    // Menambahkan produk baru ke database
    $query_insert = "INSERT INTO tb_produk (id_produk, nama_produk, gambar_produk, harga_produk, stok_produk, deskripsi, id_kategori) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt_insert = $conn->prepare($query_insert);
    $stmt_insert->bind_param("sssdiss", $new_produk['id_produk'], $new_produk['nama_produk'], $new_produk['gambar_produk'], $new_produk['harga_produk'], $new_produk['stok_produk'], $new_produk['deskripsi'], $new_produk['id_kategori']);
    $stmt_insert->execute();

    // Mengembalikan ID produk baru
    $new_produk_id = $stmt_insert->insert_id;
    echo json_encode(array('id_produk' => $new_produk_id));
} else {
    // Metode HTTP tidak didukung
    http_response_code(405);
    echo json_encode(array('error' => 'Metode HTTP tidak didukung'));
}

// Menutup koneksi ke database
$conn->close();

?>

