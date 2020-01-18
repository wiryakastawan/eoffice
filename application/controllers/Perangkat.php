<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perangkat extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('Model_perangkat');
        //cek session
       if($this->session->userdata('username')==""){
            redirect("login/");
       }
    }

    public function index()
    {
        $data = array(

            'title'     => 'Data Perangkat Daerah',
            'data_perangkat' => $this->Model_perangkat->show_all(),
            'edit_perangkat'=>$this->Model_perangkat->edit_perangkat(),

        );

        $this->load->view('vperangkat', $data);
       
    }

  function update(){ //function update data
    
    $id_perangkat=$this->input->post('id_perangkat');
    $namafile=$_FILES["fotologo"]['name'];
    //cek namafile apakah ada file yang diupload apa ngga
    //jika ga pakai nama file yg lama
    //Memuat Library validasi form
        $this->load->library('form_validation');
        //Memuat file helper
        $this->load->helper('file');
    if(empty($namafile))
    {
      
    $data=array(
     'nama'     => $this->input->post('nama'),
      'unit_kerja'=> $this->input->post('unitkerja'),
      'email' => $this->input->post('email'),
      'alamat'    => $this->input->post('alamat'),
      'telp' => $this->input->post('telp'),
      'jabatan'=>$this->input->post('jabatan'),
      'logodepan' =>$this->input->post('logolama')
    );
      
    $this->db->where('id_perangkat',$id_perangkat);
    $this->db->update('tbl_perangkat', $data);
    redirect('perangkat');
    }
    else
    {
        //jika ada file foto baru perbaikan yg diupload lakukan upload ulang
         //upload photo
        $this->load->library('upload');
        $config['max_size']=2048;
        $config['allowed_types']="png|jpg|jpeg|gif";
        $config['remove_spaces']=TRUE;
        $config['overwrite']=TRUE;
        $config['upload_path']='./assets/images/';
        $config['file_name'] = 'Wirlogo-'.substr(md5(rand()),0,10); 
       
        
        $this->load->library('upload',$config);
        $this->upload->initialize($config);

         if($this->upload->do_upload('fotologo'))
         { 
        $data=array(
     'nama'     => $this->input->post('nama'),
      'unit_kerja'=> $this->input->post('unitkerja'),
      'email' => $this->input->post('email'),
      'alamat'    => $this->input->post('alamat'),
      'telp' => $this->input->post('telp'),
      'jabatan'=>$this->input->post('jabatan'),
      'logodepan' =>$this->upload->data('file_name')
    );
      
    $this->db->where('id_perangkat',$id_perangkat);
    $this->db->update('tbl_perangkat', $data);
    redirect('perangkat');
        }
        else{
                 $error=$this->upload->display_errors();
                 
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Terjadi Masalah - Pesan error: $error</div></div>");

                redirect('perangkat'); //jika gagal maka akan ditampilkan form upload
            }
     
    }


  }

 


  
}