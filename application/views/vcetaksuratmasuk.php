<html>
<head>
	<!--CETAK SURAT BY WIRYA KASTAWAN - WWW.PUTUWIRYA.COM -->
</head>
<BODY onload="window.print()">
	
 	<?php foreach($cetak_surat_masuk as $hasil){
 		?>
<?php
                                        $filename=$hasil->file;
                                        $extensi = pathinfo($filename, PATHINFO_EXTENSION);
                                        if($extensi=="jpg"){
                                            ?>
                                           <img src="<?=base_url()?>/uploads/surat/<?php echo $hasil->file ?>">
                  
                                           <?php}
                                            else if($extensi=="jpeg"){
                                                ?>
                                            <img src="<?=base_url()?>/uploads/surat/<?php echo $hasil->file ?>">
                                                <?php
                                        }else if($extensi=="png"){
                                            ?>
                                           <img src="<?=base_url()?>/uploads/surat/<?php echo $hasil->file ?>">
                                            <?php
                                        } else if($extensi=="pdf"){
                                            ?>
                                             <embed src="<?=base_url()?>uploads/surat/<?php echo $hasil->file ?>" width="1024" height="768"> </embed>
                                            <?php
                                        }
                                        ?>

                                        
                                            
                                            </div>
<?php
}
?>
</div>

</BODY>
</html>