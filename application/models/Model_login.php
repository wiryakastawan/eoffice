<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//model untu dasboard
//copyright 2019 by wirya

class Model_login extends CI_Model
{
    //fungsi cek session logged in
    function is_logged_in()
    {
        return $this->session->userdata('user_id');
    }

    //fungsi cek level
    function is_role()
    {
        return $this->session->userdata('role');
    }

    //fungsi check login
    function check_login($table, $field1, $field2)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($field1);
        $this->db->where($field2);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

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

         $hasil=$this->db->query("SELECT count(no_suratmasuk) as jml_suratmasuk, count(no_suratkeluar) as jml_suratkeluar, count(id_tujuan) as jml_disposisi FROM tbl_notifikasi WHERE iduser=$iduser");

            return $hasil->row();

    }


    //fungsi menampilkan instansi
     function show_instansi()
    {
        $hasil=$this->db->query("SELECT * FROM tbl_perangkat");

            return $hasil->row();
    }
}
