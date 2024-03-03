<?php
include_once '../controllers/C_penjualan.php';
$penjualan = new C_penjualan();


if ($_GET['aksi'] == 'tambah') {
    $PelangganID = $_POST['PelangganID'];
    $NamaPelanggan = $_POST['NamaPelanggan'];
    $Alamat = $_POST['Alamat'];
    $NomorTelepon = $_POST['NomorTelepon'];
    $penjualan->tambah_pelanggan($PelangganID, $NamaPelanggan, $Alamat, $NomorTelepon) ;

    $PenjualanID = $_POST['PenjualanID'];
    $TanggalPenjualan = $_POST['TanggalPenjualan'];
    $TotalHarga = $_POST['TotalHarga'];
    // $query = $barang->tambah($id=0, $nama, $qty, $harga, $nama_photo);
    $penjualan->tambah($PenjualanID=0, $TanggalPenjualan, $TotalHarga, $PelangganID) ;
    

} elseif ($_GET['aksi'] == 'update') {
    $PelangganID = $_POST['PelangganID'];
    $NamaPelanggan = $_POST['NamaPelanggan'];
    $Alamat = $_POST['Alamat'];
    $NomorTelepon = $_POST['NomorTelepon'];
    $penjualan->update_pelanggan($PelangganID, $NamaPelanggan, $Alamat, $NomorTelepon) ;

    $PenjualanID = $_POST['PenjualanID'];
    $TanggalPenjualan = $_POST['TanggalPenjualan'];
    $TotalHarga = $_POST['TotalHarga'];
    // $query = $barang->tambah($id=0, $nama, $qty, $harga, $nama_photo);
    $penjualan->update($PenjualanID=0, $TanggalPenjualan, $TotalHarga, $PelangganID) ;
    

}elseif ($_GET['aksi'] == 'hapus') {
    $PenjualanID = $_GET['id'];

    $penjualan->delete($PenjualanID);
}

?>