<?php

// Fungsi untuk mendapatkan data produk berdasarkan ID
header ('Content-Type: application/json;charset=utf8');

function get_produk_by_id($id, $conn) {
    $query = "SELECT * FROM tb_produk WHERE id_produk = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

// Parameter koneksi ke database (ganti dengan kredensial database sesungguhnya)
require_once('koneksi.php');

// Mendapatkan parameter 'id_produk' dari permintaan GET
$id_produk = isset($_GET['id_produk']) ? $_GET['id_produk'] : null;

// Jika parameter 'id_produk' disediakan, kembalikan data produk berdasarkan ID
if ($id_produk !== null) {
    $produk = get_produk_by_id($id_produk, $conn);

    if ($produk !== null) {
        echo json_encode($produk);
    } else {
        echo json_encode(array('error' => 'Produk tidak ditemukan'));
    }
} else {
    // Jika tidak ada parameter 'id_produk', kembalikan semua data produk
    $query_all = "SELECT * FROM tb_produk";
    $result_all = $conn->query($query_all);
    $data_produk = $result_all->fetch_all(MYSQLI_ASSOC);
    echo json_encode($data_produk);
}

// Menutup koneksi ke database
$conn->close();

?>
