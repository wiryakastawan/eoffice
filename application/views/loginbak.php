<?php
//Simple Login System dengan Enkripsi by Wirya
//Project : SIPEKA
//Mulai Dirancang: 17 Juni 2019
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Masuk SI PEKA | Sistem Informasi PErtanggungjawaban KeuAngan</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url('plugins/bootstrap/css/bootstrap.css')?>" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url('plugins/node-waves/waves.css')?>" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url('plugins/animate-css/animate.css')?>" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url('css/style.css')?>" rel="stylesheet">

    
</head>

<body class="login-page">

    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">SI<b>PEKA</b></a>
            <small>Sistem Informasi PErtangungjawaban KeuAngan</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST" action="<?php echo base_url() ?>index.php/login">
                    <div class="msg">Silakan Login Untuk Menggunakan Aplikasi</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">date_range</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="tahun" placeholder="Tahun Anggaran" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">credit_card</i>
                        </span>
                        <div class="form-line">
                            <select name="tahapan" id="tahapan" class="form-control">
                                <option>APBD Induk</option>
                                <option>APBD Perubahan</option>
                            </select>
                        </div>
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                    </div>
                    <div class="row">
                        
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">LOGIN</button>
                        </div>
                    </div>
                   
                </form>
            </div>
        </div>
    </div>
    
    <!-- Jquery Core Js -->
    <script src="<?php echo base_url('plugins/jquery/jquery.min.js')?>"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url('plugins/bootstrap/js/bootstrap.js')?>"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url('plugins/node-waves/waves.js')?>"></script>

    <!-- Validation Plugin Js -->
    <script src="<?php echo base_url('plugins/jquery-validation/jquery.validate.js')?>"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url('js/admin.js')?>"></script>
    <script src="<?php echo base_url('js/pages/examples/sign-in.js')?>"></script>
</body>
 <?php if(isset($error)) { echo $error; }; ?>

               
                   &nbsp &nbsp &nbsp &copy; 2019 <a href="javascript:void(0);">SIPEKA - Dibuat oleh Wirya</a>.
               
                
                    <b>Version: </b> 0.0.1 A
            

</html>
