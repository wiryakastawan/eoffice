<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bidang extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('Model_bidang');
        //cek session
       if($this->session->userdata('username')==""){
            redirect("login/");
       }
    }

    public function index()
    {
        $data = array(

            'title'     => 'Data Pejabat Eselon III',
            'data_bidang' => $this->Model_bidang->show_all(),
            'edit_bidang'=>$this->Model_bidang->edit_bidang(),
            'data_user' => $this->Model_bidang->pengguna(),

        );

        $this->load->view('vkabid', $data);
       
    }

 
  function simpan(){ //function simpan data
  
    $data=array(
      
      'namabidang'     => $this->input->post('namabidang'),
      'nama_kepala' => $this->input->post('namapejabat'),
      'nip'    => $this->input->post('nip'),
      'pangkat'=>$this->input->post('pangkat'),
      'id_user'=>$this->input->post('pengguna'),
    );
    $this->db->insert('tbl_bidang', $data);
    redirect('bidang');
      
  }

  function update(){ //function update data
    
    $id_bidang=$this->input->post('id_bidang');
   
    $data=array(
     'namabidang'     => $this->input->post('namabidang'),
      'nama_kepala' => $this->input->post('namapejabat'),
      'nip'    => $this->input->post('nip'),
      'pangkat'    => $this->input->post('pangkat'),
      'id_user'    => $this->input->post('pengguna'),
    );
      
    $this->db->where('id_bidang',$id_bidang);
    $this->db->update('tbl_bidang', $data);
    redirect('bidang');
   

  }

 

   function hapus($id_bidang)
   { 
   //function hapus data
 // $id_kode = $this->input->post('id_kodesurat');

      $this->db->where('id_bidang',$id_bidang);
    $this->db->delete('tbl_bidang');
        $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert"> Data Berhasil dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        //redirect
        redirect('bidang');
      }
    

  
}