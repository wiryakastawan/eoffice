<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_perangkat extends CI_model{

    public function show_all()
    {
    	// jika menggunakan datatables
    	//loading super cepat untk jutaan data
      //  $this->datatables->select('*');
       // $this->datatables->from('tbl_surat_masuk');
       // $this->datatables->add_column('view', '<a href="javascript:void(0);" class="edit_record btn btn-info btn-xs" data-nosurat="$1" data-asalsurat="$2" tgl_surat="$3" tgl_diterima="$4">Edit</a>  <a href="javascript:void(0);" class="hapus_record btn btn-danger btn-xs" data-kode="$1">Hapus</a>','barang_kode,barang_nama,barang_harga,kategori_id,kategori_nama');
       // return $this->datatables->generate();

    	$query = $this->db->select("*")
                 ->from('tbl_perangkat')
                 ->order_by('id_perangkat', 'ASC')
                 ->get();
        return $query->result();


    }
    function edit_perangkat(){
    $hasil=$this->db->query("SELECT * FROM tbl_perangkat");
    return $hasil;
  }

	
}