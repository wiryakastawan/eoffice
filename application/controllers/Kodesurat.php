<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kodesurat extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('Model_kodesurat');
        //cek session
       if($this->session->userdata('username')==""){
            redirect("login/");
       }
    }

    public function index()
    {
        $data = array(

            'title'     => 'Data Kode Surat',
            'data_kodesurat' => $this->Model_kodesurat->show_all(),
            'edit_kodesurat'=>$this->Model_kodesurat->edit_kodesurat(),

        );

        $this->load->view('vkodesurat', $data);
       
    }

 
  function simpan(){ //function simpan data
  
    $data=array(
      
      'kode'     => $this->input->post('kodesurat'),
      'namakode' => $this->input->post('nama'),
      'uraian'    => $this->input->post('uraian'),
    );
    $this->db->insert('tbl_kode_surat', $data);
    redirect('kodesurat');
      
  }

  function update(){ //function update data
    
    $id_kodesurat=$this->input->post('id_kodesurat');
   
    $data=array(
     'kode'     => $this->input->post('kodesurat'),
      'namakode' => $this->input->post('nama'),
      'uraian'    => $this->input->post('uraian'),
    );
      
    $this->db->where('id_kode',$id_kodesurat);
    $this->db->update('tbl_kode_surat', $data);
    redirect('kodesurat');
   

  }

 

   function hapus($id_kodesurat)
   { 
   //function hapus data
 // $id_kode = $this->input->post('id_kodesurat');

      $this->db->where('id_kode',$id_kodesurat);
    $this->db->delete('tbl_kode_surat');
        $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert"> Data Berhasil dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        //redirect
        redirect('kodesurat');
      }
    

  
}