<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3"><?= $_SESSION['data']['user'] ?> <sup><?= $_SESSION['data']['role'] ?></sup></div>
            </a>

            
            

        

            <?php if($_SESSION['data']['role'] == 'admin'){

            ?> 

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="home_user.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard untuk admin</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item active">
                <a class="nav-link" href="V_barang.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Produk</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="V_transaksi.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Penjualan</span></a>
            </li>

            

            <!-- Divider -->
            <hr class="sidebar-divider">

            <?php }elseif($_SESSION['data']['role'] == 'petugas'){
                
            ?>

            

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
               
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="utilities-color.html">Colors</a>
                        <a class="collapse-item" href="utilities-border.html">Borders</a>
                        <a class="collapse-item" href="utilities-animation.html">Animations</a>
                        <a class="collapse-item" href="utilities-other.html">Other</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                
            </li>

            

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="home_user.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard untuk user</span></a>
            </li>
            
            <li class="nav-item active">
                <a class="nav-link" href="V_barang.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Produk</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="V_transaksi.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Penjualan</span></a>
            </li>

            <?php } ?>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

         