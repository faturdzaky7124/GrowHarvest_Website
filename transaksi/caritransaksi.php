<?php
require "../function/koneksi.php";
if(!empty($_GET['cari_barang'])){
    $cari = trim(strip_tags($_POST['keyword']));
    if($cari == '')
    {

    }else{
        $sql = "select tb_produk.*, tb_kategori.id_kategori, tb_kategori.nama_kategori
                from tb_produk inner join tb_kategori on tb_produk.id_kategori = tb_kategori.id_kategori
                where tb_produk.id_produk like '%$cari%' or tb_produk.nama_produk like '%$cari%'";
        $row = mysqli_query($con,$sql);
?>
    <table class="table table-stripped" width="100%" id="example2">
        <tr>
            <th>ID Barang</th>
            <th>Nama Barang</th>
            <th>Harga Jual</th>
            <th>Aksi</th>
        </tr>
    <?php foreach($hasil1 as $hasil){?>
        <tr>
            <td><?php echo $hasil['id_produk'];?></td>
            <td><?php echo $hasil['nama_produk'];?></td>
            <td><?php echo $hasil['harga_produk'];?></td>
            <!-- <td>
            <a href="fungsi/tambah/tambah.php?jual=jual&id=<?php echo $hasil['id_produk'];?>&id_kasir=<?php echo $_SESSION['admin']['id_akun'];?>" 
                class="btn btn-success">
                <i class="fa fa-shopping-cart"></i></a></td>
        </tr> -->
    <?php }?>
    </table>
<?php	
    }
}
?>