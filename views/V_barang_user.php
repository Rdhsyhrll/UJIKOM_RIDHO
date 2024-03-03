<?php 
$halaman = "barang";
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
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">wisara di bandung barat</h6>
    </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Lokasi</th>
                                            <th>Nama Wisata</th>
                                            <th>Kategori Wisata</th>
                                            <th>Harga Wisata</th>
                                            <th>Photo</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $nomor = 1;
                                    foreach ($wisata->tampil() as $w){
                                    
                                    ?>
                                
                                        <tr>
                                            <td><?php echo $nomor++ ?></td>
                                            <td><?= $w->lokasi ?></td>
                                            <td><?= $w->nama_wisata ?></td>
                                            <td><?= $w->kategori_wisata ?></td>
                                            <td><?= $w->harga_wisata ?></td>     
                                            <td> 

                                            <div style="display: flex; justify-content: center; align-items: center;">
                                            <img src="<?= "../assets/img/" . $w->photo; ?>" alt="<?= $w->nama_wisata ?>" width="65" height="65">
                                    </div>
                                   
                                        </tr>
                                    
                                    <?php }?>
                                
                                    </tbody>
                                    <tfoot>                               
                                        <tr>
                                            <th>No</th>
                                            <th>Lokasi</th>
                                            <th>Nama Wisata</th>
                                            <th>Kategori Wisata</th>
                                            <th>Harga Wisata</th>
                                            <th>Photo</th>
                                     
                                           
                                        
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
