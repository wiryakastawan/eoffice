<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//model untu dasboard
//copyright 2019 by wirya

class Model_dashboard extends CI_Model
{
   public function show_counter($iduser)
    {
       /* $iduser=$this->session->userdata("id_user");
        $this->db->select('*');
        $this->db->from('tbl_sett');
        $this->db->where($iduser);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }*/

        // $hasil=$this->db->query("SELECT * FROM tbl_sett WHERE id_user=$iduser");

          //  return $hasil->row();
         $hasil=$this->db->query("SELECT count(no_suratmasuk) as jml_suratmasuk, count(no_suratkeluar) as jml_suratkeluar, count(id_tujuan) as jml_disposisi FROM tbl_notifikasi WHERE iduser=$iduser AND status=1");

            return $hasil->row();

    }

    function counter_suratmasukop(){
       $hasil=$this->db->query("SELECT count(no_surat) as jml_suratmasuk FROM tbl_surat_masuk");

            return $hasil->row();
    }
    function counter_suratkeluarop(){
      $hasil=$this->db->query("SELECT count(no_surat_keluar) as jml_suratkeluar FROM tbl_surat_keluar");

            return $hasil->row();
    }
    function counter_disposisiop(){
      $hasil=$this->db->query("SELECT count(isi_disposisi) as jml_disposisi FROM tbl_disposisi");

            return $hasil->row();
    }

    public function show_notifikasi($iduser)
    {

      $this->db->select('*');
      $this->db->from('tbl_surat_masuk');
      $this->db->join('tbl_notifikasi','tbl_surat_masuk.no_surat=tbl_notifikasi.no_suratmasuk','left');
      $this->db->where('tbl_notifikasi.status',1);
      $this->db->where('tbl_notifikasi.iduser',$iduser);
      $query = $this->db->get();
      return $query->result();
     }      

   function show_disposisi()
   {
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
 

   
}
