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
                                DAFTAR KODE SURAT &nbsp &nbsp 
                                
                                <button type="button" class="btn bg-indigo waves-effect" data-toggle="modal" data-target="#modaltambah" data-color="blue-grey">TAMBAH KODE</button>
                                
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
                                            <th>Kode</th>
                                             <th>Nama</th>
                                            <th>Uraian</th>
                                            <th>Tindakan</th>
                                           
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                   <?php

                    $no = 1; 
                    foreach($data_kodesurat as $hasil){ 
                ?>
                                        <tr>
                                        <td><?php echo $no++ ?></td>
                                            <td><?php echo $hasil->kode ?></td>
                                            <td><?php echo $hasil->namakode ?></td>
                                            <td><?php echo $hasil->uraian ?></td>
                                          
                                            <td>
                                            	
                                            	<div class="button-demo">
                                     
		                                                <button type="button" class="btn bg-green waves-effect" data-toggle="modal" data-target="#modaledit<?php echo $hasil->id_kode;?>">EDIT </button>
		                                           
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
	  window.location.href="<?=base_url()?>index.php/kodesurat/hapus/"+id;
    swal("Terhapus!", "Data telah dihapus.", "success");   

  } else {
    swal("Batal", "Data tidak jadi dihapus", "error");
  }

        
    });
}
 </script>
		                                            
		                                             <input type="hidden" name="id_kodesurat" value="<?php echo $hasil->id_kode; ?>">
		                                            
		                                                <button type="button" class="btn bg-red waves-effect" onclick="showConfirmMessage(this.id)" value="" id="<?php echo $hasil->id_kode; ?>">HAPUS 
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

    
            <!-- Modal kode surat-->
              <form id="tambahkode" action="<?=base_url()?>index.php/kodesurat/simpan" method="post" enctype="multipart/form-data">
	 
	      <div class="modal fade" id="modaltambah"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	        <div class="modal-dialog">
	           <div class="modal-content">

	               <div class="modal-header">
	                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                   <h4 class="modal-title" id="myModalLabel">Tambah data Kode Surat</h4>
	                   
	                    
	               </div>
	               <div class="modal-body">
	               	<label for="user">Kode</label>
	               	   <div class="form-group">
	                   	  <div class="form-line">
	                       <input type="text" name="kodesurat" class="form-control" placeholder="Kode Surat" required>
	                       </div>
	                   </div>
	                   	<label for="pass">Nama Kode</label>
	                   <div class="form-group">
	                   	  <div class="form-line">
	                       <input type="text" name="nama" class="form-control" placeholder="Nama Kode Surat" required>
	                       </div>
	                   </div>
                       <label for="mail">Uraian tentang kode surat</label>
                       <div class="form-group form-float">
                           
                           <div class="form-line">
                           <input type="text" name="uraian" class="form-control" placeholder="Uraian Kode"  required>
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
              <form id="editkode" action="<?=base_url()?>index.php/kodesurat/update" method="post" enctype="multipart/form-data">
              	<?php 
        foreach($edit_kodesurat->result_array() as $i):

            $id_kodesurat=$i['id_kode'];
            $kode=$i['kode'];
            $nama=$i['namakode'];
            $uraian=$i['uraian'];
       
        ?>
	 
	      <div class="modal fade" id="modaledit<?php echo $id_kodesurat;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	        <div class="modal-dialog">
	           <div class="modal-content">
	               <div class="modal-header">
	                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                   <h4 class="modal-title" id="myModalLabel">Edit data User</h4>
	                   <input type="hidden" name="id_kodesurat" value="<?php echo $id_kodesurat;?>">
	                    
	               </div>
	               <div class="modal-body">
	               	<label for="username">Kode</label>
	               	   <div class="form-group">
	                   	  <div class="form-line">
	                       <input type="text" name="kode" value="<?php echo $kode;?>" class="form-control" placeholder="Kode Surat" required>
	                       </div>
	                   </div>
	                   	<label for="pass">Nama Kode Surat</label>
	                   <div class="form-group">
	                   	  <div class="form-line">
	                       <input type="text" name="nama" class="form-control" value="<?php echo $nama;?>" placeholder="Nama Kode Surat" required>
	                       </div>
	                   </div>
                       <label for="fullnam">Uraian</label>
                       <div class="form-group">
                           
                           <div class="form-line">
                           <input type="text" name="nama" class="form-control" value="<?php echo $uraian;?>" placeholder="Uraian" required>
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