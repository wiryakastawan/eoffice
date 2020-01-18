<?php
//LOG Setiap klik yang dilakuan user
//by wirya kastawan

//$refferer = $_SERVER['HTTP_REFERER']?$_SERVER['HTTP_REFERER']:'No Refferer';
//$ip = $_SERVER['REMOTE_ADDR'];
//$tanggal = date('Y-m-d H:i:s');
//$data = $tanggal." - ".$ip." - ".$refferer."\r\n";
//file_put_contents('log.txt', $data, FILE_APPEND);

//definisikan nama file log, berubah tiap bulannya
$_logfilename = base_url()."/assets/log/log_".date("Y-m"); //nama log: log_2011-02
 
// jika file log belum ada, buat dulu
if(!file_exists($_logfilename)){
    $_logfilehandler = fopen($_logfilename,'w'); #buat file dengan akses tulis penuh
    fwrite($_logfilehandler, "/* File log untuk eoffice by wirya */\n"); #tulis header untuk file log, jika perlu
    fclose($_logfilehandler);
}else{
    $_logfilehandler = fopen($_logfilename,'a'); #akses file dengan modus buka/tulis
}
 
// misalnya untuk aksi A
fwrite($_logfilehandler,'User X melakukan aksi A');
fclose($_logfilehandler);

?>