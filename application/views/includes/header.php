<!DOCTYPE html>
<html class="loading" data-textdirection="ltr">

<head>
    <!-- Required meta tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Sigap - Aplikasi mulit layanan ojek online">
    <meta name="keywords" content="Gojek clone, grab clone">
    <meta name="author" content="Sigap">
    <title>BUMDesKU Admin</title>
    <!-- plugins:css -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url(); ?>asset/app-assets/images/ico/logoweb.png">
    <link href="<?= base_url(); ?>asset/app-assets/css/ourdevelops/font.css" rel="stylesheet">
    <!-- endinject -->

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>asset/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>asset/app-assets/vendors/css/charts/apexcharts.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>asset/app-assets/vendors/css/extensions/toastr.css">


    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>asset/app-assets/vendors/css/tables/datatable/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>asset/app-assets/vendors/css/tables/datatable/extensions/dataTables.checkboxes.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>asset/app-assets/vendors/css/extensions/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>asset/app-assets/vendors/css/file-uploaders/dropzone.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>asset/app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>asset/node_modules/summernote/dist/summernote-bs4.css">
    <link rel="stylesheet" href="<?= base_url(); ?>asset/node_modules/dropify/dist/css/dropify.min.css">

    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>asset/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>asset/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>asset/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>asset/app-assets/css/components.css">

    <!-- BEGIN: Page CSS-->
    
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>asset/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>asset/app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>asset/app-assets/css/ourdevelops/chart-dashboard.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>asset/app-assets/css/plugins/extensions/swiper.css">

    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>asset/app-assets/css/plugins/file-uploaders/dropzone.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>asset/app-assets/css/pages/data-list-view.css">

    <link rel="stylesheet" href="<?= base_url(); ?>asset/app-assets/css/ourdevelops/intlTelInput.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>asset/app-assets/css/pages/invoice.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>asset/app-assets/css/plugins/extensions/toastr.css">
    <link href="<?= base_url(); ?>asset/app-assets/css/ourdevelops/mapbox-gl.css" rel="stylesheet" />
    <!-- END: Page CSS-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/css/intlTelInput.css" />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?= base_url(); ?>asset/assets/css/style.css">

    <!-- endinject -->
    <link rel="shortcut icon" href="<?= base_url(); ?>asset/images/logo.png" />

</head>

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

