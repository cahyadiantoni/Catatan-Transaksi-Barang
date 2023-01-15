<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Komala | Admin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?= view('layout/script_atas'); ?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>KA</b>LP</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Komala</b>Apps</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?= base_url('adminlte/dist/img/admin.png') ?>" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?= $_SESSION['sesnama']; ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?= base_url('adminlte/dist/img/admin.png') ?>" class="img-circle" alt="User Image">

                                    <p>
                                        <?= $_SESSION['sesnama']; ?> - <?= $_SESSION['sesusername']; ?>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-right">
                                        <a href="<?= base_url('Login/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->

                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?= base_url('adminlte/dist/img/admin.png') ?>" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?= $_SESSION['sesnama']; ?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li><a href="<?= base_url('/') ?>"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
                    <li class="header">Master Data</li>
                    <li><a href="<?= base_url('/Perusahaan') ?>"><i class="fa fa-handshake-o"></i> <span>Data Perusahaan</span></a></li>
                    <li><a href="<?= base_url('/Barang') ?>"><i class="fa fa-archive"></i> <span>Data Barang</span></a></li>
                    <li><a href="<?= base_url('/Qty') ?>"><i class="fa fa-book"></i> <span>Data Satuan</span></a></li>
                    <li><a href="<?= base_url('/Supir') ?>"><i class="fa fa-car"></i> <span>Data Supir</span></a></li>
                    <li><a href="<?= base_url('/Pengurus') ?>"><i class="fa fa-user"></i> <span>Data Pengurus</span></a></li>
                    <li class="header">Transaksi</li>
                    <li><a href="<?= base_url('/Transaksi') ?>"><i class="fa fa-exchange"></i> <span>Data Transaksi</span></a></li>
                    <li><a href="<?= base_url('/Laporan') ?>"><i class="fa fa-print"></i> <span>Laporan Transaksi</span></a></li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>