<?php
include_once '../controllers/C_produk.php';
$produk = new C_produk();

    if ($_GET['aksi'] == 'tambah') {
        $ProdukID = $_POST['ProdukID'];
        $NamaProduk = $_POST['NamaProduk'];
        $Harga = $_POST['Harga'];
        $Stok = $_POST['Stok'];

        $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
        if (isset($_FILES['Gambar']['name'])) {
            $photo = $_FILES['Gambar']['name'];

            $x = explode('.', $photo);
            $ekstensi = strtolower(end($x));

            $ukuran = $_FILES['Gambar']['size'];
            $file_tmp = $_FILES['Gambar']['tmp_name'];

            if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
                if ($ukuran < 1044070) {
                    move_uploaded_file($file_tmp, '../assets/img/' . $photo);
                    $produk->tambah($ProdukID=0, $NamaProduk, $Harga, $Stok, $photo);
                } else {
                    echo "EKSTENSI GAMBAR TERLALU BESAR";
                }
            } else {
                $photo="unnamed.jpg";
                $produk->tambah($ProdukID=0, $NamaProduk, $Harga, $Stok, $photo);
            }
        } else {
            echo "Gambar tidak diupload.";
        }

    } if ($_GET['aksi'] == 'update') {
        $ProdukID = $_POST['ProdukID'];
        $NamaProduk = $_POST['NamaProduk'];
        $Harga = $_POST['Harga'];
        $Stok = $_POST['Stok'];

        $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
        if (isset($_FILES['Gambar']['name'])) {
            $photo = $_FILES['Gambar']['name'];

            $x = explode('.', $photo);
            $ekstensi = strtolower(end($x));

            $ukuran = $_FILES['Gambar']['size'];
            $file_tmp = $_FILES['Gambar']['tmp_name'];

            if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
                if ($ukuran < 1044070) {
                    move_uploaded_file($file_tmp, '../assets/img/' . $photo);
                    $produk->update($ProdukID, $NamaProduk, $Harga, $Stok, $photo);
                } else {
                    echo "EKSTENSI GAMBAR TERLALU BESAR";
                }
            } else {
                $photo = "unnamed.jpg";
                $produk->update($ProdukID, $NamaProduk, $Harga, $Stok, $photo);
            }
        } else {
            $photo = "unnamed.jpg";
            $produk->update($ProdukID, $NamaProduk, $Harga, $Stok, $photo);
        }

    } elseif ($_GET['aksi'] == 'hapus') {
        $ProdukID = $_GET['id'];

        $produk->delete($ProdukID);
    }

?>