<?php 
//load header dan menu
$this->load->view('headermenu');?>

        <div class="container-fluid">
            <div class="block-header">

                <?php
                //jika yang login admin bisa liat semua
               // if($this->session->userdata("id_user")){
                     
                    ?>
                     <!-- Hover Zoom Effect -->
            </div>
            <!-- counter khusus operator -->
            <?php
            if($this->session->userdata("role")=="5"){
                ?>
                  <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-4 bg-pink hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">email</i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL SURAT MASUK</div>
                            <div class="number"><?php echo $suratmasukop; ?></div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-4 bg-blue hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL SURAT KELUAR</div>
                            <div class="number"><?php echo $suratkeluarop; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-4 bg-light-green hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">check_circle</i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL DISPOSISI</div>
                            <div class="number"><?php echo $disposisiop; ?></div>
                        </div>
                    </div>
                </div>
                
            </div>
            <img src="<?=base_url()?>/assets/images/logoop2.png" align="center">
            <!-- #END# Hover Zoom Effect -->
          <?php  }   ?>




          <!-- counter secara global -->
          <?php
            if($this->session->userdata("role")=="1" || $this->session->userdata("role")=="2" || $this->session->userdata("role")=="3" || $this->session->userdata("role")=="4"){
                ?>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-2 bg-pink hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">email</i>
                        </div>
                        <div class="content">
                            <div class="text">SURAT MASUK</div>
                            <div class="number"><?php echo $suratmasuk; ?></div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-2 bg-blue hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <div class="content">
                            <div class="text">SURAT KELUAR</div>
                            <div class="number"><?php echo $suratkeluar; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-2 bg-light-green hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">check_circle</i>
                        </div>
                        <div class="content">
                            <div class="text">DISPOSISI</div>
                            <div class="number"><?php echo $disposisi; ?></div>
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- #END# Hover Zoom Effect -->
             <?php
         }


