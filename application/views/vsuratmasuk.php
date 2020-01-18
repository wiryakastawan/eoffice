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
                                DAFTAR SURAT MASUK &nbsp &nbsp 
                                
                                <button type="button" class="btn bg-indigo waves-effect" data-toggle="modal" data-target="#modaltambah" data-color="blue-grey">TAMBAH SURAT</button>
                                
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
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="tabelsuratmasuk">
                                    <thead>
                                        <tr>
                                        	<!--<th>No</th>-->
                                            <th>Asal Surat</th>
                                             <th>No Surat</th>
                                            <th>Tanggal Surat</th>
                                            <th>Tanggal Diterima</th>
                                            <th>Isi Ringkas</th>
                                            <th>File Surat</th>
                                            <th>Tindakan</th>
                                           
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                   <?php

                    //$no = 1; 
                    foreach($data_surat_masuk as $hasil){ 
                ?>
                                        <tr>
                                        <!--<td><?php //echo $no++ ?></td>-->
                                            <td><?php echo $hasil->asal_surat ?></td>
                                            <td><?php echo $hasil->no_surat ?></td>
                                            <td><?php echo $hasil->tgl_surat ?></td>
                                            <td><?php echo $hasil->tgl_diterima ?></td>   
                                            <td><?php echo $hasil->isi ?></td>
                                            <td align="center" width="130">
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
                                            <a href="<?=base_url()?>/uploads/surat/<?php echo $hasil->file ?>" target="_blank"><button type="button" class="btn bg-green waves-effect">Tampil </button> 
                                            </a>
                                            <?php
                                        }
                                        ?>

                                        
                                            
                                            </div>
                                            </td>
                                            <td align="right">
                                            	
                                            	<div class="button-demo">
                                                 <?php
                                                if($this->session->userdata("role")==1 || $this->session->userdata("role")==2)
                                                {
                                                  if($hasil->status<>1){
                                                    ?>
                                                  
		                                            <a href="<?=base_url()?>index.php/disposisi/disposisikan/<?php echo $hasil->id_surat; ?>">
		                                            	<button type="button" class="btn bg-green waves-effect">DISPOSISI </button>
		                                            </a>
                                                <?php
                                                }
                                              }
                                                ?>
		                                            <a href="<?=base_url()?>index.php/suratmasuk/cetakimage/<?php echo $hasil->id_surat; ?>" target="_blank">
		                                                <button type="button" class="btn bg-blue waves-effect">CETAK</button>
		                                            </a>
		                                            
		                                                <button type="button" class="btn bg-orange waves-effect" data-toggle="modal" data-target="#modaledit<?php echo $hasil->id_surat;?>">EDIT </button>
		                                           
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
	  window.location.href="<?=base_url()?>index.php/suratmasuk/hapus/"+id;
    swal("Terhapus!", "Data telah dihapus.", "success");   

  } else {
    swal("Batal", "Data tidak jadi dihapus", "error");
  }

        
    });
}
 </script>
		                                            
		                                             <input type="hidden" name="no_surat" value="<?php echo $hasil->no_surat ?>">
		                                             <input type="hidden" name="namafile" value="<?php echo $hasil->file ?>">
		                                                <button type="button" class="btn bg-red waves-effect" onclick="showConfirmMessage(this.id)" value="" id="<?php echo $hasil->id_surat ?>">HAPUS 
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

    <script>
    $(function(){
    $("#tgl_surat").datepicker({
    container:'#modaltambah',	
    format:'yyyy/mm/dd'})
    .on('changeDate', function(ev){
    $(this).datepicker('hide');
    });
    });
    </script>

    <script>
    $(function(){
    $("#tgl_diterima").datepicker({
    container:'#modaltambah',	
    format:'yyyy/mm/dd'})
    .on('changeDate', function(ev){
    $(this).datepicker('hide');
    });
    });
    </script>
    
            <!-- Modal Add surat-->
              <form id="tambahsurat" action="<?=base_url()?>index.php/suratmasuk/simpan" method="post" enctype="multipart/form-data">
	 
	      <div class="modal fade" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	        <div class="modal-dialog">
	           <div class="modal-content">
	               <div class="modal-header">
	                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                   <h4 class="modal-title" id="myModalLabel">Tambah data Surat Masuk</h4>
	                   
	                    
	               </div>
	               <div class="modal-body">
                    <label for="asal">Sifat</label>
                       <div class="form-group">
                          <div class="form-line">
                          <select name="sifat" class="form-control">
                            <option>Biasa</option>
                            <option>Segera</option>
                            <option>Rahasia</option>
                          </select>  
                           </div>
                       </div>
                       <label for="kodenya">Kode Surat</label>
                       <div class="form-group">
                          <div class="form-line">
                           <select name="kodesurat" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Kode Surat">
                          <?php
 
                    foreach($kode_surat as $hasil){ 
                          ?>
                          <option value="<?php echo $hasil->id_kode ?>"> <?php echo $hasil->kode ?>-<?php echo $hasil->namakode ?> </option>
                                <?php
                              }
                              ?>
                            </select>
                           </div>
                       </div>
                       <label for="tuju">Tujuan</label>
                       <div class="form-group">
                          <div class="form-line">
                           <select name="tujuan" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Tujuan">
                          <?php
 
                    foreach($daftaruser as $hasiluser){ 
                          ?>
                          <option value="<?php echo $hasiluser->id_user ?>"> <?php echo $hasiluser->jabatan ?> </option>
                                <?php
                              }
                              ?>
                            </select>
                           </div>
                       </div>
                       <label for="lamp">Lampiran</label>
                       <div class="form-group">
                          <div class="form-line">
                           <input type="text" name="lampiran" class="form-control" placeholder="Lampiran" required>
                           </div>
                       </div>
	               	<label for="asal">Pengirim Surat</label>
	               	   <div class="form-group">
	                   	  <div class="form-line">
	                       <input type="text" name="asal_surat" class="form-control" placeholder="Asal Surat" required>
	                       </div>
	                   </div>
	                   	<label for="nosurat">Nomor Surat</label>
	                   <div class="form-group">
	                   	  <div class="form-line">
	                       <input type="text" name="no_surat" class="form-control" placeholder="No Surat" required>
	                       </div>
	                   </div>
	                   <label for="tglsurat">Tanggal Surat</label>
					   <div class="form-group">
					   	   
					   	   <div class="form-line">
	                       <input type="text" name="tgl_surat" class="form-control" placeholder="Tanggal Surat" id="tgl_surat" required>
	                       </div>
	                   
	                   </div>
	                  <label for="tglterima">Tanggal Diterima</label>
	                   <div class="form-group">
	                   	   <div class="form-line">
	                       <input type="text" name="tgl_diterima" class="form-control" id="tgl_diterima" placeholder="Tanggal diterima" required>
	                       </div>
	                   </div>
						<label for="isisurat">Ringkasan Isi Surat</label>				 
					   <div class="form-group">
					   	<div class="form-line">
	                       <textarea rows="1" class="form-control no-resize" name="isi" placeholder="Masukkan Ringkasan isi Surat..." required></textarea>
	                   </div>
	                   </div>
	                   <label for="filescan">Upload Scan Surat (Gambar jpg,PNG /PDF)</label>
                        <div class="form-group">
                        	<div class="form-line">
	                    <input type="file" name="filesurat" class="form-control" required>
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
      <form id="editsurat" action="<?=base_url()?>index.php/suratmasuk/update" method="post" enctype="multipart/form-data">
              	<?php 
        foreach($edit_surat->result_array() as $i):

            $id_surat=$i['id_surat'];
            $sifat=$i['sifat'];
            $kode=$i['kode'];
            $namakode=$i['kode'];
            $uraiankode=$i['namakode'];
            $tujuan=$i['tujuan_user'];
            $jabatan=$i['jabatan'];
            $no_surat=$i['no_surat'];
            $lampiran=$i['lampiran'];
            $asal_surat=$i['asal_surat'];
            $isi=$i['isi'];
            $tgl_surat=$i['tgl_surat'];
            $tgl_diterima=$i['tgl_diterima'];
            $namafile=$i['file'];


        ?>
	  
	      <div class="modal fade" id="modaledit<?php echo $id_surat;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	        <div class="modal-dialog">
	           <div class="modal-content">
	               <div class="modal-header">
	                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                   <h4 class="modal-title" id="myModalLabel">Edit data Surat Masuk</h4>
	                   <input type="hidden" name="idsurat" value="<?php echo $id_surat;?>">
	                   <input type="hidden" name="namafilenya" value="<?php echo $namafile;?>">
	                    
	               </div>
	               <div class="modal-body">
                    <label for="asal">Sifat</label>
                       <div class="form-group">
                          <div class="form-line">
                          <select name="sifat" class="form-control">
                            <option selected><?php echo $sifat;?></option>
                            <option>---------------------</option>
                            <option>Biasa</option>
                            <option>Segera</option>
                            <option>Rahasia</option>
                          </select>  
                           </div>
                       </div>
                       <label for="kodenya">Kode Surat</label>
                       <div class="form-group">
                          <div class="form-line">
                           <select name="kodesurat" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Kode Surat">
                        
                          <option value="<?php echo $kode;?>" selected><?php echo $namakode;?>-<?php echo $uraiankode ?></option>
                          <option>--------------------------</option>
                      <?php
                    foreach($kode_surat as $hasil){ 
                       
                        ?>
                          
                                                
                          <option value="<?php echo $hasil->id_kode ?>"> <?php echo $hasil->kode ?>-<?php echo $hasil->namakode ?> </option>
                                <?php
                
                              }
                              ?>
                            </select>
                           </div>
                       </div>
                        <label for="tuju">Tujuan</label>
                       <div class="form-group">
                          <div class="form-line">
                           <select name="tujuan" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Tujuan">
                             <option value="<?php echo $tujuan;?>" selected><?php echo $jabatan;?></option>
                          <option>--------------------------</option>
                          <?php
 
                    foreach($daftaruser as $hasiluser){ 
                          ?>
                          <option value="<?php echo $hasiluser->id_user ?>"> <?php echo $hasiluser->jabatan ?> </option>
                                <?php
                              }
                              ?>
                            </select>
                           </div>
                       </div>
                        <label for="lamp">Lampiran</label>
                       <div class="form-group">
                          <div class="form-line">
                           <input type="text" name="lampiran" class="form-control" value="<?php echo $lampiran;?>" placeholder="Lampiran" required>
                           </div>
                       </div>
	               	<label for="asal">Pengirim Surat</label>
	               	   <div class="form-group">
	                   	  <div class="form-line">
	                       <input type="text" name="asal_surat" value="<?php echo $asal_surat;?>" class="form-control" placeholder="Asal Surat" required>
	                       </div>
	                   </div>
	                   	<label for="nosurat">Nomor Surat</label>
	                   <div class="form-group">
	                   	  <div class="form-line">
	                       <input type="text" name="no_surat" class="form-control" value="<?php echo $no_surat;?>"placeholder="No Surat" required>
	                       </div>
	                   </div>
	                   <label for="tglsurat">Tanggal Surat</label>
					   <div class="form-group">
					   	   
					   	   <div class="form-line">
	                       <input type="text" name="tgl_surat" class="form-control" value="<?php echo $tgl_surat;?>" placeholder="Tanggal Surat" id="tgl_surat" required>
	                       </div>
	                   
	                   </div>
	                  <label for="tglterima">Tanggal Diterima</label>
	                   <div class="form-group">
	                   	   <div class="form-line">
	                       <input type="text" name="tgl_diterima" class="form-control" value="<?php echo $tgl_diterima;?>" id="tgl_diterima" placeholder="Tanggal diterima" required>
	                       </div>
	                   </div>
						<label for="isisurat">Ringkasan Isi Surat</label>				 
					   <div class="form-group">
					   	<div class="form-line">
	                       <textarea rows="1" class="form-control no-resize"  name="isi" placeholder="Masukkan Ringkasan isi Surat..." required><?php echo $isi;?></textarea>
	                   </div>
	                   </div>
	                   <label for="filescan">Upload Scan Surat</label>
                        <div class="form-group">
                        	<div class="form-line">
	                    <input type="file" name="filesurat" class="form-control"><?php echo $namafile;?>"
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
       <?php endforeach;?>
	 </form>

    
    <!--END MODAL EDIT BARANG-->
	
            <?php    
//load footer
$this->load->view('footer');
?>