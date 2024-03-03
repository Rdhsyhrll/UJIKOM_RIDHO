<?php 
$halaman = "transaksi";
include_once 'template/header.php';
include_once 'template/sidebar.php';
include_once 'template/topbar.php';

include_once '../controllers/C_penjualan.php';

$penjualan = new C_penjualan();
?>
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<?php
 if ($_SESSION['data']['role'] == 'admin'){?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<a href="tambah_transaksi.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus da-sm text-white-50"></i>Tambah Pelanggan</a>
</div>
<?php } ?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Pelanggan</h6>
    </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nomor</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Alamat</th>
                                            <th>Nomor Telepon</th>
                                            <th>Total Harga</th>
                                               <th>Action</th>
                                                                                       
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $nomor = 1;
                                    foreach ($penjualan->tampil() as $p) {
                                    ?>
                                        <tr>
                                            <td><?php echo $nomor++ ?></td>
                                            <td><?= $p->NamaPelanggan ?></td>
                                            <td><?= $p->Alamat ?></td>
                                            <td><?= $p->NomorTelepon ?></td> 
                                            <td><?= $p->TotalHarga ?></td>  
                                            
                                            <?php
                                                if ($_SESSION['data']['role'] == 'admin'){?>

                                            
                                            <td align = 'center'><a href="V_edit_transaksi.php?id=<?= $p->PenjualanID ?>"class="btn btn-primary btn-icon-split">
                                        <span class="text">Edit</span>
                                    </a>
                                         <a onclick="return confirm('Apakah yakin data akan di hapus?')"
                                    href="../routers/r_transaksi.php?id=<?= $p->PelangganID?>&aksi=hapus"><button type="button" name="hapus"  class="btn btn-danger ">hapus</button></a>
                                        <span class="text"></span>
                                    </a>
                                </td>
                                <?php }elseif ($_SESSION['data']['role'] == 'petugas') {
                                    ?><td><a href="detail_pembelian.php?id=<?= $p->PelangganID  ?>"class="btn btn-warning btn-icon-split">
                                    <span class="text">Beli</span>
                                </a></td><?php
                                } ?>
                    
                                    </tr>
                                    
                                <?php }?>
                                
                                    </tbody>
                                    <tfoot>                               
                                        <tr>
                                        <th>Nomor</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Alamat</th>
                                            <th>Nomor Telepon</th>
                                            <th>Total Harga</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
<?php
include_once 'template/footer.php';
?>