<input type="hidden" id="base" value="<?php echo base_url(); ?>"></input>
    <input type="hidden" id="tokenode" value="<?= mapboxToken ?>"></input>
    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
                        </ul>
                    </div>
                    <ul class="nav navbar-nav float-right">
                        <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon feather icon-maximize"></i></a></li>
                        <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600"><?= $this->session->userdata('user_name') ?></span><span class="user-status">Online</span></div><span><img class="round" src="<?= base_url(); ?>/images/admin/<?= $this->session->userdata('image') ?>" alt="avatar" height="40" width="40"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="<?= base_url(); ?>profile"><i class="feather icon-user"></i> Ubah Profil</a>
                                <div class="dropdown-divider"></div><a class="dropdown-item" href="<?= base_url(); ?>login/logout"><i class="feather icon-power"></i> Keluar</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- END: Header-->

    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="<?= base_url(); ?>">
                        <span><img class="round" src="<?= base_url(); ?>asset/app-assets/images/logo/logoweb.png" alt="avatar" height="40" width="40"></span>
                        <h2 class="brand-text mb-0">BUMDesKU</h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item"><a href="<?= base_url(); ?>"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a></li>
                
                <li class=" nav-item"><a href="<?= base_url(); ?>transaction"><i class="feather icon-list"></i><span class="menu-title" data-i18n="Dashboard">Riwayat Transaksi</span></a></li>
                <?php if($this->session->userdata('role') == 1) { ?>
                <li class=" nav-item"><a href="#"><i class="feather icon-map"></i><span class="menu-title" data-i18n="Dashboard">Tracking Maps</span></a>
                    <ul class="menu-content">
                        <li><a href="<?= base_url(); ?>driver/tracking_driver"><i class="feather icon-circle text-success"></i><span class="menu-item" data-i18n="Basic">Driver</span></a></li>
                        <li><a href="<?= base_url(); ?>driver/tracking_customer"><i class="feather icon-circle text-success"></i><span class="menu-item" data-i18n="Basic">Customer</span></a></li>
                    </ul>
                </li>
                <?php } ?>
                <?php if($this->session->userdata('role') == 1) { ?>
                <li class=" nav-item"><a href="#"><i class="feather icon-plus-circle"></i><span class="menu-title" data-i18n="Dashboard">Pendaftaran</span></a>
                    <ul class="menu-content">
                        <li><a href="<?= base_url(); ?>newregistration"><i class="feather icon-circle text-success"></i><span class="menu-item" data-i18n="Basic">Driver</span></a></li>
                        <li><a href="<?= base_url(); ?>mitra/newregmitra"><i class="feather icon-circle text-success"></i><span class="menu-item" data-i18n="Basic">Merchant</span></a></li>
                    </ul>
                </li>
                <?php } ?>
                
                <?php if($this->session->userdata('role') == 1) { ?>
                <li class=" nav-item"><a href="#"><i class="feather icon-user"></i><span class="menu-title" data-i18n="Dashboard">Users</span></a>
                    <ul class="menu-content">
                        <li><a href="<?= base_url(); ?>users"><i class="feather icon-circle text-success"></i><span class="menu-item" data-i18n="Basic">Customer</span></a></li>
                        <li><a href="<?= base_url(); ?>driver"><i class="feather icon-circle text-success"></i><span class="menu-item" data-i18n="Basic">Driver</span></a></li>
                        <li><a href="<?= base_url(); ?>mitra"><i class="feather icon-circle text-success"></i><span class="menu-item" data-i18n="Basic">Merchant</span></a></li>
                    </ul>
                </li>
                
                <?php } ?>
                
                <?php if($this->session->userdata('role') == 1) { ?>
                
                <li class="nav-item">
                    <a class="#">
                        <i class="feather icon-shopping-cart"></i>
                        <span class="menu-title">Merchant</span>
                    </a>
                    <ul class="menu-content">
                        <li> <a href="<?= base_url(); ?>mitra"><i class="feather icon-circle text-success"></i><span class="menu-item" data-i18n="Basic">Semua Merchant</a></span></li>
                    </ul>
                </li>
                
                <?php } ?>
                
                <?php if($this->session->userdata('role') == 1) { ?>

                <li class=" nav-item"><a href="#"><i class="feather icon-layers"></i><span class="menu-title" data-i18n="Dashboard">Layanan</span></a>
                    <ul class="menu-content">
                        <li><a href="<?= base_url(); ?>services"><i class="feather icon-circle text-success"></i><span class="menu-item" data-i18n="Basic">Layanan</span></a></li>
                        <li><a href="<?= base_url(); ?>Cabang"><i class="feather icon-circle text-success"></i><span class="menu-item" data-i18n="Basic">Cabang</span></a></li>
                        <li><a href="<?= base_url(); ?>partnerjob"><i class="feather icon-circle text-success"></i><span class="menu-item" data-i18n="Basic">Tipe Kendaraan</span></a></li>
                        <li> <a href="<?= base_url(); ?>categorymerchant"><i class="feather icon-circle text-success"></i><span class="menu-item" data-i18n="Basic">Kategori Merchant</span></a></li>
                    </ul>
                </li>
                
                <?php  }?>
                
                <?php if($this->session->userdata('role') == 1) { ?>

                <li class=" nav-item"><a href="#"><i class="feather icon-percent"></i><span class="menu-title" data-i18n="Dashboard">Promosi</span></a>
                    <ul class="menu-content">
                        <li><a href="<?= base_url(); ?>promoslider"><i class="feather icon-circle text-success"></i><span class="menu-item" data-i18n="Basic">Slider</span></a></li>
                        <li><a href="<?= base_url(); ?>promocode"><i class="feather icon-circle text-success"></i><span class="menu-item" data-i18n="Basic">Kode Promo</span></a></li>
                        <li><a href="<?= base_url(); ?>promocode/customer_promo_index"><i class="feather icon-circle text-success"></i><span class="menu-item" data-i18n="Basic">Free Topup </span></a></li>
                        
                        <li><a href="<?= base_url(); ?>promocode/topup_referal_index"><i class="feather icon-circle text-success"></i><span class="menu-item" data-i18n="Basic">Topup Referal </span></a></li>
                        
                        <li><a href="<?= base_url(); ?>promocode/jumat_index"><i class="feather icon-circle text-success"></i><span class="menu-item" data-i18n="Basic">Promo Jum'at </span></a></li>
                        
                        <li><a href="<?= base_url(); ?>promocode/reguler_index"><i class="feather icon-circle text-success"></i><span class="menu-item" data-i18n="Basic">Promo Reguler </span></a></li>
                        <li><a href="<?= base_url(); ?>promocode/customer"><i class="feather icon-circle text-success"></i><span class="menu-item" data-i18n="Basic">Promo Customer </span></a></li>
                        
                        
                    </ul>
                </li>
                
                <?php } ?>
                
                <?php if($this->session->userdata('role') == 1) { ?>

                <li class=" nav-item"><a href="#"><i class="feather icon-dollar-sign"></i><span class="menu-title" data-i18n="Dashboard">Keuangan</span></a>
                    <ul class="menu-content">
                        <li><a href="<?= base_url(); ?>wallet"><i class="feather icon-circle text-success"></i><span class="menu-item" data-i18n="Basic">Saldo</span></a></li>
                        <li><a href="<?= base_url(); ?>wallet/tambahtopup"><i class="feather icon-circle text-success"></i><span class="menu-item" data-i18n="Basic">TopUp Manual</span></a></li>
                        <li><a href="<?= base_url(); ?>wallet/tambahwithdraw"><i class="feather icon-circle text-success"></i><span class="menu-item" data-i18n="Basic">Withdraw Manual</span></a></li>
                    </ul>
                </li>
                
                <?php } ?>
                
                <?php if($this->session->userdata('role') == 1) { ?>
                <li class=" nav-item"><a href="#"><i class="feather icon-settings"></i><span class="menu-title" data-i18n="Dashboard">Pengaturan</span></a>
                    <ul class="menu-content">
                        <li><a href="<?= base_url(); ?>appsettings"><i class="feather icon-circle text-success"></i><span class="menu-item" data-i18n="Basic">Aplikasi</span></a></li>
                        <li><a href="<?= base_url(); ?>appsettings/emailsetting"><i class="feather icon-circle text-success"></i><span class="menu-item" data-i18n="Basic">Email</span></a></li>
                        <li><a href="<?= base_url(); ?>appsettings/smtpsetting"><i class="feather icon-circle text-success"></i><span class="menu-item" data-i18n="Basic">SMTP</span></a></li>
                        <li><a href="<?= base_url(); ?>appsettings/mobilepulsasetting"><i class="feather icon-circle text-success"></i><span class="menu-item" data-i18n="Basic">Ayo Pulsa</span></a></li>
                        <li><a href="<?= base_url(); ?>appsettings/banktransfersetting"><i class="feather icon-circle text-success"></i><span class="menu-item" data-i18n="Basic">Bank Transfer</span></a></li>
                    </ul>
                </li>

                <li class=" nav-item"><a href="#"><i class="feather icon-bell"></i><span class="menu-title" data-i18n="Dashboard">Pemberitahuan</span></a>
                    <ul class="menu-content">
                        <li><a href="<?= base_url(); ?>sendemail"><i class="feather icon-circle text-success"></i><span class="menu-item" data-i18n="Basic">Kirim Email</span></a></li>
                        <li><a href="<?= base_url(); ?>appnotification"><i class="feather icon-circle text-success"></i><span class="menu-item" data-i18n="Basic">Pemberitahuan Aplikasi</span></a></li>
                    </ul>
                </li>

                <li class=" nav-item"><a href="#"><i class="feather icon-book-open"></i><span class="menu-title" data-i18n="Dashboard">Berita</span></a>
                    <ul class="menu-content">
                        <li><a href="<?= base_url(); ?>news"><i class="feather icon-circle text-success"></i><span class="menu-item" data-i18n="Basic">Semua Berita</span></a></li>
                        
                    </ul>
                </li>
                
                <li class="nav-item">
                    <a href="<?= base_url(); ?>AdminMenu">
                        <i class="feather icon-user-plus"></i>
                        <span class="menu-title">Menu Admin</span>
                    </a>
                </li>
                
                <?php } ?>
           
           </ul>
        </div>
    </div>
    <!-- END: Main Menu-->