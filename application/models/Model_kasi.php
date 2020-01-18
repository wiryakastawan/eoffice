<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_kasi extends CI_model{

    public function show_all()
    {
    	// jika menggunakan datatables
    	//loading super cepat untk jutaan data
      //  $this->datatables->select('*');
       // $this->datatables->from('tbl_surat_masuk');
       // $this->datatables->add_column('view', '<a href="javascript:void(0);" class="edit_record btn btn-info btn-xs" data-nosurat="$1" data-asalsurat="$2" tgl_surat="$3" tgl_diterima="$4">Edit</a>  <a href="javascript:void(0);" class="hapus_record btn btn-danger btn-xs" data-kode="$1">Hapus</a>','barang_kode,barang_nama,barang_harga,kategori_id,kategori_nama');
       // return $this->datatables->generate();

      $this->db->select('*');
      $this->db->from('tbl_kasi');
      $this->db->join('tbl_bidang','tbl_bidang.id_bidang=tbl_kasi.id_bidang');
      $query = $this->db->get();
        return $query->result();


    }
    function edit_kasi(){
    $hasil=$this->db->query("SELECT * FROM tbl_kasi");
    return $hasil;
  }

   function show_bidang(){
    $this->db->select('*');
      $this->db->from('tbl_kasi');
      $this->db->join('tbl_bidang','tbl_bidang.id_bidang=tbl_kasi.id_bidang');
      $this->db->group_by('namabidang');
      $query = $this->db->get();
        return $query->result();
  }
  function cari_bidang($id_bidang){
    $hasilbid=$this->db->query("SELECT * FROM tbl_bidang where id_bidang='$id_bidang'");
    return $hasilbid;
  }

 function pengguna(){
      $this->db->select('*');
      $this->db->from('tbl_user');
      $this->db->where('role',4);
      $hasil=$this->db->get();
    return $hasil->result();
  }
	
}