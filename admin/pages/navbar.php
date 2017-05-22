<?php  
    if($_SESSION['role'] != 'admin'){
        header('Location: ../../index.php');
    }
?>

<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Admin TokoKeren</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <li><a href="#"><i class="fa fa-user fa-fw"></i></a></li>
        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
        </li>
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <li>
                    <a href="buatKategori.php"><i class="fa fa-list-ul fa-fw"></i> Buat Kategori</a>
                </li>
                <li>
                    <a href="jasakirim.php"><i class="fa fa-truck fa-fw"></i> Tambah Jasa Kirim</a>
                </li>
                <li>
                    <a href="promo.php"><i class="fa fa-tags fa-fw"></i> Buat Promo</a>
                </li>
                <li>
                    <a href="pulsa.php"><i class="fa fa-shopping-cart fa-fw"></i> Tambah Produk (Pulsa)</a>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
