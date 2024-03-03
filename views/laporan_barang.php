<?php
include_once '../views/C_barang.php';

$barang = new C_barang();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=divice-width, initial-scale=1.0">
    <title>Laporan barang</title>
</head>
<body>
    <center><h2>DAFTAR BARANG</h2></center>

    <table border="1" style="width: 100%;">
    <thead>
        <tr>
            <td>No</td>
            <td>Nama</td>
            <td>Qty</td>
            <td>Harga</td>
            <td>Gambar</td>
        </tr>
    </thead>
<tbody>
<?php $no = 1; foreach($barang->tampil() as $b){ ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $b->nama_barang ?></td>
        <td><?= $b->qty ?></td>
        <td><?= $b->harga ?></td>
        <td>
            <div style="display: flex; justify-content:center; align-items:center;">
                <img src="<?="../assets/img/".$b->photo ?>" alt="<?= $b->nama_barang ?>" width="50" height="65">
            </div>
        </td>

    </tr>
<?php }?>
</tbody>
</table>

<script>
    window.print();
</script>
</body>
</html>
