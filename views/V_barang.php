<?php 
include_once 'template/header.php';
include_once 'template/sidebar.php';
include_once 'template/topbar.php';

include_once '../controllers/C_produk.php';

$produk = new C_produk();
?>
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<a href="tambah_barang.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus da-sm text-white-50"></i>Tambah Produk</a>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Produk</h6>
    </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ProdukID</th>
                                            <th>NamaProduk</th>
                                            <th>Harga</th>
                                            <th>Stok</th>
                                            <th>Gambar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $nomor = 1;
                            foreach ($produk->tampil() as $p) {
                                        ?>
                                        <tr>
                                            <td><?php echo $nomor++ ?></td>
                                            <td><?= $p->NamaProduk ?></td>
                                            <td><?= $p->Harga ?></td>
                                            <td><?= $p->Stok ?></td>
                                            <td> <img src="<?="../assets/img/" . $p->Gambar ?>" width="200"> </td>
                                            <td align = 'center'><a href="V_edit_barang.php?id=<?=$p->ProdukID ?>"class="btn btn-primary btn-icon-split">
                                        <span class="text">Edit</span>
                                    </a>
                                         <a onclick="return confirm('Apakah yakin data akan di hapus?')"
                                    href="..//routers/r_produk.php?id=<?= $p->ProdukID ?>&aksi=hapus"><button type="button" name="hapus"  class="btn btn-danger ">hapus</button></a>
                                        <span class="text"></span>
                                    </a>
                                </td>
                                    </tr>
                                    
                                <?php }?>
                                
                                    </tbody>
                                    <tfoot>                               
                                        <tr>
                                            <th>ProdukID</th>
                                            <th>NamaProduk</th>
                                            <th>Harga</th>
                                            <th>Stok</th>
                                            <th>Gambar</th>
                                            <th>Aksi</th>
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
