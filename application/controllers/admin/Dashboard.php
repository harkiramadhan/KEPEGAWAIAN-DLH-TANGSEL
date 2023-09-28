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
            'pegawai' => $this->db->select('nama')->get('riwayat_data_utama')->num_rows()
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
            array_push($labels, $j->jabatan);

            $pegawai = $this->db->select('mp.nip')
                                ->from('riwayat_data_utama mp')
                                ->join('(SELECT nip, MAX(tanggal) AS max_tanggal, id FROM mutasi_jabatan GROUP BY nip) AS mutasi_terbaru', 'mp.nip = mutasi_terbaru.nip', 'left')
                                ->join('mutasi_jabatan mjp', 'mp.nip = mjp.nip AND mutasi_terbaru.max_tanggal = mjp.tanggal', 'left')
                                ->join('jabatan j', 'mjp.id_jabatan = j.id', 'left')
                                ->where('j.id', $j->id)->get()->num_rows();

            array_push($data, $pegawai);
        }

        $this->output->set_content_type('application/json')->set_output(json_encode([
            'labels' => $labels,
            'data' => $data
        ]));
        
    }
}