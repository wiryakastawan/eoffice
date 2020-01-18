<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_disposisi extends CI_model{

    public function show_all()
    {
    	// jika menggunakan datatables
    	//loading super cepat untk jutaan data
      //  $this->datatables->select('*');
       // $this->datatables->from('tbl_surat_masuk');
       // $this->datatables->add_column('view', '<a href="javascript:void(0);" class="edit_record btn btn-info btn-xs" data-nosurat="$1" data-asalsurat="$2" tgl_surat="$3" tgl_diterima="$4">Edit</a>  <a href="javascript:void(0);" class="hapus_record btn btn-danger btn-xs" data-kode="$1">Hapus</a>','barang_kode,barang_nama,barang_harga,kategori_id,kategori_nama');
       // return $this->datatables->generate();
      $user=$this->session->userdata("id_user");
      $this->db->select('*');
      $this->db->from('tbl_disposisi');
      $this->db->join('tbl_user','tbl_user.id_user=tbl_disposisi.id_user','left');
      $this->db->join('tbl_surat_masuk','tbl_surat_masuk.id_surat=tbl_disposisi.id_surat','left');
      $this->db->join('tbl_bidang','tbl_bidang.id_bidang=tbl_disposisi.id_tujuankabid','left');
      $this->db->join('tbl_kasi','tbl_kasi.id_kasi=tbl_disposisi.id_tujuankasi','left');
      $this->db->where('tbl_user.id_user',$user);
      $this->db->or_where('tbl_bidang.id_user',$user);
      $this->db->or_where('tbl_kasi.id_user',$user);
      
      $hasil=$this->db->get();
        return $hasil->result();


    }

    function didisposisikan($id_surat)
    {
      //$query=$this->db->query("SELECT * FROM tbl_disposisi JOIN tbl_surat_masuk ON tbl_disposisi.id_surat= tbl_surat_masuk.id_surat LEFT JOIN tbl_user ON tbl_surat_masuk.tujuan_user=tbl_user.id_user OR tbl_disposisi.id_tujuankabid = tbl_user.id_bidang OR tbl_disposisi.id_tujuankasi = tbl_user.id_kasi LEFT JOIN tbl_bidang on tbl_bidang.id_bidang=tbl_user.id_bidang LEFT JOIN tbl_kasi on tbl_kasi.id_kasi=tbl_user.id_kasi WHERE tbl_surat_masuk.id_surat ='$id_surat'");
     // $hasil=$this->db->get();
      $query=$this->db->query("SELECT * FROM tbl_surat_masuk where id_surat='$id_surat'");
        return $query->result();
    }
    
    function kepalabidang()
    {
      $this->db->select('*');
      $this->db->from('tbl_bidang');
    //  $this->db->join('tbl_user','tbl_user.jabatan=tbl_bidang.namabidang');
      $query=$this->db->get();
        return $query->result();
    }

    function kepalaseksi()
    {
      $this->db->select('*');
      $this->db->from('tbl_kasi');
    //  $this->db->join('tbl_user','tbl_user.jabatan=tbl_kasi.nama_kasi');
      $query=$this->db->get();
        return $query->result();
    }

    function notifikasi()
    {
        $id_user=$this->session->userdata('id_user');
        $query = $this->db->select("*")
                 ->from('tbl_notifikasi')
                 ->where('iduser',$id_user)
                 ->get();
        return $query->result();
    	
    }

    function editdisposisiku($id_disposisi)
    {
      $this->db->select('*');
      $this->db->from('tbl_disposisi');
      $this->db->join('tbl_user','tbl_user.id_user=tbl_disposisi.id_user','left');
      $this->db->join('tbl_surat_masuk','tbl_surat_masuk.id_surat=tbl_disposisi.id_surat','left');
      $this->db->join('tbl_bidang','tbl_bidang.id_bidang=tbl_disposisi.id_tujuankabid','left');
      $this->db->join('tbl_kasi','tbl_kasi.id_kasi=tbl_disposisi.id_tujuankasi','left');
      $this->db->where('tbl_disposisi.id_disposisi',$id_disposisi);
      $query=$this->db->get();
        return $query->result();
    }

	
}