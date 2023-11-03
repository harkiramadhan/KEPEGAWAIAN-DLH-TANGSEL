<?php
class Dashboard extends CI_Controller{
    function __construct(){
        parent::__construct();

        if(!$this->session->userdata('is_admin')){
            $this->session->set_flashdata('error', "Silahkah Login Terlebih Dahulu");
            redirect('auth','refresh');
        }
    }

    function index(){
        $var = [
            'title' => 'Dashboard Admin - KEPEGAWAIAN DLH TANGSEL',
            'pages' => 'Dashboard',
            'pegawai' => $this->db->select('nama')->get('riwayat_data_utama')->num_rows(),
            'pegawai_aktif' => $this->db->select('id')->get_where('riwayat_data_utama', ['status' => 1])->num_rows(),
            'pegawai_nonaktif' => $this->db->select('id')->get_where('riwayat_data_utama', ['status !=' => 1])->num_rows(),
        ];

        $this->load->view('admin/layout/header', $var);
        $this->load->view('admin/dashboard', $var);
        $this->load->view('admin/layout/footer', $var);
    }

    function autoLogin(){
        redirect('https://presensitksdlh.prdlhtangsel.com/autologin.php?username=admin&password=4dm1n4j4');
    }

    function lineChart(){
        $jabatan = $this->db->get('jabatan');
        $labels = [];
        $data = [];
        foreach($jabatan->result() as $j){
            $pegawai = $this->db->select('mp.id')
                                ->from('riwayat_data_utama mp')
                                ->join('(SELECT nip, MAX(tanggal) AS max_tanggal, id, id_pegawai FROM mutasi_jabatan GROUP BY id_pegawai) AS mutasi_terbaru', 'mp.id = mutasi_terbaru.id_pegawai', 'left')
                                ->join('mutasi_jabatan mjp', 'mp.nip = mjp.nip AND mutasi_terbaru.max_tanggal = mjp.tanggal', 'left')
                                ->join('jabatan j', 'mjp.id_jabatan = j.id', 'left')
                                ->where('j.id', $j->id)->get()->num_rows();
            array_push($data, $pegawai);
            array_push($labels, $j->jabatan . " : " . $pegawai);
        }

        $this->output->set_content_type('application/json')->set_output(json_encode([
            'labels' => $labels,
            'data' => $data
        ]));
        
    }
}