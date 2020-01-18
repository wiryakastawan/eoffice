<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//eoffice Dibuat Oleh Wirya Kastawan 2019


class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load library form validasi
        $this->load->library('form_validation');
        //enkripsi
        $this->load->library('encryption');
        //load model admin
        $this->load->model('Model_login');

    }

    public function index()
    {
            $instansi=$this->Model_login->show_instansi();
            $data['unitkerja']=$instansi->unit_kerja;
            $data['namaopd']=$instansi->nama;


            

            if($this->Model_login->is_logged_in())
            {
                //jika memang session sudah terdaftar, maka redirect ke halaman dahsboard
                $iduser=$this->session->userdata('id_user');
                $jumlahdata=$this->Model_login->show_counter($iduser);
                redirect('dashboard',$jumlahdata);

            }else{

                //jika session belum terdaftar

                //set form validation
                $this->form_validation->set_rules('username', 'Username', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required');
              

                //set message form validation
                $this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');

                //cek validasi
                if ($this->form_validation->run() == TRUE) {

                //get data dari FORM
                $username = $this->input->post("username", TRUE);
                $password = MD5($this->input->post('password', TRUE));
               

                //checking data via model
                $checking = $this->Model_login->check_login('tbl_user', array('username' => $username), array('password' => $password));

                //jika ditemukan, maka create session
                if ($checking != FALSE) {
                    foreach ($checking as $apps) {

                        $session_data = array(
                            'id_user'   => $apps->id_user,
                            'username' => $apps->username,
                            'password' => $apps->password,
                            'nama' => $apps->nama,
                            'role' => $apps->role,
                            'email' =>$apps->email,
                            'id_perangkat' =>$apps->id_perangkat,
                            'id_bidang'=>$apps->id_bidang,
                            'id_kasi'=>$apps->id_kasi,
                            'foto'=>$apps->foto,
                            
                        );
                        //set session userdata
                        $this->session->set_userdata($session_data);

                        //redirect berdasarkan level user
                        if($this->session->userdata("username") <> ""){
                            $iduser=$this->session->userdata("id_user");
                            $hasilnya=$this->Model_login->show_counter($iduser);
                            $jumlahdata['iduser'] = $hasilnya->id_user;
                            $jumlahdata['suratmasuk']= $hasilnya->jml_suratmasuk;
                            $jumlahdata['suratkeluar']=$hasilnya->jml_suratkeluar; 
                            $jumlahdata['disposisi']=$hasilnya->jml_disposisi;  
                           redirect('dashboard',$jumlahdata);
                       }

                    }
                }else{

                   $data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
                       <div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> username atau password salah!</div></div>';
                 /*   $this->alert->set('alert-success', 'Tulis Pesannya disini untuk class bootstrap sukses');    // untuk membuat alert sukses

$this->alert->set('alert-danger', 'Tulis Pesannya disini untuk class bootstrap error');      // untuk membuat alert error

$this->alert->set('alert-warning', 'Tulis Pesannya disini untuk class bootstrap warning');   // untuk membuat alert warning

$this->alert->set('alert-primary', 'Tulis Pesannya disini untuk class bootstrap info');      // untuk membuat alert info
*/                
                 
                    $this->load->view('login', $data);
                }

            }else{

                $this->load->view('login',$data);
            }

        }

    }
}
