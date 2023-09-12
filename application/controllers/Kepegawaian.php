<?php
class Kepegawaian extends CI_Controller{
    function __construct(){
        parent::__construct();

        if(!$this->session->userdata('is_login')){
            $this->session->set_flashdata('error', "Silahkah Login Terlebih Dahulu");
            redirect('auth','refresh');
        }
    }

    function index(){
        $var = [
            'title' => 'Kepegawaian - KEPEGAWAIAN DLH TANGSEL',
            'pages' => 'Data Pegawai',
            'pegawai' => $this->db->get('riwayat_data_utama')
        ];

        $this->load->view('layout/header', $var);
        $this->load->view('kepegawaian', $var);
        $this->load->view('layout/footer', $var);
    }
}