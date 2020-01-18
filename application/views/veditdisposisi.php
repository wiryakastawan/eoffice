<?php 
//load header dan menu
$this->load->view('headermenu');?>
<div class="container-fluid">
            <div class="block-header">
            	   <!-- Basic Examples -->
            	    <?php if(isset($error)) { echo $error; }; ?>
            	     <?=$this->session->flashdata('pesan')?>

            <div class="row clearfix">
                <body>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-lg-5">
                	<?php 
                    
                    foreach($data_disposisi as $hasil)
                	{
                        
                		?>
                		
                        
                		<?php
                        $nosurat=$hasil->no_surat;
                		$filename=$hasil->file;
                        $extensi = pathinfo($filename, PATHINFO_EXTENSION);
                        if($extensi=="jpg"){
                		?>
                	                        <div id="aniimated-thumbnials" class="list-unstyled row clearfix">        
                                            <a href="<?=base_url()?>/uploads/surat/<?php echo $hasil->file ?>" data-sub-html="Tampilan Surat"><img src="<?=base_url()?>/uploads/surat/<?php echo $hasil->file ?>" height="1024" width="500" class="img-responsive thumbnail" align="center" alt="Klik Untuk Memperbesar"> 
                                            </a>
                                            <p align="center">Klik untuk Memperbesar Gambar</p>
                                            </div>
                        <?php}
                         else if($extensi=="jpeg"){
                          ?> 
                                            <div id="aniimated-thumbnials" class="list-unstyled row clearfix">        
                                            <a href="<?=base_url()?>/uploads/surat/<?php echo $hasil->file ?>" data-sub-html="Tampilan Surat"><img src="<?=base_url()?>/uploads/surat/<?php echo $hasil->file ?>" height="1024" width="500" class="img-responsive thumbnail" align="center" alt="Klik Untuk Memperbesar"> 
                                            </a>
                                            <p align="center">Klik untuk Memperbesar Gambar</p>
                                            </div>
                          <?php
                           }else if($extensi=="png"){
                                            ?>
                                            <div id="aniimated-thumbnials" class="list-unstyled row clearfix">        
                                            <a href="<?=base_url()?>/uploads/surat/<?php echo $hasil->file ?>" data-sub-html="Tampilan Surat"><img src="<?=base_url()?>/uploads/surat/<?php echo $hasil->file ?>" height="1024" width="500" class="img-responsive thumbnail" align="center" alt="Klik Untuk Memperbesar"> 
                                            </a>
                                            <p align="center">Klik untuk Memperbesar Gambar</p>
                                            </div>
                           <?php
                            } else if($extensi=="pdf"){
                            	     ?>
                            	     <embed src="<?=base_url()?>uploads/surat/<?php echo $hasil->file ?>" width="480" height="900"> </embed>
                            	     <p>Jika PDF tidak tampil kemungkinan anda menggunakan addon download manager,silakan nonaktifkan</p>

                            	    <?php
                            	}
                            	?>

                

                </div>
                 <script>
    $(function(){
    $("#tgl_disposisi").datepicker({
    container:'#arahdisposisi',	
    format:'yyyy/mm/dd'})
    .on('changeDate', function(ev){
    $(this).datepicker('hide');
    });
    });
    </script>
                <div class="col-md-5">
                	<div class="card">
                        <div class="header bg-red">
                            <h2>
                                Disposisi Surat Masuk<small>Disposisi untuk Pejabat dibawahnya</small>
                            </h2>
                            <ul class="header-dropdown m-r-0">
                                <li>
                                    <a href="javascript:void(0);">
                                        <i class="material-icons">info_outline</i>
                                    </a>
                                </li>
                              
                            </ul>
                        </div>
                        <div class="body">
                        	<form id="editdisposisi" action="<?=base_url()?>index.php/disposisi/update" method="post">
                            <input type="hidden" name="no_surat" value="<?php echo $nosurat ?>">
                           
                                
	 
                        	<label>Ditujukan Kepada Bidang/Sekretariat :</label>
                        	<p>
                        	<?php foreach($data_bidang as $hasilkabid)
                              	{
                              		
                		     ?>
                		    
                           <tr>
                           	<td>
                           	<div class="checkbox">
                                 <?php
                                    if($hasilkabid->id_bidang==$hasil->id_tujuankabid){
                                        $status="checked";
                                    }
                                    else
                                    {
                                        $status="";
                                    }
                                    ?>
               
                           	<input type="checkbox" class="filled-in chk-col-light-blue" id="kabid<?php echo $hasilkabid->id_bidang ?>" name="kabid[]" value="<?php echo $hasilkabid->id_bidang ?>" <?php echo $status ?> />
                            <label for="kabid<?php echo $hasilkabid->id_bidang ?>"><?php echo $hasilkabid->namabidang ?></label><br>
                             </div>
                            </td>
                           </tr> 
                           <tr><td></td></tr>
                           <tr><td></td></tr>
                           <tr><td></td></tr>
                                <?php
                            }
                            ?>
                            <label>__________________________________________________</label>
                            <p>
                            <label>Ditujukan Langsung Kepada Subbidang/Subbagian :</label>
                            <p><p>
                            <?php foreach($data_kasi as $hasilkasi)
                              	{
                              		
                		     ?>
                		     <tr>
                		     	<td>
                                    <?php
                                    if($hasilkasi->id_kasi==$hasil->id_tujuankasi){
                                        $status="checked";
                                    }
                                    else
                                    {
                                        $status="";
                                    }
                                    ?>
                                 <input type="checkbox" name="kasi[]" id="kasi<?php echo $hasilkasi->id_kasi ?>" value="<?php echo $hasilkasi->id_kasi ?>" class="filled-in chk-col-light-green" <?php echo $status ?>/>
                                <label for="kasi<?php echo $hasilkasi->id_kasi ?>">
                                    <?php echo $hasilkasi->nama_kasi ?>
                        
                                    </label><br>
                                </td>
                              </tr>      
                                <?php
                            }
                            ?>
                            <label>__________________________________________________</label>
                            <p>
   
                        <label for="tglsurat">Tanggal Disposisi</label>
					   <div class="form-group">
					   	   <?php
					   	   $tglnow=date('Y-m-d');
					   	   ?>
					   	   <div class="form-line" id="arahdisposisi">
	                       <input type="text" name="tgl_disposisi" class="form-control" placeholder="Tanggal Disposisi" id="tgl_disposisi" value="<?php echo $hasil->tgl_disposisi ?>" required>
	                       </div>
	                   
	                   </div>
                            <label for="isisurat">Instruksi</label>				 
					   <div class="form-group">
					   	<div class="form-line">
	                       <textarea rows="1" class="form-control no-resize" name="isi" placeholder="Masukkan Instruksi Disposisi..." required><?php echo $hasil->isi_disposisi ?></textarea>
	                   </div>
	                   </div>
                       <?php
                       $jamsekrg=date('H:i:s');
                       ?>
                       <input type="hidden" name="id_surat" value="<?php echo $hasil->id_surat?>">
                       <input type="hidden" name="jamdisposisi" value="<?php echo $jamsekrg ?>">

	                   <button type="submit" id="add-row" class="btn btn-success">Update</button>
                            </form>
                        </div>
                    </div>
                </div>

                    
            </div>
            
            <?php
            
        }

        ?>
        
        </div>
    </div>
</body>

    
	            <?php    
//load footer
$this->load->view('footer');
?>