//notifikasi surat masuk dan disposisi untuk admin dan kaban
 if($this->session->userdata("role")=="1" || $this->session->userdata("role")=="2" )
 {
                        ?>
              <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div class="card">
                        <div class="header">
                            <h2>
                                NOTIFIKASI SURAT MASUK
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Sembunyikan</a></li>
      
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Asal Surat</th>
                                            <th>Tanggal Diterima</th>
                                            <th>Isi Ringkas</th>
                                            <th>Tampilan Surat</th>
                                            <th>Tindakan</th>
                                           
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php

                                                $no = 1; 
                                                foreach($notifikasi as $hasilnotif){ 
                                            ?>

                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $hasilnotif->asal_surat ?></td>
                                            <td><?php echo $hasilnotif->tgl_diterima ?></td>
                                            <td><?php echo $hasilnotif->isi?></td>
                                            <td align="center">
                                            <?php
                                             $filename=$hasilnotif->file;
                                             $extensi = pathinfo($filename, PATHINFO_EXTENSION);
                                             if($extensi=="jpg"){
                                             ?>
                                            
                                            <div id="aniimated-thumbnials" class="list-unstyled row clearfix">        
                                            <a href="<?=base_url()?>/uploads/surat/<?php echo $hasilnotif->file ?>" data-sub-html="Tampilan Surat"><img src="<?=base_url()?>/uploads/surat/<?php echo $hasilnotif->file ?>" height="100" width="100" class="img-responsive thumbnail" align="center">
                                            </a>
                                            </div>
                                             <?php}
                                            else if($extensi=="jpeg"){
                                                ?>
                                             <div id="aniimated-thumbnials" class="list-unstyled row clearfix">        
                                            <a href="<?=base_url()?>/uploads/surat/<?php echo $hasilnotif->file ?>" data-sub-html="Tampilan Surat"><img src="<?=base_url()?>/uploads/surat/<?php echo $hasilnotif->file ?>" height="100" width="100" class="img-responsive thumbnail" align="center">
                                            </a>
                                            </div>
                                           <?php
                                        }else if($extensi=="png"){
                                            ?>
                                             <div id="aniimated-thumbnials" class="list-unstyled row clearfix">        
                                            <a href="<?=base_url()?>/uploads/surat/<?php echo $hasilnotif->file ?>" data-sub-html="Tampilan Surat"><img src="<?=base_url()?>/uploads/surat/<?php echo $hasilnotif->file ?>" height="100" width="100" class="img-responsive thumbnail" align="center">
                                            </a>
                                            </div>
                                             <?php
                                        } else if($extensi=="pdf"){
                                            ?>
                                            <a href="<?=base_url()?>/uploads/surat/<?php echo $hasilnotif->file ?>" target="_blank"><button type="button" class="btn bg-green waves-effect">Tampil </button> 
                                            </a>
                                            <?php
                                        }
                                        ?>
                                            </td>
                                            
                                        </td>
                                            <td>
                                               
                                                 <a href="<?=base_url()?>index.php/disposisi/disposisikan/<?php echo $hasilnotif->id_surat; ?>">

                                                <button type="button" class="btn bg-green waves-effect">DISPOSISI </button>
                                                </a>

                                                <a href="<?=base_url()?>index.php/suratmasuk/cetakimage/<?php echo $hasilnotif->id_surat; ?>" target="_blank">
                                                <button type="button" class="btn bg-blue waves-effect">CETAK</button>
                                            </a>
                                        </td>
                       
                                        </tr>
                                         <?php } ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->

             <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="card">
                        <div class="header">
                            <h2>Info Status Surat</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Sembunyikan</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover dashboard-task-infos">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Dari</th>
                                            <th>isi surat</th>
                                            <th>Status</th>
                                            <th>Jawaban</th>
 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Sekretaris</td>
                                            <td>Laporan RKPD</td>
                                            <td><span class="label bg-green">Dijawab</span></td>
                                            <td>Kami tindaklanjuti</td>
                                            
                                        </tr>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
            <?php
 }

        ?>




            <!-- jika yang login eselon 3 dan 4 -->
            <?php
 if($this->session->userdata("role")=="3" || $this->session->userdata("role")=="4")
{

                ?>
                 <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DAFTAR DISPOSISI &nbsp &nbsp 
                                
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Sembunyikan</a></li>
      
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="tabeluser">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Dari</th>
                                             <th>Kepada</th>
                                            <th>Instruksi</th>
                                            <th>isi surat</th>
                                            <th>File surat</th>
                                            <th>Tindakan</th>
                                           
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                                    <?php

                    $no = 1; 
                    foreach($data_disposisi as $hasil){ 
                ?>
                                        <tr>
                                        <td><?php echo $no++ ?></td>
                                            <td><?php echo $hasil->jabatan ?></td>
                                            <td>
                                              
                                            <?php echo $hasil->namabidang;  ?>
                                            <?php echo $hasil->nama_kasi?>
                                              
                                            </td>
                                            <td><?php echo $hasil->isi_disposisi ?></td>
                                            <td><?php echo $hasil->isi ?></td>
                                            <td>
                                              <?php
                                              $filename=$hasil->file;
                                              $extensi = pathinfo($filename, PATHINFO_EXTENSION);
                                              if($extensi=="jpg"){
                                            ?>
                                            <div id="aniimated-thumbnials" class="list-unstyled row clearfix">        
                                            <a href="<?=base_url()?>/uploads/surat/<?php echo $hasil->file ?>" data-sub-html="Tampilan Surat"><img src="<?=base_url()?>/uploads/surat/<?php echo $hasil->file ?>" height="100" width="100" class="img-responsive thumbnail" align="center">
                                                </a>
                                           <?php}
                                            else if($extensi=="jpeg"){
                                                ?>
                                            <div id="aniimated-thumbnials" class="list-unstyled row clearfix">        
                                            <a href="<?=base_url()?>/uploads/surat/<?php echo $hasil->file ?>" data-sub-html="Tampilan Surat"><img src="<?=base_url()?>/uploads/surat/<?php echo $hasil->file ?>" height="100" width="100" class="img-responsive thumbnail" align="center">
                                                </a>
                                                <?php
                                        }else if($extensi=="png"){
                                            ?>
                                            <div id="aniimated-thumbnials" class="list-unstyled row clearfix">        
                                            <a href="<?=base_url()?>/uploads/surat/<?php echo $hasil->file ?>" data-sub-html="Tampilan Surat"><img src="<?=base_url()?>/uploads/surat/<?php echo $hasil->file ?>" height="100" width="100" class="img-responsive thumbnail" align="center">
                                            </a>
                                            <?php
                                        } else if($extensi=="pdf"){
                                            ?>
                                            <a href="<?=base_url()?>/uploads/surat/<?php echo $hasil->file ?>" target="_blank"><button type="button" class="btn bg-blue waves-effect">Tampil </button> 
                                            </a>
                                            <?php
                                        }
                                        ?>
                                            </div>


                                            </td>
                                          
                                            <td>
                                                
                                                <div class="button-demo">
                                                  
                                                        <button type="button" class="btn bg-green waves-effect" data-toggle="modal" data-target="#modaljawaban<?php echo $hasil->id_disposisi;?>">Jawaban </button>
                                                  
                                                     <a href="<?=base_url()?>index.php/disposisi/tindaklanjut/<?php echo $hasil->id_disposisi ?>">
                                                        <button type="button" class="btn bg-orange waves-effect">Tindaklanjuti </button>
                                                    </a>  
                                                    <?php
                                                    if($this->session->userdata("role")=="3"){
                                                        ?>
                                                    <a href="<?=base_url()?>index.php/disposisi/disposisikabid/<?php echo $hasil->id_surat; ?>">

                                                <button type="button" class="btn bg-blue waves-effect">DISPOSISI </button>
                                                </a>
                                                <?php
                                                     }
                                                ?>
                                                 </div> 
                                             </td>           
                       
                                        </tr>
                                        
                                         <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
}
        ?>
                     <!-- Basic Examples -->
                   
            </div>
        </div>
<?php    
//load footer
$this->load->view('footer');
?>