<?php 
include_once 'C_koneksi.php';

class C_penjualan{

    public function tampil(){

        $conn = new C_koneksi();

        $sql = "SELECT * FROM penjualan JOIN pelanggan ON penjualan.PelangganID=pelanggan.PelangganID";

        $query = mysqli_query($conn->conn(), $sql);

        while ($p = mysqli_fetch_object($query)) {
            
            $hasil[] = $p;
        }
        
        return $hasil;
    }
    public function tampil_struk($PenjualanID){

        $conn = new C_koneksi();

        $sql = "SELECT * FROM penjualan JOIN pelanggan ON penjualan.PelangganID=pelanggan.PelangganID WHERE PenjualanID=$PenjualanID";

        $query = mysqli_query($conn->conn(), $sql);

        while ($p = mysqli_fetch_object($query)) {
            
            $hasil[] = $p;
        }
        
        return $hasil;
    }
    
    public function tambah_pelanggan($PelangganID, $NamaPelanggan, $Alamat, $NomorTelepon){

        $conn = new C_koneksi();

        $sql = "INSERT INTO pelanggan VALUES ('$PelangganID', '$NamaPelanggan', '$Alamat', '$NomorTelepon')";  
        
        $query = mysqli_query($conn->conn(), $sql);
        if ($query){
            echo "<script>alert('Data Berhasil Ditambahkan');window.location='../views/V_transaksi.php'</script>";
        }else {
            echo "gagal ditambahkan";
        }
    }
       
    public function tambah($PenjualanID, $TanggalPenjualan, $TotalHarga, $PelangganID){

        $conn = new C_koneksi();

        $sql = "INSERT INTO penjualan VALUES ('$PenjualanID', '$TanggalPenjualan', '$TotalHarga', '$PelangganID')";  
        
        $query = mysqli_query($conn->conn(), $sql);
        if ($query){
            echo "";
        }else {
            echo "" . "";
        }
    }   

    public function edit($PenjualanID){

        $conn = new C_koneksi();

        $sql = "SELECT * FROM `penjualan` JOIN pelanggan ON penjualan.PelangganID=pelanggan.PelangganID WHERE PenjualanID=$PenjualanID";

        $query = mysqli_query($conn->conn(), $sql);

        while ($p = mysqli_fetch_object($query)) {
            $hasil[] = $p;
        }
        return $hasil;
    }
    
    
    public function update_pelanggan($PelangganID, $NamaPelanggan, $Alamat, $NomorTelepon){
        $conn = new C_koneksi();
        $sql = "UPDATE pelanggan SET NamaPelanggan = '$NamaPelanggan' , Alamat = '$Alamat' , NomorTelepon = '$NomorTelepon' WHERE PelangganID = '$PelangganID'";
        $query = mysqli_query($conn->conn(), $sql);
        if ($query){
            echo "<script>alert('Data Berhasil Diubah');window.location='../views/V_transaksi.php'</script>";
        }else {
            echo "gagal ditambahkan";
        }
    } 

    public function update($PenjualanID, $TanggalPenjualan, $TotalHarga, $PelangganID){
        $conn = new C_koneksi();
        $sql = "UPDATE penjualan SET TanggalPenjualan = '$TanggalPenjualan' , TotalHarga = '$TotalHarga' , PelangganID = '$PelangganID' WHERE PenjualanID = '$PenjualanID'";
        $query = mysqli_query($conn->conn(), $sql);
        if ($query){
            echo "<script>alert('Data Berhasil Diubah');window.location='../views/V_transaksi.php'</script>";
        }else {
            echo "gagal ditambahkan";
        }
    }   

    public function delete($PenjualanID){
        $conn = new C_koneksi();
        $sql = "DELETE FROM pelanggan WHERE PelangganID = '$PenjualanID'";
        $query = mysqli_query($conn->conn(), $sql);
        if ($query){
            header ("location: ../views/V_transaksi.php");
        }
    }

}

?>






