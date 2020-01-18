<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('Model_profile');
        //cek session
       if($this->session->userdata('username')==""){
            redirect("login/");
       }
    }

    public function index()
    {
        $data = array(

            'title'     => 'Data Profile Pengguna',
            'data_pengguna' => $this->Model_profile->show_all(),
            'edit_user'=>$this->Model_profile->edit_user(),
            'data_bidang'=>$this->Model_profile->kabid(),
            'data_kasi'=>$this->Model_profile->kasi(),
            'data_kaban'=>$this->Model_profile->kaban(),

        );

        $this->load->view('vuser', $data);
       
    }

 
  function simpan(){ //function simpan data
  
    //upload photo
       $this->load->library('upload');
        
        $config['max_size']=2048;
        $config['allowed_types']="png|jpg|jpeg|gif";
        $config['remove_spaces']=TRUE;
        $config['overwrite']=TRUE;
        $config['upload_path']='./assets/images/';
        $config['file_name'] = 'Wiruser-'.substr(md5(rand()),0,10); 
       
        
        $this->load->library('upload',$config);
        $this->upload->initialize($config);

         if($this->upload->do_upload('fotopengguna'))
         {    
          $kunci=$this->input->post('password');

    $data=array(
      //'id_user' => $this->session->userdata("id_user"),
      'username'     => $this->input->post('username'),
      'password'     => md5($kunci),
      'email' => $this->input->post('email'),
      'nama'    => $this->input->post('nama'),
      'jabatan' => $this->input->post('jabatan'),
      'nip' => $this->input->post('nip'), 
      'role'=> $this->input->post('role'), 
      'foto' =>$this->upload->data('file_name')
    );
    $this->db->insert('tbl_user', $data);
    redirect('profile');
         }
      
    else{
                 $error=$this->upload->display_errors();
                 
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Terjadi Masalah-Pesan error: $error</div></div>");

                redirect('profile'); //jika gagal maka akan ditampilkan form upload
            }
     
    
  }

  function update(){ //function update data
    
    $id_user=$this->input->post('id_user');
    $namafile=$_FILES["fotopengguna"]['name'];
    //cek namafile apakah ada file yang diupload apa ngga
    //jika ga pakai nama file yg lama
    if(empty($namafile))
    {
      $kunci=$this->input->post('password');
      
    $data=array(
     'username'     => $this->input->post('username'),
      'password'     => md5($kunci),
      'email' => $this->input->post('email'),
      'nama'    => $this->input->post('nama'),
      'jabatan' => $this->input->post('jabatan'), // YG TERSIMPAN idNYA BUKAN NAMA JABATANYA KOREKSI,NYAMBUNG KE SURAT
      'nip' => $this->input->post('nip'), 
      'role'=> $this->input->post('role'), 
      'foto' =>$this->input->post('fotolama')
    );
      
    $this->db->where('id_user',$id_user);
    $this->db->update('tbl_user', $data);
    redirect('profile');
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
        $config['file_name'] = 'Wiruser-'.substr(md5(rand()),0,10); 
       
        
        $this->load->library('upload',$config);
        $this->upload->initialize($config);

         if($this->upload->do_upload('fotopengguna'))
         { 
         $kunci=$this->input->post('password');
        $data=array(
        'username'     => $this->input->post('username'),
      'email' => $this->input->post('email'),
      'password'=>md5($kunci),
      'nama'    => $this->input->post('nama'),
      'jabatan' => $this->input->post('jabatan'),
      'nip' => $this->input->post('nip'), 
      'role'=> $this->input->post('role'),  
      'foto' =>$this->upload->data('file_name')
    );
    $this->db->where('id_user',$id_user);
    $this->db->update('tbl_user', $data);
    redirect('profile');
        }
        else{
                 $error=$this->upload->display_errors();
                 
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Terjadi Masalah - Pesan error: $error</div></div>");

                redirect('profile'); //jika gagal maka akan ditampilkan form upload
            }
     
    }


  }

 

   function hapus($id_user){ 
   //function hapus data
    //cari dulu 
      
     $this->db->select('*');
      $this->db->from('tbl_user');
    
      $this->db->where('id_user',$id_user);
      $query = $this->db->get();
      $id_user=$query->row()->id_user;
      $namafile=$query->row()->foto;
  

      //hapus surat masuk
    $this->db->where('id_user',$id_user);
    $this->db->delete('tbl_user');

    //hapus file scan surat
    $file = FCPATH."assets/images/".$namafile;
    $delfile=unlink($file);  

    if($delfile){
    redirect('profile');
      }
      else{
         $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\"> Nilai Data Terhapus,namun file foto tidak terhapus</div></div>");

                redirect('profile'); //jika gagal maka akan ditampilkan form upload

      }
  }

  
}