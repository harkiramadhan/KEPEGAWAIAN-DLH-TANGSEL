<?php
class Auth extends CI_Controller{
    function index(){
        $this->load->view('login');
    }

    function login(){
        $nip = $this->input->post('nip', TRUE);
        $password = $this->input->post('password', TRUE);

        if($nip == 'admin'){
            $cekAdmin = $this->db->get_where('users', ['username' => $nip, 'password' => md5($password)]);
            if($cekAdmin->num_rows() > 0){
                $this->session->set_userdata([
                    'is_login' => TRUE,
                    'is_admin' => TRUE,
                    'username' => $nip
                ]);

                redirect('admin/dashboard');
            }else{
                $this->session->set_flashdata('error', "User atau Password Tidak Di Sesuai");
                redirect($_SERVER['HTTP_REFERER']);
            }
        }else{
            $cekPegawai = $this->db->get_where('riwayat_data_utama', ['nip' => $nip, 'password' => md5($password)]);
            if($cekPegawai->num_rows() > 0){
                $this->session->set_userdata([
                    'is_login' => TRUE,
                    'username' => $cekPegawai->row()->nama,
                    'nip' => $cekPegawai->row()->nip
                ]);

                redirect('dashboard','refresh');
            }else{
                $this->session->set_flashdata('error', "User atau Password Tidak Di Sesuai");
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
    }

    function logout(){
        session_destroy();
        redirect('');
    }
}