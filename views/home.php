<?php 
include_once 'template/header.php';
include_once 'template/sidebar.php';
include_once 'template/topbar.php';
?>
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"> Selamat datang <?= $_SESSION['data']['user'] ?>, sebagai role <?=
     $_SESSION['data']['role'] ?> 
     </h1>
     
     
</div>
<?php 
include_once 'template/footer.php';

?>