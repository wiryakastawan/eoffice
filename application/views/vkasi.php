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
                                DAFTAR PEJABAT ESELON IV &nbsp &nbsp 
                                
                                <button type="button" class="btn bg-indigo waves-effect" data-toggle="modal" data-target="#modaltambah" data-color="blue-grey">TAMBAH PEJABAT</button>
                                
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
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="tabelkasi">
                                    <thead>
                                        <tr>
                                        	<th>No</th>
                                            <th>Atasan Langsung</th>
                                             <th>Nama Jabatan</th>
                                            <th>Nama Pejabat</th>
                                            <th>Nip</th>
                                            <th>Tindakan</th>
                                           
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                   <?php

                    $no = 1; 
                    foreach($data_kasi as $hasil){ 
                ?>
                                        <tr>
                                        <td><?php echo $no++ ?></td>
                                       
                                  
                                            <td><?php echo $hasil->namabidang;?></td>

                                            <td><?php echo $hasil->nama_kasi ?></td>
                                            <td><?php echo $hasil->nama_kepalaseksi ?></td>
                                             <td><?php echo $hasil->nip_seksi ?></td>
                                          
                                            <td>
                                            	
                                            	<div class="button-demo">
                                     
		                                                <button type="button" class="btn bg-green waves-effect" data-toggle="modal" data-target="#modaledit<?php echo $hasil->id_kasi;?>">EDIT </button>
		                                           
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
	  window.location.href="<?=base_url()?>index.php/kasi/hapus/"+id;
    swal("Terhapus!", "Data telah dihapus.", "success");   

  } else {
    swal("Batal", "Data tidak jadi dihapus", "error");
  }

        
    });
}
 </script>
		                                            
		                                             <input type="hidden" name="id_kasi" value="<?php echo $hasil->id_kasi; ?>">
		                                            
		                                                <button type="button" class="btn bg-red waves-effect" onclick="showConfirmMessage(this.id)" value="" id="<?php echo $hasil->id_kasi; ?>">HAPUS 
		                                                </button>
		                                          
		                                            
		                                           	
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

    
            <!-- Modal kasi tambah-->
              <form id="tambahkasi" action="<?=base_url()?>index.php/kasi/simpan" method="post" >
	 
	      <div class="modal fade" id="modaltambah"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	        <div class="modal-dialog">
	           <div class="modal-content">

	               <div class="modal-header">
	                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                   <h4 class="modal-title" id="myModalLabel">Tambah Pejabat Eseleon IV</h4>
	                   
	                    
	               </div>
	               <div class="modal-body">
	               	<label for="user">Atasan Langsung</label>
	               	   <div class="form-group">
	                   	  <div class="form-line">
	                       <select name="namabidang" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Atasan Langsung">
                          <?php
 
                    foreach($data_bidang as $hasil){ 
                          ?>
                          <option value="<?php echo $hasil->id_bidang ?>"> <?php echo $hasil->namabidang ?> </option>
                                <?php
                              }
                              ?>
                            </select>
	                       </div>
	                   </div>
	                   	<label for="jbt">Jabatan</label>
	                   <div class="form-group">
	                   	  <div class="form-line">
	                       <input type="text" name="namakasi" class="form-control" placeholder="Nama jabatan" required>
	                       </div>
	                   </div>
                       <label for="nmjbt">Nama Pejabat</label>
                       <div class="form-group form-float">
                           
                           <div class="form-line">
                           <input type="text" name="namapejabat" class="form-control" placeholder="Nama Pejabat"  required>
                           </div>
                       
                       </div>
                       <label for="nipe">Nip</label>
                     <div class="form-group">
                        <div class="form-line">
                         <input type="text" name="nip" class="form-control" placeholder="NIP" required>
                         </div>
                     </div>
                     <label for="pkt">Pangkat</label>
                     <div class="form-group">
                        <div class="form-line">
                         <input type="text" name="pangkat" class="form-control" placeholder="Pangkat" required>
                         </div>
                     </div>
                       
	               </div>
                 <div class="form-group">
                        <label for="hak">Kaitan dengan Pengguna</label>
                         <select name="pengguna" class="form-control" title="Pilih User terkait dengan Jabatan ini">
                          <?php
                          
                            foreach ($data_user as $hsluser) {
                              ?>
                             <option value="<?php echo $hsluser->id_user?>"><?php echo $hsluser->username?>&nbsp - &nbsp<?php echo $hsluser->jabatan?></option>

                            <?php
                          }
                          ?>
                           </select>
            
                    </div>
	               <div class="modal-footer">
	                   	<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
	                  	<button type="submit" id="add-row" class="btn btn-success">Simpan</button>
	               </div>
	      			</div>
	        </div>
	     </div>
	 </form>
	
       <!-- Modal edit surat-->
              <form id="editkode" action="<?=base_url()?>index.php/kasi/update" method="post" enctype="multipart/form-data">
              	<?php 
        foreach($edit_kasi->result_array() as $i):

            $id_kasi=$i['id_kasi'];
            $id_bidang=$i['id_bidang'];
            $namakasi=$i['nama_kasi'];
            $namakepala=$i['nama_kepalaseksi'];
            $nip=$i['nip_seksi'];
            $pangkat=$i['pangkat'];
            $iduser=$i['id_user'];

                
        ?>
	 
	      <div class="modal fade" id="modaledit<?php echo $id_kasi;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	        <div class="modal-dialog">
	           <div class="modal-content">
	               <div class="modal-header">
	                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                   <h4 class="modal-title" id="myModalLabel">Edit kasi</h4>
	                   <input type="hidden" name="id_kasi" value="<?php echo $id_kasi;?>">
                     <input type="hidden" name="id_bidang" value="<?php echo $id_bidang;?>">
	                    
	               </div>
	               <div class="modal-body">
	               	 <label for="user">Atasan Langsung</label>
                     <div class="form-group">
                        <div class="form-line">
                         <select name="namabidang" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Atasan Langsung">
                           <?php foreach($data_bidang as $hasil){ 
                    if($id_bidang==$hasil->id_bidang){
                      ?>
                      <option value="<?php echo $hasil->id_bidang?>" selected><?php echo $hasil->namabidang?></option>
                <?php    }
                else{
                ?>
                      <option value="<?php echo $hasil->id_bidang?>"><?php echo $hasil->namabidang ?></option>
               <?php   } 
                 } 
               ?>
                      </select>
                         </div>
                     </div>
                      <label for="jbt">Jabatan</label>
                     <div class="form-group">
                        <div class="form-line">
                         <input type="text" name="namakasi" class="form-control" placeholder="Nama jabatan" value="<?php echo $namakasi;?>" required>
                         </div>
                     </div>
                       <label for="nmjbt">Nama Pejabat</label>
                       <div class="form-group form-float">
                           
                           <div class="form-line">
                           <input type="text" name="namapejabat" class="form-control" placeholder="Nama Pejabat" value="<?php echo $namakepala;?>"  required>
                           </div>
                       
                       </div>
                       <label for="nipe">Nip</label>
                     <div class="form-group">
                        <div class="form-line">
                         <input type="text" name="nip" class="form-control" placeholder="NIP" value="<?php echo $nip;?>" required>
                         </div>
                     </div>
                     <label for="pkt">Pangkat</label>
                     <div class="form-group">
                        <div class="form-line">
                         <input type="text" name="pangkat" class="form-control" placeholder="Pangkat" value="<?php echo $pangkat;?>" required>
                         </div>
                     </div>
                      
	               </div>
                  <div class="form-group">
                        <label for="hak">Kaitan dengan Pengguna</label>
                         <select name="pengguna" class="form-control" title="Pilih User terkait dengan Jabatan ini">
                          <?php
                          
                            foreach ($data_user as $hsluser) {
                              ?>
                             <option value="<?php echo $hsluser->id_user?>"><?php echo $hsluser->username?>&nbsp - &nbsp<?php echo $hsluser->jabatan?></option>

                            <?php
                          }
                          ?>
                           </select>
            
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