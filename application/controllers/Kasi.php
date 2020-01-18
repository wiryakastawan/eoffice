<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('Model_kasi');
        //cek session
       if($this->session->userdata('username')==""){
            redirect("login/");
       }
    }

    public function index()
    {
        $data = array(

            'title'     => 'Data Kepala Seksi',
            'data_kasi' => $this->Model_kasi->show_all(),
            'edit_kasi'=>$this->Model_kasi->edit_kasi(),
            'data_bidang'=>$this->Model_kasi->show_bidang(),
            'data_user' => $this->Model_kasi->pengguna(),


        );

        $this->load->view('vkasi', $data);
       
    }

 
  function simpan(){ //function simpan data
  
    $data=array(
      'id_bidang' =>  $this->input->post('namabidang'),
      'nama_kasi'     => $this->input->post('namakasi'),
      'nama_kepalaseksi' => $this->input->post('namapejabat'),
      'nip_seksi'    => $this->input->post('nip'),
      'pangkat'    => $this->input->post('pangkat'),
      'id_user'    => $this->input->post('pengguna'),
    );
    $this->db->insert('tbl_kasi', $data);
    redirect('kasi');
      
  }

  function update(){ //function update data
    
    $id_kasi=$this->input->post('id_kasi');
   
    $data=array(
     'id_bidang' =>  $this->input->post('namabidang'),
      'nama_kasi'     => $this->input->post('namakasi'),
      'nama_kepalaseksi' => $this->input->post('namapejabat'),
      'nip_seksi'    => $this->input->post('nip'),
      'pangkat'    => $this->input->post('pangkat'),
      'id_user'    => $this->input->post('pengguna'),
    );
      
    $this->db->where('id_kasi',$id_kasi);
    $this->db->update('tbl_kasi', $data);
    redirect('kasi');
   

  }

 

   function hapus($id_kasi)
   { 
   //function hapus data
 // $id_kode = $this->input->post('id_kodesurat');

      $this->db->where('id_kasi',$id_kasi);
    $this->db->delete('tbl_kasi');
        $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert"> Data Berhasil dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        //redirect
        redirect('kasi');
      }
    

  
}