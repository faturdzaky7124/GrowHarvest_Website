<?php 
    ob_start();
    require "../function/session.php";
    require "../function/koneksi.php";

?>


                <div class="row">
                    <div class="col-md-4">
                    <div class="card mb-4">
                        <h5 class="card-header">Cari Barang</h5>
                        <div class="card-body">
                        <div>
                            <label for="defaultFormControlInput" class="form-label"></label>
                            <input
                            type="text"
                            class="form-control"
                            id="cari"
                            name="cari"
                            placeholder="cari"
                            aria-describedby="defaultFormControlHelp"
                            />
                            <div id="defaultFormControlHelp" class="form-text">
                            
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                  <div class="card mb-4">
                    <h5 class="card-header">hasil Pencarian</h5>
                    <div class="card-body">
                      <div class="form-floating table-responsive text-nowrap">
                      <table class="table">
                    <thead>
                      <tr>
                        <th>No Barang</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                      </div>
                    </div>
                  </div>
                </div>
                </div>

                <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center ">
                <h5 class="card-header">Kasir</h5>
                <a class="btn btn-danger" href="fungsi/hapus/hapus.php?penjualan=jual">
										<b>RESET KERANJANG</b></a>
                </div>
                <div class=" card-body table-responsive text-nowrap">
                    <table class="table ">
						<tr>
							<td><b>Tanggal</b></td>
						    <td><input type="text" readonly="readonly" class="form-control" value="<?php echo date("j F Y, G:i");?>" name="tgl"></td>
						</tr>
					</table>
                    <table class="table table-bordered" id="example1">
						<thead>
							<tr>
													<td> No</td>
													<td> Nama Barang</td>
													<td style="width:10%;"> Jumlah</td>
													<td style="width:20%;"> Total</td>
													<td> Kasir</td>
													<td> Aksi</td>
							</tr>
						</thead>
						<tbody>
                                            <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Angular Project</strong></td>
                        <td>Albert Cook</td>
                        <td>
                          <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                            <li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              class="avatar avatar-xs pull-up"
                              title="Lilian Fuller"
                            >
                              <img src="../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" />
                            </li>
                            <li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              class="avatar avatar-xs pull-up"
                              title="Sophia Wilkerson"
                            >
                              <img src="../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle" />
                            </li>
                            <li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              class="avatar avatar-xs pull-up"
                              title="Christina Parker"
                            >
                              <img src="../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle" />
                            </li>
                          </ul>
                        </td>
                        <td><span class="badge bg-label-primary me-1">Active</span></td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="javascript:void(0);"
                                ><i class="bx bx-edit-alt me-1"></i> Edit</a
                              >
                              <a class="dropdown-item" href="javascript:void(0);"
                                ><i class="bx bx-trash me-1"></i> Delete</a
                              >
                            </div>
                          </div>
                        </td>
                      </tr>
						</tbody>
					</table>
                    <table class="table table-stripped">
											
											<!-- aksi ke table nota -->
											<form method="POST" action="index.php?page=jual&nota=yes#kasirnya">
												<tr>
													<td>Total Semua  </td>
													<td><input type="text" class="form-control" name="total" value="<?php echo $total_bayar;?>"></td>
												
													<td>Bayar  </td>
													<td><input type="text" class="form-control" name="bayar" value="<?php echo $bayar;?>"></td>
													<td><button class="btn btn-success"><i class="fa fa-shopping-cart"></i> Bayar</button>
													 <!-- <a class="btn btn-danger" href="fungsi/hapus/hapus.php?penjualan=jual">
														<b>RESET</b>
                                                    </a> -->
                                                    </td>
                                                    </td>
												</tr>
											</form>
											<!-- aksi ke table nota -->
											<tr>
												<td>Kembali</td>
												<td><input type="text" class="form-control" value="<?php echo $hitung;?>"></td>
												<td></td>
												<td>
													<a href="print.php?nm_member=<?php echo $_SESSION['admin']['nm_member'];?>
													&bayar=<?php echo $bayar;?>&kembali=<?php echo $hitung;?>" target="_blank">
													<button class="btn btn-default">
														<i class="bx bxs-print"></i> Print Untuk Bukti Pembayaran
													</button></a>
												</td>

											</tr>
										</table>

                </div>
              </div>

<script>
// AJAX call for autocomplete 
$(document).ready(function(){
	$("#cari").change(function(){
		$.ajax({
		type: "POST",
		url: "caritransaksi.php?cari_barang=yes",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
            $("#hasil_cari").hide();
			$("#tunggu").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
		},
          success: function(html){
			$("#tunggu").html('');
            $("#hasil_cari").show();
            $("#hasil_cari").html(html);
		}
	});
	});
});

</script>


<?php 
    $content = ob_get_clean();
    include "../admin/body.php";
?>