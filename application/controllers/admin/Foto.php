<?php
class Foto extends CI_Controller{
    function __construct(){
        parent::__construct();

        if(!$this->session->userdata('is_admin')){
            $this->session->set_flashdata('error', "Silahkah Login Terlebih Dahulu");
            redirect('auth','refresh');
        }
    }
    
    function index(){
        $var = [
            'title' => 'Upload Foto Pegawai - KEPEGAWAIAN DLH TANGSEL',
            'pages' => 'Upload Foto Pegawai',
            'pegawai' => $this->db->get('riwayat_data_utama')
        ];

        $this->load->view('admin/layout/header', $var);
        $this->load->view('admin/foto', $var);
        $this->load->view('admin/layout/footer', $var);
    }

    function save(){
        $id = $this->input->post('id', TRUE);
        $cekData = $this->db->get_where('riwayat_data_utama', ['id' => $id])->row();
        if($cekData->FOTO){
            @unlink('./assets/doc/' . $cekData->FOTO);
        }

        $image = $this->input->post('image');
		$image = str_replace('data:image/jpeg;base64,', '', $image);
		$image = str_replace(' ', '+', $image);
		$imaged = base64_decode($image);
		$filename = 'image_'.time().'.png';
		file_put_contents(FCPATH.'/assets/doc/'.$filename,$imaged);
		$this->db->where('id', $id)->update('riwayat_data_utama', ['FOTO' => $filename]);
        
        ($this->db->affected_rows() > 0) ? $res = 1 : $res = 0;
		echo json_encode($res);
    }
}