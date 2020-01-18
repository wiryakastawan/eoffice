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
                                DAFTAR PEJABAT ESELON III &nbsp &nbsp 
                                
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
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="tabelbidang">
                                    <thead>
                                        <tr>
                                        	<th>No</th>
                                            <th>Jabatan</th>
                                             <th>Nama Pejabat</th>
                                            <th>Nip</th>
                                            <th>Tindakan</th>
                                           
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                   <?php

                    $no = 1; 
                    foreach($data_bidang as $hasil){ 
                ?>
                                        <tr>
                                        <td><?php echo $no++ ?></td>
                                            <td><?php echo $hasil->namabidang ?></td>
                                            <td><?php echo $hasil->nama_kepala ?></td>
                                            <td><?php echo $hasil->nip ?></td>
                                          
                                            <td>
                                            	
                                            	<div class="button-demo">
                                     
		                                                <button type="button" class="btn bg-green waves-effect" data-toggle="modal" data-target="#modaledit<?php echo $hasil->id_bidang ?>">EDIT </button>
		                                           
		                                            <script>
    function showConfirmMessage(id) {
    swal({
        title: "Anda Yakin?",
        text: "Anda Tidak akan bisa mengembalikan file! Bisa saja Nama Pejabat ini terkait dengan disposisi dan surat masuk",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Ya, Hapus!",
        closeOnConfirm: false
    }, function(isConfirm){
  if (isConfirm) {
	  window.location.href="<?=base_url()?>index.php/bidang/hapus/"+id;
    swal("Terhapus!", "Data telah dihapus.", "success");   

  } else {
    swal("Batal", "Data tidak jadi dihapus", "error");
  }

        
    });
}
 </script>
		                                            
		                                             <input type="hidden" name="id_bidang" value="<?php echo $hasil->id_bidang; ?>">
		                                            
		                                                <button type="button" class="btn bg-red waves-effect" onclick="showConfirmMessage(this.id)" value="" id="<?php echo $hasil->id_bidang; ?>">HAPUS 
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

    
            <!-- Modal bidang-->
              <form id="tambahbidang" action="<?=base_url()?>index.php/bidang/simpan" method="post" >
	 
	      <div class="modal fade" id="modaltambah"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	        <div class="modal-dialog">
	           <div class="modal-content">

	               <div class="modal-header">
	                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                   <h4 class="modal-title" id="myModalLabel">Tambah Eselon III</h4>
	                   
	                    
	               </div>
	               <div class="modal-body">
	               	<label for="user">Nama Bidang</label>
	               	   <div class="form-group">
	                   	  <div class="form-line">
	                       <input type="text" name="namabidang" class="form-control" placeholder="Nama Bidang" required>
	                       </div>
	                   </div>
	                   	<label for="pjbtny">Nama Pejabat</label>
	                   <div class="form-group">
	                   	  <div class="form-line">
	                       <input type="text" name="namapejabat" class="form-control" placeholder="Nama Pejabat" required>
	                       </div>
	                   </div>
                       <label for="nipna">NIP</label>
                       <div class="form-group form-float">
                           
                           <div class="form-line">
                           <input type="text" name="nip" class="form-control" placeholder="Nip"  required>
                           </div>
                       
                       </div>   
                       <label for="pangkate">Pangkat</label>
                     <div class="form-group">
                        <div class="form-line">
                         <input type="text" name="Pangkat" class="form-control" placeholder="Pangkat" required>
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
	
       <!-- Modal edit bidang-->
              <form action="<?=base_url()?>index.php/bidang/update" method="post"  >
              	  <?php 
        foreach($edit_bidang->result_array() as $i):

            $idbidang=$i['id_bidang'];
            $namabidang=$i['namabidang'];
            $namakepala=$i['nama_kepala'];
            $nip=$i['nip'];
            $pangkat=$i['pangkat'];
            $idperangkat=$i['id_perangkat'];
            $iduser=$i['id_user'];
       
        ?>
	             <div class="modal fade" id="modaledit<?php echo $idbidang;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                     <h4 class="modal-title" id="myModalLabel">Edit Eselon III</h4>
                 </div>

                 <div class="modal-body">

                     <label for="user">Nama Bidang</label>
                     <div class="form-group">
                        <div class="form-line">
                         <input type="text" name="namabidang" class="form-control" placeholder="Nama Bidang" value="<?php echo $namabidang;?>" required>
                         </div>
                     </div>

                     <label for="pjbtny">Nama Pejabat</label>
                     <div class="form-group">
                        <div class="form-line">
                         <input type="text" name="namapejabat" class="form-control" placeholder="Nama Pejabat" value="<?php echo $namakepala;?>" required>
                         </div>
                     </div>

                      <label for="nipna">NIP</label>
                       <div class="form-group">
                           
                           <div class="form-line">
                           <input type="text" name="nip" class="form-control" placeholder="Nip" value="<?php echo $nip;?>" required>
                           </div>
                       </div>   

                     <label for="pangkate">Pangkat</label>
                     <div class="form-group">
                        <div class="form-line">
                         <input type="text" name="Pangkat" class="form-control" placeholder="Pangkat" value="<?php echo $pangkat;?>" required>
                         </div>
                     </div>
                
                    <div class="form-group">
                        <label for="user">Kaitan dengan Pengguna</label>
                         <select name="pengguna" class="form-control" title="Pilih User terkait dengan Jabatan ini">
                          <?php
                          
                            foreach ($data_user as $hsluser) {
                              if($hsluser->id_user==$iduser){
                                ?>
                               <option value="<?php echo $iduser?>" selected><?php echo $hsluser->username?>&nbsp - &nbsp<?php echo $hsluser->jabatan?></option>
                                <?php
                              }
                               ?>
                             <option value="<?php echo $hsluser->id_user?>"><?php echo $hsluser->username?>&nbsp - &nbsp<?php echo $hsluser->jabatan?></option>

                            <?php
                          }
                          ?>
                           </select>
                    </div>

                     <input type="hidden" name="id_bidang" value="<?php echo $idbidang;?>">  

                           <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                <button type="submit" id="add-row" class="btn btn-success">Update</button>
                           </div>
                       </div>
                    </div>
                  </div>
                </div>
                    <?php endforeach;?>
              </form>
   
     


    <!--END MODAL EDIT BARANG-->
	
            <?php    
//load footer
$this->load->view('footer');
?>