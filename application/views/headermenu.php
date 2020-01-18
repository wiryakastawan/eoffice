<!--
    HEADER MENU 
    BASED ADMIN BSB
    SYSTEM ANALYST,PROGRAMMING AND MODIFIED BY WIRYA KASTAWAN
    WWW.PUTUWIRYA.COM
    codename : Ms smile
-->
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Dashboard eoffice - by Wirya</title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url('assets/images/favicon.ico')?>" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url('assets/css/bootstrap.css')?>" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url('assets/css/waves.css')?>" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url('assets/css/animate.css')?>" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="<?php echo base_url('assets/css/dataTables.bootstrap.css')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/datatables.css')?>" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.uikit.min.css" rel="stylesheet" type="text/css">
    
     <!-- Sweetalert Css -->
     <link href="<?php echo base_url('assets/css/sweetalert.css')?>" rel="stylesheet" />
     <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css" rel="stylesheet" type="text/css" />

     <!-- Bootstrap DatePicker Css -->
     <link href="<?php echo base_url('assets/css/bootstrap-datepicker.css')?>" rel="stylesheet" />
     <link href="<?php echo base_url('assets/css/bootstrap-select.css')?>" rel="stylesheet" />
     
     <!-- Wait Me Css -->
     <link href="<?php echo base_url('assets/css/waitMe.css')?>" rel="stylesheet" />


    <!-- Light Gallery Plugin Css -->
    <link href="<?php echo base_url('assets/css/lightgallery.min.css')?>" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.0/css/lightgallery.min.css" rel="stylesheet" type="text/css">

    <!-- Custom Css -->
    <link href="<?php echo base_url('assets/css/dashstyle.css')?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url('assets/css/all-themes.css')?>" rel="stylesheet" />

     <!-- Jquery Core Js -->
    <script src="<?php echo base_url('assets/js/jquery.min.js')?>"></script>



