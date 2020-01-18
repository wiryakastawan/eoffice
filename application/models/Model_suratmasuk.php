<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_suratmasuk extends CI_model{

    public function show_all()
    {
    	// jika menggunakan datatables
    	//loading super cepat untk jutaan data
      //  $this->datatables->select('*');
       // $this->datatables->from('tbl_surat_masuk');
       // $this->datatables->add_column('view', '<a href="javascript:void(0);" class="edit_record btn btn-info btn-xs" data-nosurat="$1" data-asalsurat="$2" tgl_surat="$3" tgl_diterima="$4">Edit</a>  <a href="javascript:void(0);" class="hapus_record btn btn-danger btn-xs" data-kode="$1">Hapus</a>','barang_kode,barang_nama,barang_harga,kategori_id,kategori_nama');
       // return $this->datatables->generate();

    	$this->db->select("*");
      $this->db->from('tbl_surat_masuk');
      //$this->db->join('tbl_disposisi','tbl_disposisi.id_surat=tbl_surat_masuk.id_surat','right');
      //$this->db->join('tbl_user','tbl_user.id_user=tbl_surat_masuk.id_user','left');
      $query=$this->db->get();
        return $query->result();


    }
    public function show_kode()
    {
      
      $query = $this->db->select("*")
                 ->from('tbl_kode_surat')
                 ->order_by('kode', 'DESC')
                 ->get();
        return $query->result();


    }
     public function show_user()
    {
      
      $query = $this->db->select("*")
                 ->from('tbl_user')
                 ->where('role', 2)
                 ->get();
        return $query->result();


    }

function edit_surat(){
		//$hasil=$this->db->query("SELECT * FROM tbl_surat_masuk");
		//return $hasil;
      $this->db->select("*");
      $this->db->from('tbl_surat_masuk');
      $this->db->join('tbl_kode_surat','tbl_kode_surat.kode=tbl_surat_masuk.kode');
      $this->db->join('tbl_user','tbl_user.id_user=tbl_surat_masuk.tujuan_user');
      $hasil=$this->db->get();
      return $hasil;

	}
function cetaksurat($id_surat)
{
   $this->db->select('*');
      $this->db->from('tbl_surat_masuk');
      $this->db->where('id_surat',$id_surat);
      $query = $this->db->get();
      return $query->result();
}
	
function cekdisposisi(){
    $this->db->select("*");
      $this->db->from('tbl_disposisi');
}
}