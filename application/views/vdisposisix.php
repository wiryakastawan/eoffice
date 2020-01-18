<?php 
//load header dan menu
$this->load->view('headermenu');?>
<div class="container-fluid">
            <div class="block-header">
            	   <!-- Basic Examples -->
            	    <?php if(isset($error)) { echo $error; }; ?>
            	     <?=$this->session->flashdata('pesan')?>

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
                                            <?php echo $hasil->nama_kasi;  ?>
                                           
                                              
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
                                            	<?php
                                    if($this->session->userdata("role")=="1" || $this->session->userdata("role")=="2")
                                    {
                                        ?>
                                            	
                                                    <a href="<?=base_url()?>index.php/disposisi/editdisposisi/<?php echo $hasil->id_disposisi ?>">
		                                                <button type="button" class="btn bg-green waves-effect">EDIT </button>
                                                    </a>
		                                           
		                                            <script>
    function showConfirmMessage(id) {
    swal({
        title: "Anda Yakin?",
        text: "Anda Tidak akan bisa mengembalikan file!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Ya, Hapus!",
        closeOnConfirm: false
    }, function(isConfirm){
  if (isConfirm) {
	  window.location.href="<?=base_url()?>index.php/disposisi/hapus/"+id;
    swal("Terhapus!", "Data telah dihapus.", "success");   

  } else {
    swal("Batal", "Data tidak jadi dihapus", "error");
  }

        
    });
}
 </script>
		                                            
		                                             <input type="hidden" name="id_disposisi" value="<?php echo $hasil->id_disposisi; ?>">
		                                            
		                                                <button type="button" class="btn bg-red waves-effect" onclick="showConfirmMessage(this.id)" value="" id="<?php echo $hasil->id_disposisi; ?>">HAPUS 
		                                                </button>
		                                          
		                                            <?php
                                                }
                                                ?>
                                        <?php 
                                        if($this->session->userdata("role")=="3")
                                        {
                                            ?>
		                                      <a href="<?=base_url()?>index.php/disposisi/disposisikabid/<?php echo $hasil->id_surat; ?>">

                                                <button type="button" class="btn bg-blue waves-effect">DISPOSISI </button>
                                                </a>
                                                <?php
                                                     }
                                                ?>
                                            <?php
                                             if($this->session->userdata("role")=="3" || $this->session->userdata("role")=="4")
                                            {         
                                            ?>
                                                <a href="<?=base_url()?>index.php/disposisi/jawaban/<?php echo $hasil->id_disposisi ?>">
                                                        <button type="button" class="btn bg-green waves-effect">Jawaban </button>
                                                    </a>  
                                                     <a href="<?=base_url()?>index.php/disposisi/tindaklanjut/<?php echo $hasil->id_disposisi ?>">
                                                        <button type="button" class="btn bg-orange waves-effect">Tindaklanjuti </button>
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
            <!-- #END# Basic Examples -->

    
           
	
 
	
            <?php    
//load footer
$this->load->view('footer');
?>