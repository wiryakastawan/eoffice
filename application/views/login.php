<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> e-OFFICE - Aplikasi Surat Menyurat Elektronik - by Wirya</title>

    <link rel="icon" href="<?php echo base_url('assets/images/favicon.ico')?>" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/fontawsom-all.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/loginstyle.css')?>" />
</head>

<body>
    <div class="container-fluid conya">
        <div class="side-left">
            <div class="sid-layy">
                <div class="row slid-roo">
                    <div class="data-portion">
                       <h4><?php echo $unitkerja; ?></h4>
                       <h2><?php echo $namaopd; ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="side-right">
            <img class="logo" src="<?php echo base_url('assets/images/logo.jpg')?>" alt="">
            
            <h2>Login untuk Masuk</h2>
            <?php if(isset($error)) { echo $error; }; ?>
            <form id="sign_in" method="POST" action="<?php echo base_url() ?>index.php/login">
            <div class="form-row">
                <label for="">Username</label>
                <input type="text" placeholder="username" name="username" class="form-control form-control-sm" required>
            </div>
            
             <div class="form-row">
                <label for="">Password</label>
                <input type="password" placeholder="Password" name="password" class="form-control form-control-sm" required>
            </div>
            
            
            
            
            <div class="form-row dfr">
                <button class="btn btn-sm btn-success">Login</button>
            </div>
            
            
            
            
            
            
        </div>
        <div class="copyco">
               <p><b>&copy;&nbsp Copyright 2019  by Wirya &nbsp &nbsp</b></p> 
            </div>
    </div>   
</body>

<script src="<?php echo base_url('assets/js/jquery-3.2.1.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/popper.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/script.js')?>"></script>


</html>
