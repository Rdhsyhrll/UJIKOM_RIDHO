<?php
include_once 'template/header.php';
include_once 'template/sidebar.php';
include_once 'template/topbar.php';
include_once '../controllers/C_produk.php';

$produk = new C_produk();
?>
<div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Edit Produk</h1>
                            </div>
                            <form action="../routers/r_produk.php?aksi=update" method="POST" class="user" enctype = "multipart/form-data">
                                  <?php
                                        foreach ($produk->edit($_GET['id']) as $b) {
                                    ?>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="id_wisata"
                                     name="ProdukID" value="<?= $b->ProdukID?>" hidden>
                                </div>

                                <div class="form-group">           
                                    <input type="text" class="form-control form-control-user" id="lokasi"
                                         name="NamaProduk" value="<?= $b->NamaProduk?>">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="nama_wisata"
                                        placeholder="Nama_wisata" name="Harga" value="<?= $b->Harga?>">
                                </div>
                                
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="kategori_wisata"
                                        placeholder="Kategori_wisata" name="Stok" value="<?= $b->Stok?>">
                                </div>
                           
                            <div class="input-field">
                                <input type="file" value="Choose File" id="photo" name="Gambar">
                            </div>
                           

                                <div class="input-field">
                                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Update" name="update">
                                </div>
                                
                                            <?php } ?>
                                <hr>
                            </form>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 
<?php
include_once 'template/footer.php'; 
?>                          <?php

?>