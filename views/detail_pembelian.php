<?php
include_once "../controllers/C_koneksi.php";
$conn = new C_koneksi();
$halaman="Penukaran Poin";
include_once 'template/header.php';
include_once 'template/sidebar.php';
include_once 'template/topbar.php';

?>
<div class="card mt-2">
	<div class="card-body">
		
		<?php 
		
		$PelangganID = $_GET['id'];
		$no = 1;
		$data = mysqli_query($conn->conn(),"SELECT * FROM pelanggan INNER JOIN penjualan ON pelanggan.PelangganID=penjualan.PelangganID");
		while($d = mysqli_fetch_array($data)){
			?>
			<?php if ($d['PelangganID'] == $PelangganID) { ?>
				<table>
					<tr>
						<td>ID Pelanggan</td>
						<td>: <?php echo $d['PelangganID']; ?></td>
					</tr>
					<tr>
						<td>Nama Pelanggan</td>
						<td>: <?php echo $d['NamaPelanggan']; ?></td>
					</tr>
					<tr>
						<td>No. Telepon</td>
						<td>: +62 <?php echo $d['NomorTelepon']; ?></td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>: <?php echo $d['Alamat']; ?></td>
					</tr>
					<tr>
						<td>Total Pembelian</td>
						<td>: Rp<?php echo number_format($d['TotalHarga']); ?></td>
					</tr>
				</table>
				<form method="post" action="../routers/R_penjualan.php?aksi=TambahBarang">
					<input type="text" name="PenjualanID" value="<?php echo $d['PenjualanID']; ?>" hidden>
					<input type="text" name="PelangganID" value="<?php echo $d['PelangganID']; ?>" hidden>
					<button type="submit" class="btn btn-primary btn-sm mt-2">
						Tambah Barang
					</button>
				</form>
		<div class="single-table datatable-primary">
            <div class="table-responsive">
                <table class="table table-hover progress-table text-center">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Produk</th>
							<th>Jumlah Beli</th>
							<th>Total Harga</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						
						$nos = 1;
						$detailpenjualan = mysqli_query($conn->conn(),"SELECT * FROM detailpenjualan");
						while($d_detailpenjualan = mysqli_fetch_array($detailpenjualan)){
							?>
							<?php 
							if ($d_detailpenjualan['PenjualanID'] == $d['PenjualanID']) { ?>
								<tr>
									<td><?php echo $nos++; ?></td>
									<td>
										<form action="../routers/R_penjualan.php?aksi=SimpanBarang" method="post">
											<div class="form-group">
												<input type="text" name="PelangganID" value="<?php echo $d['PelangganID']; ?>" hidden>
												<input type="text" name="DetailID" value="<?php echo $d_detailpenjualan['DetailID']; ?>" hidden>
												<select name="ProdukID" class="form-control" onchange="this.form.submit()">
													<option>Pilih Produk</option>
													<?php 
													
													$no = 1;
													$produk = mysqli_query($conn->conn(),"SELECT * FROM produk");
													while($d_produk = mysqli_fetch_array($produk)){
														?>
														<option value="<?php echo $d_produk['ProdukID']; ?>" <?php if ($d_produk['ProdukID']==$d_detailpenjualan['ProdukID']) { echo "selected"; } ?>><?php echo $d_produk['NamaProduk']; ?></option>
													<?php } ?>
												</select>
											</div>
										</form>
									</td>
									
										<form method="post" action="../routers/R_penjualan.php?aksi=Hitung">
											<?php 
											
											$produk = mysqli_query($conn->conn(),"SELECT * FROM produk");
											while($d_produk = mysqli_fetch_array($produk)){
												?>
												<?php 
												if ($d_produk['ProdukID']==$d_detailpenjualan['ProdukID']) { ?>
													<input type="text" name="Harga" value="<?php echo $d_produk['Harga']; ?>" hidden>
													<input type="text" name="ProdukID" value="<?php echo $d_produk['ProdukID']; ?>" hidden>
													<input type="text" name="Stok" value="<?php echo $d_produk['Stok']; ?>" hidden>
													<?php 
												}
											}
											?>

										<td>
											<div class="form-group">
												<input type="number" name="JumlahProduk" value="<?php echo $d_detailpenjualan['JumlahProduk']; ?>" class="form-control">
											</div>
										</td>
										
										<td>Rp<?php echo number_format($d_detailpenjualan['Subtotal']); ?></td>
										<td>
											<input type="text" name="DetailID" value="<?php echo $d_detailpenjualan['DetailID']; ?>" hidden>
											<input type="text" name="PelangganID" value="<?php echo $d['PelangganID']; ?>" hidden>
											<button type="submit" class="btn btn-outline-success btn-sm">Proses</button>
										</form>
										<form method="post" action="../routers/R_penjualan.php?aksi=HapusDetail">
											<input type="text" name="PelangganID" value="<?php echo $d['PelangganID']; ?>" hidden>
											<input type="text" name="DetailID" value="<?php echo $d_detailpenjualan['DetailID']; ?>" hidden>
											<button type="submit" class="btn btn-outline-danger btn-sm">Hapus</button>
										</form>
									</td>
								</tr>
							<?php } else {
								?>
								<?php 
							}
						} 
						?>
					</tbody>
				</table>
			</div>
		</div>

				<form method="post" action="../routers/R_penjualan.php?aksi=Harga">
					<?php 
					
					$detailpenjualan = mysqli_query($conn->conn(), "SELECT SUM(Subtotal) AS TotalHarga FROM detailpenjualan WHERE PenjualanID='$d[PenjualanID]'"); 
					$row = mysqli_fetch_assoc($detailpenjualan); 
					$sum = $row['TotalHarga'];
					
					?>
					<div class="row">
						<div class="col-sm-10">
							<div class="form-group">
								<input type="text" class="form-control" name="TotalHarga" id="totalHarga" value="<?php echo $sum; ?>">
								<input type="text" name="PelangganID" value="<?php echo $d['PelangganID']; ?>" hidden>
								<input type="text" name="PenjualanID" value="<?php echo $d['PenjualanID']; ?>" hidden>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<button class="btn btn-warning btn-sm form-control" type="submit">Simpan</button>
							</div>
							
							
						</div>
					</div>
				</form>
				<div class="row">
					<form action="struk.php?id=<?php echo $d['PenjualanID'];?>" method="POST">
				<table><tr><td>Bayar</td><td>:</td><td><input class="form-control" type="text" name="Bayar" id="bayar"></td><td>Kembalian</td><td>:</td><td><input class="form-control" type="text" id="kembalianDisplay" name='Kembalian'></td><td><p id="warningMessage"></p></td></tr></table>
							<div class="form-group">
								<button type="submit">Cetak</a></div>
							</div>
							</form>
			<?php } else { ?>
				<?php 
			} 
		} 
		?>		
	</div>
</div>

<?php
include "template/footer.php";
?>