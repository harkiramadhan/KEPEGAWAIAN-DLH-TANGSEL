<?php
class Kepegawaian extends CI_Controller{
    function __construct(){
        parent::__construct();

        if(!$this->session->userdata('is_admin')){
            $this->session->set_flashdata('error', "Silahkah Login Terlebih Dahulu");
            redirect('auth','refresh');
        }
    }

    function index(){
        $var = [
            'title' => 'Kepegawaian - KEPEGAWAIAN DLH TANGSEL',
            'pages' => 'Daftar Pegawai',
            'pegawai' => $this->db->get('riwayat_data_utama')
        ];

        $this->load->view('admin/layout/header', $var);
        $this->load->view('admin/kepegawaian', $var);
        $this->load->view('admin/layout/footer', $var);
    }
}