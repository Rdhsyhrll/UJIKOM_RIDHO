<?php
include_once 'template/header.php';
include_once 'template/sidebar.php';
include_once 'template/topbar.php';
include_once '../controllers/C_penjualan.php';

$penjualan = new C_penjualan();
?>
<div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Edit transaksi</h1>
                            </div>
                            <form action="../routers/r_transaksi.php?aksi=update" method="POST" data-parsley-validate class="user">
                                  <?php
                                        foreach ($penjualan->edit($_GET['id']) as $b) {
                                    ?>
                               <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="PenjualanID"
                                        placeholder="PenjualanID" name="PenjualanID" value="<?= $b->PenjualaID ?>" hidden>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="PelangganID"
                                        placeholder="PelangganID" name="PelangganID" value="<?= $b->PelangganID ?>" hidden>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="NamaPelanggan"
                                        placeholder="Nama Pelanggan" name="NamaPelanggan" value="<?= $b->NamaPelanggan ?>">
                                </div>

                                <div class="form-group">
                                    <textarea class="form-control form-control-user" id="Alamat"
                                        placeholder="Alamat" name="Alamat" value="<?= $b->Alamat ?>"></textarea>
                                </div>

                                <div class="form-group">
                                    <input type="number" class="form-control form-control-user" id="TanggalPenjualan"
                                        placeholder="Nomor Telepon" name="NomorTelepon"value="<?= $b->NomorTelepon ?>">
                                </div>
                                <div class="form-group">
                                    <input type="date" class="form-control form-control-user" id=""
                                        placeholder="Tanggal Penjualan" value="<?= date("Y-m-d") ?>" name="TanggalPenjualan" hidden>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="TotalHarga"
                                        placeholder="TotalHarga" name="TotalHarga"value="<?= $b->TotalHarga ?>" hidden>
                                </div>
                
                                <div class="input-field">
                                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Tambah" id="tambah" name="tambah">
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