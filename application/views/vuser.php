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
                                DAFTAR PENGGUNA &nbsp &nbsp 
                                
                                <button type="button" class="btn bg-indigo waves-effect" data-toggle="modal" data-target="#modaltambah" data-color="blue-grey">TAMBAH PENGGUNA</button>
                                
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
                                            <th>Username</th>
                                             <th>Nama</th>
                                            <th>Nip</th>
                                            <th>Jabatan</th>
                                            <th>E-Mail</th>
                                            <th>Hak Akses</th>
                                            <th>Tindakan</th>
                                           
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                   <?php

                    //$no = 1; 
                    foreach($data_pengguna as $hasil){ 
                ?>
                                        <tr>
                                        <!--<td><?php //echo $no++ ?></td>-->
                                            <td><?php echo $hasil->username ?></td>
                                            <td><?php echo $hasil->nama ?></td>
                                            <td><?php echo $hasil->nip ?></td>
                                            <td><?php echo $hasil->jabatan ?></td>   
                                            <td><?php echo $hasil->email ?></td>
                                             <?php
                                             $hakakses=$hasil->role;
                            if($hakakses=="1"){
                                $namakses="Superadmin";
                            }
                            else if($hakakses=="2")
                            {
                                $namakses="Kepala Badan";
                            }
                            else if($hakakses=="3")
                            {
                                $namakses="Kepala Bidang/Bagian/Sekretaris";
                            }
                            else if($hakakses=="4")
                            {
                                $namakses="Kepala Sub Bagian/Bidang";
                            }
                            else{
                               $namakses="Operator"; 
                            }
                            ?>
                                            <td><?php echo $namakses ?></td>
                                            <td>
                                            	
                                            	<div class="button-demo">
                                     
		                                                <button type="button" class="btn bg-green waves-effect" data-toggle="modal" data-target="#modaledit<?php echo $hasil->id_user;?>">EDIT </button>
		                                           
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
	  window.location.href="<?=base_url()?>index.php/profile/hapus/"+id;
    swal("Terhapus!", "Data telah dihapus.", "success");   

  } else {
    swal("Batal", "Data tidak jadi dihapus", "error");
  }

        
    });
}
 </script>
		                                            
		                                             <input type="hidden" name="id_user" value="<?php echo $hasil->id_user; ?>">
		                                             <input type="hidden" name="filefoto" value="<?php echo $hasil->foto ?>">
		                                                <button type="button" class="btn bg-red waves-effect" onclick="showConfirmMessage(this.id)" value="" id="<?php echo $hasil->id_user; ?>">HAPUS 
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

    
            <!-- Modal Add surat-->
              <form id="tambahuser" action="<?=base_url()?>index.php/profile/simpan" method="post" enctype="multipart/form-data">
	 
	      <div class="modal fade" id="modaltambah"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	        <div class="modal-dialog">
	           <div class="modal-content">

	               <div class="modal-header">
	                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                   <h4 class="modal-title" id="myModalLabel">Tambah data Pengguna</h4>
	                   
	                    
	               </div>
	               <div class="modal-body">
	               	<label for="user">Username</label>
	               	   <div class="form-group">
	                   	  <div class="form-line">
	                       <input type="text" name="username" class="form-control" placeholder="username" required>
	                       </div>
	                   </div>
	                   	<label for="pass">Password</label>
	                   <div class="form-group">
	                   	  <div class="form-line">
	                       <input type="password" name="password" class="form-control" placeholder="Password" required>
	                       </div>
	                   </div>
                       <label for="mail">Nama Lengkap</label>
                       <div class="form-group form-float">
                           
                           <div class="form-line">
                           <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" id="nama" required>
                           </div>
                       
                       </div>
                       <label for="mail">NIP</label>
                       <div class="form-group form-float">
                           
                           <div class="form-line">
                           <input type="text" name="nip" class="form-control" placeholder="NIP" id="nip" required>
                           </div>
                       
                       </div>
	                   <label for="mail">Email</label>
					   <div class="form-group form-float">
					   	   
					   	   <div class="form-line">
	                       <input type="text" name="email" class="form-control" placeholder="email" id="email" required>
	                       </div>
	                   
	                   </div>
                       <label for="mail">Jabatan</label>
                       <div class="form-group form-float">
                           
                           <div class="form-line">
                           <select name="jabatan" class="form-control">
                           <?php
                          
                            foreach ($data_kaban as $kabanx) {
                              ?>
                             <option value="<?php echo $kabanx->jabatan?>"><?php echo $kabanx->jabatan ?></option>

                            <?php
                          }
                            foreach ($data_bidang as $pejabat) {
                              ?>
                              <option value="<?php echo $pejabat->namabidang?>"><?php echo $pejabat->namabidang?></option>
                              <?php
                            }
                            foreach ($data_kasi as $kepalaseksi) {
                             ?>
                              <option value="<?php echo $kepalaseksi->nama_kasi?>"><?php echo $kepalaseksi->nama_kasi?></option>
                              <?php
                            }

                            ?>
                            <option value="operator">Operator</option>
                          </select>
                           </div>
                       
                       </div>
	                  
	                   <div class="form-group">
                        <label for="hak">Hak akses</label>
	                       <select name="role" class="form-control" title="Pilih Hak Akses">
                            <option value="1">Superadmin</option>
                            <option value="2">Kepala Badan</option>
                            <option value="3">Kepala Bidang/Bagian/Sekretaris</option>
                            <option value="4">Kepala Sub Bagian/Bidang</option>
                            <option value="5">Operator Surat</option>
                           </select>
						
                    </div>
	                   <label for="filescan">Upload foto</label>
                        <div class="form-group">
                        	<div class="form-line">
	                    <input type="file" name="fotopengguna" class="form-control">
                        </div>
                        </div>
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
        <?php
        foreach($edit_user->result_array() as $i):

            $id_user=$i['id_user'];
            $username=$i['username'];
            $password=$i['password'];
            $nama=$i['nama'];
            $nip=$i['nip'];
            $jabatan=$i['jabatan'];
            $email=$i['email'];
            $hakakses=$i['role'];
            $namafile=$i['foto'];
        ?>
	   <form id="edituser" action="<?=base_url()?>index.php/profile/update" method="post" enctype="multipart/form-data">
                 
	      <div class="modal fade" id="modaledit<?php echo $id_user;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	        <div class="modal-dialog">
	           <div class="modal-content">
	               <div class="modal-header">
	                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                   <h4 class="modal-title" id="myModalLabel">Edit data User</h4>
	                   <input type="hidden" name="id_user" value="<?php echo $id_user;?>">
	                   <input type="hidden" name="fotolama" value="<?php echo $namafile;?>">
	                    
	               </div>
	               <div class="modal-body">
	               	<label for="username">username</label>
	               	   <div class="form-group">
	                   	  <div class="form-line">
	                       <input type="text" name="username" value="<?php echo $username;?>" class="form-control" placeholder="Username" required>
	                       </div>
	                   </div>
	                   	<label for="pass">Password</label>
	                   <div class="form-group">
	                   	  <div class="form-line">
	                       <input type="password" name="password" class="form-control" value="" placeholder="password" required>
	                       </div>
	                   </div>
                       <label for="fullnam">Nama Lengkap</label>
                       <div class="form-group">
                           
                           <div class="form-line">
                           <input type="text" name="nama" class="form-control" value="<?php echo $nama;?>" placeholder="Nama Lengkap" required>
                           </div>
                       
                       </div>
                       <label for="nipo">NIP</label>
                       <div class="form-group">
                           
                           <div class="form-line">
                           <input type="text" name="nip" class="form-control" value="<?php echo $nip;?>" placeholder="Nip" required>
                           </div>
                       
                       </div>
 
	                   <label for="mail">email</label>
					   <div class="form-group">
					   	   
					   	   <div class="form-line">
	                       <input type="text" name="email" class="form-control" value="<?php echo $email;?>" placeholder="E-Mail" id="email" required>
	                       </div>
	                   
	                   </div>
                       <label for="mail">Jabatan</label>
                       <div class="form-group form-float">
                           
                           <div class="form-line">
                           <select name="jabatan" class="form-control">
                            <option selected><?php echo $jabatan;?></option>
                           <?php
                          
                            foreach ($data_kaban as $kabanx) {
                              ?>
                             <option value="<?php echo $kabanx->jabatan?>"><?php echo $kabanx->jabatan ?></option>

                            <?php
                          }
                            foreach ($data_bidang as $pejabat) {
                              ?>
                              <option value="<?php echo $pejabat->namabidang?>"><?php echo $pejabat->namabidang?></option>
                              <?php
                            }
                            foreach ($data_kasi as $kepalaseksi) {
                             ?>
                              <option value="<?php echo $kepalaseksi->nama_kasi?>"><?php echo $kepalaseksi->nama_kasi?></option>
                              <?php
                            }

                            ?>
                            <option value="operator">Operator</option>
                          </select>
                           </div>
                       
                       </div>
                       <label for="hak">Hak Akses</label>
                       <div class="form-group">
                         
                           <select name="role" class="selectpicker show-tick form-control" title="Pilih Hak Akses">
                            <?php
                            if($hakakses=="1"){
                                $namakses="Superadmin";
                            }
                            else if($hakakses=="2")
                            {
                                $namakses="Kepala Badan";
                            }
                            else if($hakakses=="3")
                            {
                                $namakses="Kepala Bidang/Bagian/Sekretaris";
                            }
                            else if($hakakses=="4")
                            {
                                $namakses="Kepala Sub Bagian/Bidang";
                            }
                            else{
                               $namakses="Operator"; 
                            }
                            ?>

                            <option value="<?php echo $hakakses;?>" selected><?php echo $namakses;?></option>
                            <option>------------</option>
                            <option value="1">Superadmin</option>
                            <option value="2">Kepala Badan</option>
                            <option value="3">Kepala Bidang/Bagian/Sekretaris</option>
                            <option value="4">Kepala Sub Bagian/Bidang</option>
                            <option value="5">Operator Surat</option>
                           </select>
                        
                       </div>
	                  
	                   <label for="filescan">Upload foto pengguna</label>
                        <div class="form-group">
                        	<div class="form-line">
	                    <input type="file" name="fotopengguna" class="form-control"><?php echo $namafile;?>
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