<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$db_host = "localhost";
$db_user = "growharv_db";
$db_password = "growrajawali";
$db_name = "growharv_db";

$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$data = json_decode(file_get_contents("php://input"));

if (isset($data->tanggal_transaksi) && isset($data->id_akun) && isset($data->detail_transaksi)) {
    $tanggal_transaksi = $conn->real_escape_string($data->tanggal_transaksi);
    $id_akun = $conn->real_escape_string($data->id_akun);
    $detail_transaksi = $data->detail_transaksi;

    // Mulai transaksi
    $conn->begin_transaction();

    // Tambahkan transaksi ke tb_transaksi
    $query_transaksi = "INSERT INTO tb_transaksi (tanggal_transaksi, id_akun) VALUES ('$tanggal_transaksi', '$id_akun')";

    if ($conn->query($query_transaksi) === TRUE) {
        $id_transaksi = $conn->insert_id;

        // Tambahkan detail transaksi ke tb_detail_transaksi
        foreach ($detail_transaksi as $detail) {
            $jumlah = $conn->real_escape_string($detail->jumlah);
            $total_harga = $conn->real_escape_string($detail->total_harga);
            $id_produk = $conn->real_escape_string($detail->id_produk);

            $query_detail_transaksi = "INSERT INTO tb_detail_transaksi (jumlah, total_harga, id_transaksi, id_produk) VALUES ('$jumlah', '$total_harga', '$id_transaksi', '$id_produk')";

            if (!$conn->query($query_detail_transaksi)) {
                $conn->rollback(); // Rollback transaksi jika terjadi kesalahan
                http_response_code(500);
                echo json_encode(array("message" => "Error: " . $conn->error));
                exit();
            }
        }

        // Commit transaksi
        $conn->commit();

        http_response_code(201);
        echo json_encode(array("id_transaksi" => $id_transaksi, "message" => "Transaksi berhasil ditambahkan."));
    } else {
        $conn->rollback(); // Rollback transaksi jika terjadi kesalahan
        http_response_code(500);
        echo json_encode(array("message" => "Error: " . $conn->error));
    }
} else {
    http_response_code(400);
    echo json_encode(array("message" => "Data yang diperlukan tidak lengkap."));
}

$conn->close();
?>
