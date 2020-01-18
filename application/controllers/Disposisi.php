<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disposisi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('Model_disposisi');
        //cek session
       if($this->session->userdata('username')==""){
            redirect("login/");
       }
    }

    public function index()
    {
        $data = array(

            'title'     => 'Data Disposisi',
            'data_disposisi' => $this->Model_disposisi->show_all(),

        );

        $this->load->view('vdisposisix', $data);
        
       
    }
    public function disposisikan($id_surat)
    {
        $id_surat = $this->uri->segment(3);

        $data = array(

            'title'     => 'Disposisi Surat',
            'data_disposisi' => $this->Model_disposisi->didisposisikan($id_surat),
            'data_kabid'=> $this->Model_disposisi->kepalabidang(),
            'data_kasi'=>$this->Model_disposisi->kepalaseksi(),
            'data_notif'=>$this->Model_disposisi->notifikasi(),

        );

        $this->load->view('vdisposisi', $data);
    }
    function simpan()
    {

    $checkboxkabid = $this->input->post('kabid');
    $checkboxkasi = $this->input->post('kasi');
    
    //$hasilcek=array();
    foreach ($checkboxkabid as $value) {
            $data=array(
                'id_user' => $this->session->userdata("id_user"),
                'tgl_disposisi' => $this->input->post('tgl_disposisi'),
                'isi_disposisi' =>$this->input->post('isi'),
                'id_tujuankabid' => $value,
                'id_surat' =>$this->input->post('id_surat'),
                'jam_disposisi' =>$this->input->post('jamdisposisi')
                 );
            $simpan=$this->db->insert('tbl_disposisi', $data);
            $nosurat=$this->input->post('no_surat');
            //cari id user dari tabel bidang
           $this->db->select('*');
           $this->db->from('tbl_bidang');
           $this->db->where('id_bidang',$value);
           $hasilbid = $this->db->get();
           $iduserbidang=$hasilbid->row()->id_user;
    
     $notif=array(
       
        'jam_disposisi'=>$this->input->post('jamdisposisi'),
        'status'=>0
    );

     $tujuan=array(

        'id_tujuan'=>$value,
        'pesan_disposisi'=>$this->input->post('isi'),
        'id_suratmasuk'=>$this->input->post('id_surat'),
        'iduser'=>$iduserbidang,
        'no_suratmasuk'=>$this->input->post('no_surat'),
        'jam_disposisi'=>$this->input->post('jamdisposisi'),
        'status'=>1

     );

     $update_telah_disposisi=array(
        'status'=>1

     );
        $this->db->where('no_suratmasuk',$nosurat);
        $this->db->update('tbl_notifikasi', $notif);
        $this->db->insert('tbl_notifikasi',$tujuan);
        $this->db->update('tbl_surat_masuk',$update_telah_disposisi);
    }
    if(!empty($checkboxkasi)){
        foreach ($checkboxkasi as $valuex) {
        $data=array(
                'id_user' => $this->session->userdata("id_user"),
                'tgl_disposisi' => $this->input->post('tgl_disposisi'),
                'isi_disposisi' =>$this->input->post('isi'),
                'id_tujuankasi' => $valuex,
                'id_surat' =>$this->input->post('id_surat'),
                'jam_disposisi' =>$this->input->post('jamdisposisi')
                 );
        $simpan=$this->db->insert('tbl_disposisi', $data);
         $nosurat=$this->input->post('no_surat');
         //cari id user dari tabel kasi
           $this->db->select('*');
           $this->db->from('tbl_kasi');
           $this->db->where('id_kasi',$valuex);
           $hasilkasi = $this->db->get();
           $iduserkasi=$hasilkasi->row()->id_user;

            $notif=array(
       
        'jam_disposisi'=>$this->input->post('jamdisposisi'),
        'status'=>0
    );
    $tujuan=array(

        'id_tujuan'=>$valuex,
        'pesan_disposisi'=>$this->input->post('isi'),
        'id_suratmasuk'=>$this->input->post('id_surat'),
         'no_suratmasuk'=>$this->input->post('no_surat'),
        'jam_disposisi'=>$this->input->post('jamdisposisi'),
        'iduser'=>$iduserkasi,
        'status'=>1

     );

      $update_telah_disposisi=array(
        'status'=>1

     );
        $this->db->where('no_suratmasuk',$nosurat);
        $this->db->update('tbl_notifikasi', $notif);
        $this->db->insert('tbl_notifikasi',$tujuan);
        $this->db->update('tbl_surat_masuk',$update_telah_disposisi);
         }

    }
       
    
    if($simpan){
        redirect('disposisi');
    }
    else{
        $error=show_error();
        $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Terjadi Masalah-Pesan error: $error</div></div>");
    }
   }

  function hapus($id_disposisi){ 
   //function hapus data
    //cari dulu 
      
     $this->db->select('*');
      $this->db->from('tbl_disposisi');
      $this->db->join('tbl_surat_masuk','tbl_surat_masuk.id_surat=tbl_disposisi.id_surat');
      $query = $this->db->get();
      $no_surat=$query->row()->no_surat;
  

      //hapus disposisi
    $this->db->where('id_disposisi',$id_disposisi);
    $this->db->delete('tbl_disposisi');

    //update notifikasi kembalikan status ke tampil di notif
    $notif=array(
        
        'status'=>1
    );
     $suratmasuk=array(
        
        'status'=>0
    );
     $this->db->where('no_suratmasuk',$no_surat);
    $this->db->update('tbl_notifikasi',$notif);
    $this->db->update('tbl_surat_masuk',$suratmasuk);
    redirect('disposisi');
     }

   function editdisposisi($id_disposisi){
     $id_disposisi = $this->uri->segment(3);


        $data = array(

            'title'     => 'Edit Data disposisi',
            'data_disposisi' => $this->Model_disposisi->editdisposisiku($id_disposisi),
            'data_bidang' => $this->Model_disposisi->kepalabidang(),
            'data_kasi' => $this->Model_disposisi->kepalaseksi(),

        );

        $this->load->view('veditdisposisi', $data);
   }  
}