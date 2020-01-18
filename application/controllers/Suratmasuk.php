<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suratmasuk extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('Model_suratmasuk');
        //cek session
       if($this->session->userdata('username')==""){
            redirect("login/");
       }
    }

    public function index()
    {
        $data = array(

            'title'     => 'Data Surat Masuk',
            'data_surat_masuk' => $this->Model_suratmasuk->show_all(),
            'edit_surat'=>$this->Model_suratmasuk->edit_surat(),
            'kode_surat'=>$this->Model_suratmasuk->show_kode(),
            'daftaruser'=>$this->Model_suratmasuk->show_user(),

        );

        $this->load->view('vsuratmasuk', $data);
       
    }

  

  function simpan(){ //function simpan data
  
    //upload photo
       $this->load->library('upload');
        
        $config['max_size']=2048;
        $config['allowed_types']="png|jpg|jpeg|pdf";
        $config['remove_spaces']=TRUE;
        $config['overwrite']=TRUE;
        $config['upload_path']='./uploads/surat/';
        $config['file_name'] = 'suratwir-'.date('ymd').'-'.substr(md5(rand()),0,10); 
       
        
        $this->load->library('upload',$config);
        $this->upload->initialize($config);

         if($this->upload->do_upload('filesurat'))
         {    

    $data=array(
      'id_user' => $this->session->userdata("id_user"),
      'sifat'=> $this->input->post("sifat"),
      'no_surat'     => $this->input->post('no_surat'),
      'asal_surat'     => $this->input->post('asal_surat'),
      'kode'     => $this->input->post('kodesurat'),
      'tujuan_user'     => $this->input->post('tujuan'),
      'lampiran'     => $this->input->post('lampiran'),
      'isi'    => $this->input->post('isi'),
      'tgl_diterima' => $this->input->post('tgl_diterima'),
      'tgl_surat' => $this->input->post('tgl_surat'), 
      'file' =>$this->upload->data('file_name')
    );
    $this->db->insert('tbl_surat_masuk', $data);

    //tambahka notifikasi dengan status 1
    $jaminput=date("H:i:s");
    $notif=array(
        'no_suratmasuk' =>$this->input->post('no_surat'),
        'jam_suratmasuk'=>$jaminput,
        'iduser'=>$this->input->post('tujuan'),
        'status'=>1
    );
    
    $this->db->insert('tbl_notifikasi', $notif);
    redirect('suratmasuk');
         }
      
    else{
                 $error=$this->upload->display_errors();
                 
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Terjadi Masalah-Pesan error: $error</div></div>");

                redirect('suratmasuk'); //jika gagal maka akan ditampilkan form upload
            }
     
    
  }

  function update(){ //function update data
    $this->load->library('upload');
    $id_surat=$this->input->post('idsurat');
    $namafile = $_FILES["filesurat"]['name'];
    //$namafile=$this->upload->data('file_name');
    //cek namafile apakah ada file yang diupload apa ngga
    //jika ga pakai nama file yg lama
    if($namafile=="")
    {
    $data=array(
     'no_surat' =>  $this->input->post('no_surat'),  
     'asal_surat'     => $this->input->post('asal_surat'),
     'sifat'=> $this->input->post("sifat"),
      'isi'    => $this->input->post('isi'),
      'kode'     => $this->input->post('kodesurat'),
      'lampiran'     => $this->input->post('lampiran'),
      'tujuan_user'     => $this->input->post('tujuan'),
      'tgl_diterima' => $this->input->post('tgl_diterima'),
      'tgl_surat' => $this->input->post('tgl_surat'),
      'file' => $this->input->post('namafilenya')
    );
    $this->db->where('id_surat',$id_surat);
    $this->db->update('tbl_surat_masuk', $data);
    redirect('suratmasuk');
    }
    else
    {
        //jika ada file surat baru perbaikan yg diupload lakukan upload ulang
         //upload photo
        $filelama=$this->input->post('namafilenya');
        $filehapus = FCPATH."uploads/surat/".$filelama;
        $delfile=unlink($filehapus);  
        $config['max_size']=2048;
        $config['allowed_types']="png|jpg|jpeg|pdf";
        $config['remove_spaces']=TRUE;
        $config['overwrite']=TRUE;
        $config['upload_path']='./uploads/surat/';
        $config['file_name'] = 'suratwir-'.date('ymd').'-'.substr(md5(rand()),0,10); 
       
        
        $this->load->library('upload',$config);
        $this->upload->initialize($config);

         if($this->upload->do_upload('filesurat'))
         {    
            $data=array(
      'id_user' => $this->session->userdata("id_user"),
      'sifat'=> $this->input->post("sifat"),
      'no_surat'     => $this->input->post('no_surat'),
      'kode'     => $this->input->post('kodesurat'),
      'asal_surat'     => $this->input->post('asal_surat'),
      'tujuan_user'     => $this->input->post('tujuan'),
      'isi'    => $this->input->post('isi'),
      'tgl_diterima' => $this->input->post('tgl_diterima'),
      'tgl_surat' => $this->input->post('tgl_surat'), 
      'file' =>$this->upload->data('file_name')
    );
            $this->db->where('id_surat',$id_surat);
    $this->db->update('tbl_surat_masuk', $data);
    redirect('suratmasuk');
        }
        else{
                 $error=$this->upload->display_errors();
                 
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Terjadi Masalah - Pesan error: $error</div></div>");

                redirect('suratmasuk'); //jika gagal maka akan ditampilkan form upload
            }
     
    }


  }

  function cetakimage($id_surat)
  {
    $data = array(

            'title'     => 'Cetak Surat Masuk',
            'cetak_surat_masuk' => $this->Model_suratmasuk->cetaksurat($id_surat),

        );
   
    
    $this->load->view('vcetaksuratmasuk',$data);
  }


   function hapus($id_surat){ 
   //function hapus data
    //cari dulu 
      
     $this->db->select('*');
      $this->db->from('tbl_surat_masuk');
      $this->db->join('tbl_notifikasi','tbl_surat_masuk.no_surat=tbl_notifikasi.no_suratmasuk');
      $this->db->where('tbl_surat_masuk.id_surat',$id_surat);
      $query = $this->db->get();
      $no_surat=$query->row()->no_surat;
      $namafile=$query->row()->file;
  

      //hapus surat masuk
    $this->db->where('id_surat',$id_surat);
    $this->db->delete('tbl_surat_masuk');

    //hapus notifikasi
     $this->db->where('no_suratmasuk',$no_surat);
    $this->db->delete('tbl_notifikasi');

    //hapus file scan surat
    $file = FCPATH."uploads/surat/".$namafile;
    $delfile=unlink($file);  

    if($delfile){
    redirect('suratmasuk');
      }
      else{
         $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\"> Nilai Data Terhapus,namun file surat tidak terhapus</div></div>");

                redirect('suratmasuk'); //jika gagal maka akan ditampilkan form upload

      }
  }

  
}