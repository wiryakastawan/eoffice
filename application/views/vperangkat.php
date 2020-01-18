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
                                PENGATURAN PERANGKAT DAERAH &nbsp &nbsp 
                                
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
                                        	<!--<th>No</th>-->
                                            <th>Unit Kerja</th>
                                             <th>Nama Perangkat Daerah</th>
                                            <th>Alamat</th>
                                            <th>telp</th>
                                            <th>email</th>
                                            <th>Tindakan</th>
                                           
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                   <?php

                    //$no = 1; 
                    foreach($data_perangkat as $hasil){ 
                ?>
                                        <tr>
                                        <!--<td><?php //echo $no++ ?></td>-->
                                            <td><?php echo $hasil->unit_kerja ?></td>
                                            <td><?php echo $hasil->nama ?></td>
                                            <td><?php echo $hasil->alamat ?></td>
                                            <td><?php echo $hasil->telp ?></td>   
                                            <td><?php echo $hasil->email ?></td>
                                            
                                            <td>
                                            	
                                            	<div class="button-demo">
                                     
		                                                <button type="button" class="btn bg-green waves-effect" data-toggle="modal" data-target="#modaledit<?php echo $hasil->id_perangkat;?>">EDIT </button>
		                                           
		                                          
		                                            
		                                             <input type="hidden" name="id_perangkat" value="<?php echo $hasil->id_perangkat; ?>">
		                                             <input type="hidden" name="filelogo" value="<?php echo $hasil->logodepan ?>">
		                                              
		                                          
		                                            
		                                           	
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

    
	
       <!-- Modal edit surat-->
              <form id="edituser" action="<?=base_url()?>index.php/perangkat/update" method="post" enctype="multipart/form-data">
              	<?php 
        foreach($edit_perangkat->result_array() as $i):

            $id_perangkat=$i['id_perangkat'];
            $nama=$i['nama'];
            $unitkerja=$i['unit_kerja'];
            $alamat=$i['alamat'];
            $telp=$i['telp'];
            $jabatanx=$i['jabatan'];
            $email=$i['email'];
            $namafile=$i['logodepan'];
        ?>
	 
	      <div class="modal fade" id="modaledit<?php echo $id_perangkat;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	        <div class="modal-dialog">
	           <div class="modal-content">
	               <div class="modal-header">
	                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                   <h4 class="modal-title" id="myModalLabel">Edit data User</h4>
	                   <input type="hidden" name="id_perangkat" value="<?php echo $id_perangkat;?>">
	                   <input type="hidden" name="logolama" value="<?php echo $namafile;?>">
	                    
	               </div>
	               <div class="modal-body">
	               	<label for="username">Nama Perangkat Daerah</label>
	               	   <div class="form-group">
	                   	  <div class="form-line">
	                       <input type="text" name="nama" value="<?php echo $nama;?>" class="form-control" placeholder="Nama Perangkat Daerah" required>
	                       </div>
	                   </div>
	                   	<label for="pass">Unit Kerja</label>
	                   <div class="form-group">
	                   	  <div class="form-line">
	                       <input type="text" name="unitkerja" class="form-control" value="<?php echo $unitkerja;?>" placeholder="Unit Kerja" required>
	                       </div>
	                   </div>
                       <label for="fullnam">Alamat</label>
                       <div class="form-group">
                           
                           <div class="form-line">
                           <input type="text" name="alamat" class="form-control" value="<?php echo $alamat;?>" placeholder="Alamat" required>
                           </div>
                       
                       </div>
                       <label for="nipo">Telp</label>
                       <div class="form-group">
                           
                           <div class="form-line">
                           <input type="text" name="telp" class="form-control" value="<?php echo $telp;?>" placeholder="Telepon" required>
                           </div>
                       
                       </div>
                       <label for="jbt">Nama Jabatan</label>
                       <div class="form-group">
                           
                           <div class="form-line">
                           <input type="text" name="jabatan" class="form-control" value="<?php echo $jabatanx;?>" placeholder="Nama Jabatan Perangkat Daerah" required>
                           </div>
                       
                       </div>
 
	                   <label for="mail">email</label>
					   <div class="form-group">
					   	   
					   	   <div class="form-line">
	                       <input type="text" name="email" class="form-control" value="<?php echo $email;?>" placeholder="E-Mail" id="email" required>
	                       </div>
	                   
	                   </div>
                     
	                  
	                   <label for="filescan">Upload Logo Depan</label>
                        <div class="form-group">
                        	<div class="form-line">
	                    <input type="file" name="fotologo" class="form-control"><?php echo $namafile;?>
                        </div>
                        </div>
	               </div>
	               <div class="modal-footer">
	                   	<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
	                  	<button type="submit" id="add-row" class="btn btn-success">Update</button>
	               </div>
	      			</div>
	        </div>
	     </div>
	 </form>

    <?php endforeach;?>
    <!--END MODAL EDIT BARANG-->
	
            <?php    
//load footer
$this->load->view('footer');
?>