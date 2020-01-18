<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('Model_dashboard');
         //$this->load->model('Model_disposisi');
        //cek session
       if($this->session->userdata('username')==""){
            redirect("login/");
       }
    }

    public function index()
    {
        $this->load->helper('url'); 
        					$iduser=$this->session->userdata("id_user");
                            $hasilnya=$this->Model_dashboard->show_counter($iduser);
                            $jmlsuratmasukop=$this->Model_dashboard->counter_suratmasukop();
                            $jml_suratkeluarop=$this->Model_dashboard->counter_suratkeluarop();
                             $jml_disposisiop=$this->Model_dashboard->counter_disposisiop();
         $data_dashboard=array(                   
                            'iduser' => $iduser,
                            'suratmasuk'=> $hasilnya->jml_suratmasuk,
                            'suratkeluar'=>$hasilnya->jml_suratkeluar, 
                            'disposisi'=>$hasilnya->jml_disposisi, 
                            'suratmasukop'=>$jmlsuratmasukop->jml_suratmasuk,
                            'suratkeluarop'=>$jml_suratkeluarop->jml_suratkeluar,
                            'disposisiop'=>$jml_disposisiop->jml_disposisi,
                            'notifikasi'=>$this->Model_dashboard->show_notifikasi($iduser),
                            'data_disposisi'=>$this->Model_dashboard->show_disposisi(),
                        );

         $this->load->view('dashboard',$data_dashboard);   
       
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }



    public function show_notifikasi()
    {

           $hasil=$this->db->query("SELECT * FROM tbl_notifikasi WHERE status=1");

            return $hasil->row();
     }      

    

}