</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Mohon Tunggu...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="Mulai Mengetik...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="">eOFFICE - Surat Menyurat Elektronik - Bali Era Baru</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                    <!-- #END# Call Search -->
                    <!-- Notifications -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                            <span class="label-count">2</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">NOTIFIKASI</li>
                            <li class="body">
                                <ul class="menu">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>12 surat masuk</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 14 menit lalu
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    
                                    
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-purple">
                                                <i class="material-icons">settings</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>5 Surat Keluar</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 3 Jam lalu
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                           
                        </ul>
                    </li>
                    <!-- #END# Notifications -->
                    <!-- Tasks
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">flag</i>
                            <span class="label-count">9</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">TUGAS</li>
                            <li class="body">
                                <ul class="menu tasks">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Footer display issue
                                                <small>32%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-pink" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 32%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Make new buttons
                                                <small>45%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-cyan" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Create new dashboard
                                                <small>54%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-teal" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 54%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Solve transition issue
                                                <small>65%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 65%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Answer GitHub questions
                                                <small>92%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 92%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">View All Tasks</a>
                            </li>
                        </ul>
                    </li> -->
                    <!-- #END# Tasks -->
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <?php
                    $foto=$this->session->userdata("foto");
                    ?>
                    <img src="<?=base_url()?>/assets/images/<?php echo $foto ?>" width="60" height="60" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $this->session->userdata("username") ?></div>
                    <div class="email"><?php echo $this->session->userdata("email") ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo base_url() ?>index.php/dashboard/logout"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MENU UTAMA</li>
                    <li>
                        <a href="<?php echo base_url('index.php/dashboard/')?>">
                            <i class="material-icons">home</i>
                            <span>HOME</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">assignment</i>
                            <span>SURAT MASUK</span>
                        </a>
                        <ul class="ml-menu">
                            <?php
                            if($this->session->userdata("role")==1 || $this->session->userdata("role")==2 || $this->session->userdata("role")==5)
                            {
                                ?>
                             <li>
                                <a href="<?php echo base_url('index.php/suratmasuk/')?>">Daftar Surat Masuk</a>
                            </li>
                            <?php
                             }
                             ?>
                              <?php
                            if($this->session->userdata("role")==1 || $this->session->userdata("role")==2 || $this->session->userdata("role")==3 || $this->session->userdata("role")==4)
                            {
                                ?>
                            <li>
                                <a href="<?=base_url()?>index.php/disposisi/">Disposisi</a>
                            </li>
                             <?php
                             }
                             ?>
                    </ul>
                    </li>
                     <li>
                        <a href="">
                            <i class="material-icons">assignment_turned_in</i>
                            <span>SURAT KELUAR</span>
                        </a>
                    </li>
                     <li>
                        <a href="<?=base_url()?>index.php/kodesurat/">
                            <i class="material-icons">receipt</i> 
                            <span>DAFTAR KODE SURAT</span>
                        </a>
                    </li>
                    <?php
                if($this->session->userdata("role")==1){
                    ?>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">settings</i>
                            <span>PENGATURAN</span>
                        </a>
                    
                    <ul class="ml-menu">
                            <li>
                                <a href="<?=base_url()?>index.php/profile/">Profile Pengguna</a>
                            </li>
                            <li>
                                <a href="<?=base_url()?>index.php/perangkat/">Perangkat Daerah</a>
                            </li>
                              <li>
                                <a href="<?=base_url()?>index.php/bidang/">Daftar Jabatan Eselon III</a>
                            </li>
                            <li>
                                <a href="<?=base_url()?>index.php/kasi/">Daftar Jabatan Eselon IV</a>
                            </li>
                            
                    </ul>
                        </li>
                    <?php
                }
                ?>
                 <script>
    function showConfirmlogout() {
    swal({
        title: "Anda Yakin Keluar Dari Aplikasi?",
        text: "Untuk keamanan pastikan Simpan Password dengan Benar!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Ya, Keluar!",
        closeOnConfirm: false
    }, function(isConfirm){
  if (isConfirm) {
      window.location.href="<?=base_url()?>index.php/dashboard/logout";
    swal("Sistem Logout!", "Anda telah keluar dari Aplikasi.", "success");   

  } else {
    swal("Batal", "Tidak Jadi Keluar", "error");
  }

        
    });
}
 </script>
                <li>
                        <a onclick="showConfirmlogout()">
                            <i class="material-icons">exit_to_app</i> 
                            <span>LOG OUT</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2019 <a href="javascript:void(0);">eOFFICE by Wirya</a>.
                </div>
                <div class="version">
                    <b>Versi: </b> 0.1
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#skins" data-toggle="tab">TEMA</a></li>
               <!-- <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>-->
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                    <ul class="demo-choose-skin">
                        <li data-theme="red" class="active">
                            <div class="red"></div>
                            <span>Merah</span>
                        </li>
                        <li data-theme="pink">
                            <div class="pink"></div>
                            <span>Pink</span>
                        </li>
                        <li data-theme="purple">
                            <div class="purple"></div>
                            <span>Ungu</span>
                        </li>
                        <li data-theme="deep-purple">
                            <div class="deep-purple"></div>
                            <span>Ungu Tebal</span>
                        </li>
                        <li data-theme="indigo">
                            <div class="indigo"></div>
                            <span>Indigo</span>
                        </li>
                        <li data-theme="blue">
                            <div class="blue"></div>
                            <span>Biru</span>
                        </li>
                        <li data-theme="light-blue">
                            <div class="light-blue"></div>
                            <span>Biru Bercahaya</span>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div>
                            <span>Cyan</span>
                        </li>
                        <li data-theme="teal">
                            <div class="teal"></div>
                            <span>Teal</span>
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                            <span>Hijau</span>
                        </li>
                        <li data-theme="light-green">
                            <div class="light-green"></div>
                            <span>Hijau Bercahaya</span>
                        </li>
                        <li data-theme="lime">
                            <div class="lime"></div>
                            <span>Lime</span>
                        </li>
                        <li data-theme="yellow">
                            <div class="yellow"></div>
                            <span>Kuning</span>
                        </li>
                        <li data-theme="amber">
                            <div class="amber"></div>
                            <span>Amber</span>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                            <span>Orange</span>
                        </li>
                        <li data-theme="deep-orange">
                            <div class="deep-orange"></div>
                            <span>Orange tebal</span>
                        </li>
                        <li data-theme="brown">
                            <div class="brown"></div>
                            <span>Coklat</span>
                        </li>
                        <li data-theme="grey">
                            <div class="grey"></div>
                            <span>Abu-abu</span>
                        </li>
                        <li data-theme="blue-grey">
                            <div class="blue-grey"></div>
                            <span>Biru Keabuan</span>
                        </li>
                        <li data-theme="black">
                            <div class="black"></div>
                            <span>Hitam</span>
                        </li>
                    </ul>
                </div>
               <!-- <div role="tabpanel" class="tab-pane fade" id="settings">
                    <div class="demo-settings">
                        <p>GENERAL SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Report Panel Usage</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Email Redirect</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>SYSTEM SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Notifications</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Auto Updates</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>ACCOUNT SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Offline</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Location Permission</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>-->
        </aside>
        <!-- #END# Right Sidebar -->
    </section>
  
    <section class="content">
<!-- MULAI ISI KONTEN -->
