<?php 
include_once 'C_koneksi.php';

class C_produk{

    public function tampil(){

        $conn = new C_koneksi();

        $sql = "SELECT * FROM produk ORDER BY ProdukID DESC";
//var_dump($query)
//exit;
        $query = mysqli_query($conn->conn(), $sql);

        while ($p = mysqli_fetch_object($query)) {
            $hasil[] = $p;
        }
        
        return $hasil;

    }
    
       
    public function tambah($ProdukID, $NamaProduk, $Harga, $Stok, $photo){

        $conn = new C_koneksi();

        $sql = "INSERT INTO produk VALUES ('$ProdukID', '$NamaProduk', '$Harga', '$Stok', '$photo')";  

        $query = mysqli_query($conn->conn(), $sql);
        if ($query){
            echo "<script>alert('Data Berhasil Ditambahkan');window.location='../views/V_barang.php'</script>";
        }else {
            echo "gagal ditambahkan";
        }
    }   

    public function edit($ProdukID){

        $conn = new C_koneksi();

        $sql = "SELECT * FROM produk WHERE ProdukID = '$ProdukID' ";

        $query = mysqli_query($conn->conn(), $sql);

        while ($q = mysqli_fetch_object($query)) {
            $hasil[] = $q;
        }
        return $hasil;
    }
       

    public function update($ProdukID, $NamaProduk, $Harga, $Stok, $Gambar){
        $conn = new C_koneksi();
        $sql = "UPDATE produk SET NamaProduk = '$NamaProduk' , Harga = '$Harga' , Stok = '$Stok', Gambar = '$Gambar' WHERE ProdukID = '$ProdukID'";
        $query = mysqli_query($conn->conn(), $sql);
        if ($query){
            echo "<script>alert('Data Berhasil Diubah');window.location='../views/V_barang.php'</script>";

        }else {
            echo "gagal ditambahkan";
        }
    }   

    public function delete($ProdukID){
        $conn = new C_koneksi();
        $sql = "DELETE FROM produk WHERE ProdukID = '$ProdukID'";
        $query = mysqli_query($conn->conn(), $sql);
        if ($query){
            header ("location: ../views/V_barang.php");
        }
    }

}

?>      