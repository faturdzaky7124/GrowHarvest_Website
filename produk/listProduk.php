
<?php 
    ob_start();
    require "../function/session.php";
    require "../function/koneksi.php";

  

  $query= " SELECT * FROM tb_kategori ORDER BY id_kategori ASC ";
  $kate= mysqli_query($con,$query);
?>

<h5 class="pb-1 mb-4"></h5>

  <?php
      $items_per_page = 8; // Menampilkan 9 produk per halaman (3 kolom x 3 baris)

      // Tentukan halaman saat ini
      $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

      // Hitung offset
      $offset = ($current_page - 1) * $items_per_page;

      // Query untuk mendapatkan data produk dari database
      $query = "SELECT * FROM tb_produk LIMIT $offset, $items_per_page";
      $result = $con->query($query);

      // Tampilkan produk
      $counter = 0; // Initialize a counter

      foreach ($result as $dataproduk):
          if ($counter % 4 == 0) {
              // Start a new row for every three products
              echo '<div class="row mb-5">';
          }
  ?>

    <div class="col-md-3">
        <div class="card mb-3">
            <img class="card-img-top" height="200" width="200" src="<?php echo $dataproduk["gambar_produk"]?>" alt="Card image cap" />
            <div class="card-body">
                <h5 class="card-title"><?php echo $dataproduk["nama_produk"]?></h5>
                <p class="card-text">
                    <?php echo $dataproduk["deskripsi"]?>.
                </p>
                <h6>Rp <?php echo $dataproduk["harga_produk"]?></h6>
                <p class="card-text">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </p>
            </div>
        </div>
    </div>

  <?php
      $counter++;
      if ($counter % 4 == 0) {
          echo '</div>';
      }
  endforeach;


  // if ($counter % 3 != 0) {
  //     echo '</div>';
  // }
  $total_items_query = "SELECT COUNT(*) as total FROM tb_produk";
  $total_items_result = $con->query($total_items_query);
  $total_items = $total_items_result->fetch_assoc()['total'];

  // Hitung jumlah halaman
  $total_pages = ceil($total_items / $items_per_page);

  // Tampilkan pagination
  echo '<div class="row mt-3">
            <div class="col text-center">
              <div class="block-27" style="display: flex; justify-content: center; align-items: center;">
                <ul style="list-style-type: none; padding: 0; margin: 0; display: flex;">';


                if ($current_page > 1) {
                  echo '<li style="margin-right: 10px;"><a href="?page=1">&lt;&lt;</a></li>';
                }
  // Tautan untuk halaman sebelumnya
  if ($current_page > 1) {
      echo '<li style="margin-right: 10px;"><a href="?page=' . ($current_page - 1) . '">&lt;</a></li>';
  }

  $visible_links = 5;

  // Tentukan batas tautan pagination yang ingin ditampilkan
  $min_link = max(1, $current_page - floor($visible_links / 2));
  $max_link = min($total_pages, $min_link + $visible_links - 1);

  // Tautan untuk setiap halaman
  for ($i = $min_link; $i <= $max_link; $i++) {
      echo '<li';
      if ($i == $current_page) {
          echo ' class="active"';
      }
      echo ' style="margin-right: 10px;">';
      if ($i == $current_page) {
          echo '<span>' . $i . '</span>';
      } else {
          echo '<a href="?page=' . $i . '">' . $i . '</a>';
      }
      echo '</li>';
  }

  // Tautan untuk halaman berikutnya
  if ($current_page < $total_pages) {
      echo '<li style="margin-left: 10px;"><a href="?page=' . ($current_page + 1) . '">&gt;</a></li>';
  }

  if ($current_page < $total_pages) {
    echo '<li style="margin-right: 10px;"><a href="?page=' . $total_pages . '">&gt;&gt;</a></li>';
  }

  echo '</ul>
          </div>
        </div>
      </div>';
  ?>

<?php 
    $content = ob_get_clean();
    include "../admin/body.php";
?>

<style>
.block-27 ul {
  padding: 0;
  margin: 0; }
  .block-27 ul li {
    display: inline-block;
    margin-bottom: 4px;
    font-weight: 400; }
    .block-27 ul li a, .block-27 ul li span {
      color: #000000;
      text-align: center;
      display: inline-block;
      width: 40px;
      height: 40px;
      line-height: 40px;
      border-radius: 50%;
      border: 1px solid #e6e6e6;
      background: #fff; }
    .block-27 ul li.active a, .block-27 ul li.active span {
      background: #82ae46;
      color: #fff;
      border: 1px solid transparent; }
</style>