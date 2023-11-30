
<?php
  require_once('koneksi.php');
  header ('Content-Type: application/json;charset=utf8');
  if(empty($_GET)){
    $query = mysqli_query($conn, "SELECT * FROM tb_akun");
  
    $result = array();
    while($row = mysqli_fetch_assoc($query)){
      $result[] = array(
        'id_akun' => $row['id_akun'],
        'nama_pengguna'=> $row['nama_pengguna'],
        'nama_lengkap'=> $row['nama_lengkap'],
        'kata_sandi'=> $row['kata_sandi'],
        'no_hp'=> $row['no_hp'],
        'alamat'=> $row['alamat'],
        'gambar'=> $row['gambar'],
        'tingkat_akses'=> $row['tingkat_akses']
        
      );
    }
    echo json_encode($result);
  } else {

    $username = mysqli_real_escape_string($conn, $_GET['nama_pengguna']);
    $query = mysqli_query($conn, "SELECT * FROM tb_akun WHERE nama_pengguna='$username'");
    
    $result = array();
    while($row = mysqli_fetch_assoc($query)){
      $result[] = array(
        'id_akun' => $row['id_akun'],
        'nama_pengguna'=> $row['nama_pengguna'],
        'nama_lengkap'=> $row['nama_lengkap'],
        'kata_sandi'=> $row['kata_sandi'],
        'no_hp'=> $row['no_hp'],
        'alamat'=> $row['alamat'],
        'gambar'=> $row['gambar'],
        'tingkat_akses'=> $row['tingkat_akses']
      );
    }
    echo json_encode($result);
  }
  
  mysqli_close($conn);

  
?>