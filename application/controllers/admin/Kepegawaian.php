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

    function detail($nip){
        $pegawai = $this->db->get_where('riwayat_data_utama', ['nip' => $nip])->row();
        $var = [
            'title' => 'Detail Kepegawaian - KEPEGAWAIAN DLH TANGSEL',
            'pages' => 'Detail Pegawai - ' . $pegawai->nama,
            'pegawai' => $pegawai
        ];

        $this->load->view('admin/layout/header', $var);
        $this->load->view('admin/detail-kepegawaian', $var);
        $this->load->view('admin/layout/footer', $var);
    }
}