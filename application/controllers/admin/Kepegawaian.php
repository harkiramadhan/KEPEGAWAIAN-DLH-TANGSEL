<?php

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Kepegawaian extends CI_Controller{
    function __construct(){
        parent::__construct();

        if(!$this->session->userdata('is_admin')){
            $this->session->set_flashdata('error', "Silahkah Login Terlebih Dahulu");
            redirect('auth','refresh');
        }
    }

    function index(){
        $pegawai = $this->db->select('mp.*, j.jabatan, mjp.HONOR AS honor_pg, rp.jenjang, rp.jurusan')
                            ->from('riwayat_data_utama mp')
                            ->join('(SELECT id_pegawai, MAX(tanggal) AS max_tanggal, id FROM mutasi_jabatan GROUP BY id_pegawai) AS mutasi_terbaru', 'mp.id = mutasi_terbaru.id_pegawai', 'left')
                            ->join('(SELECT id_pegawai, MAX(id) AS max_id, id, jenjang, jurusan FROM riwayat_pendidikan GROUP BY id_pegawai) AS mutasi_terbaru2', 'mp.id = mutasi_terbaru2.id_pegawai', 'left')
                            ->join('mutasi_jabatan mjp', 'mp.id = mjp.id_pegawai AND mutasi_terbaru.max_tanggal = mjp.tanggal', 'left')
                            ->join('riwayat_pendidikan rp', 'mp.id = rp.id_pegawai AND mutasi_terbaru2.max_id = rp.id', 'left')
                            ->join('jabatan j', 'mjp.id_jabatan = j.id', 'left')->get();
        $var = [
            'title' => 'Kepegawaian - KEPEGAWAIAN DLH TANGSEL',
            'pages' => 'Daftar Pegawai',
            'pegawai' => $pegawai
        ];
        
        $this->load->view('admin/layout/header', $var);
        $this->load->view('admin/kepegawaian', $var);
        $this->load->view('admin/layout/footer', $var);
    }

    function detail($id){
        $pegawai = $this->db->get_where('riwayat_data_utama', ['id' => $id])->row();
        $riwayat = $this->db->select('mj.*, j.jabatan')
                            ->from('mutasi_jabatan mj')
                            ->join('jabatan j', 'mj.id_jabatan = j.id')
                            ->where(['mj.id_pegawai' => $id])->order_by('mj.tanggal', "DESC")->get();
        $var = [
            'title' => 'Detail Kepegawaian - KEPEGAWAIAN DLH TANGSEL',
            'pages' => 'Detail Pegawai - ' . $pegawai->nama,
            'pegawai' => $pegawai,
            'jabatan' => $this->db->get('jabatan'),
            'riwayat' => $riwayat,
            'pendidikan' => $this->db->get_where('riwayat_pendidikan', ['id_pegawai' => $id])
        ];

        $this->load->view('admin/layout/header', $var);
        $this->load->view('admin/detail-kepegawaian', $var);
        $this->load->view('admin/layout/footer', $var);
    }

    function tambah(){
        $var = [
            'title' => 'Tambah Pegawai - KEPEGAWAIAN DLH TANGSEL',
            'pages' => 'TAMBAH PEGAWAI',
        ];

        $this->load->view('admin/layout/header', $var);
        $this->load->view('admin/tambah-kepegawaian', $var);
        $this->load->view('admin/layout/footer', $var);
    }

    function create(){
        $cekNip = $this->db->get_where('riwayat_data_utama', ['nip' => $this->input->post('nip', TRUE)]);
        if($cekNip->num_rows() > 0){
            $this->session->set_flashdata('error', 'NIP Sudah Tersedia');
            $this->session->set_flashdata('error_nip', TRUE);
            $this->session->set_flashdata([
                'nip' => $this->input->post('nip', TRUE),
                'nama' => $this->input->post('nama', TRUE),
                'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
                'kd_lokasi_lahir' => $this->input->post('kd_lokasi_lahir', TRUE),
                'tgl_lahir1' => $this->input->post('tgl_lahir1', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
                'email' => $this->input->post('email', TRUE),
                'JENJANG' => $this->input->post('JENJANG', TRUE),
                'JURUSAN' => $this->input->post('JURUSAN', TRUE),
                'NOKTP' => $this->input->post('NOKTP', TRUE),
                'NOREK' => $this->input->post('NOREK', TRUE),
                'NOBPJS' => $this->input->post('NOBPJS', TRUE),
                'NOBPJSNAKER' => $this->input->post('NOBPJSNAKER', TRUE),
                'NPWP' => $this->input->post('NPWP', TRUE),
            ]);
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            $this->load->library('upload', [
                'upload_path' => './assets/doc/',
                'allowed_types' => 'png|jpg|jpeg|pdf',
                'encrypt_name' => TRUE
            ]);
    
            /* Upload DOC_KTP */
            if($this->upload->do_upload('DOC_KTP')){
                $img = $this->upload->data();
                $DOC_KTP = $img['file_name'];
            }else{
                $DOC_KTP = '';
            }
            
            /* Upload DOC_REK */
            if($this->upload->do_upload('DOC_REK')){
                $img = $this->upload->data();
                $DOC_REK = $img['file_name'];
            }else{
                $DOC_REK = '';
            }
    
            /* Upload DOC_BPJS */
            if($this->upload->do_upload('DOC_BPJS')){
                $img = $this->upload->data();
                $DOC_BPJS = $img['file_name'];
            }else{
                $DOC_BPJS = '';
            }
    
            /* Upload DOC_BPJSNAKER */
            if($this->upload->do_upload('DOC_BPJSNAKER')){
                $img = $this->upload->data();
                $DOC_BPJSNAKER = $img['file_name'];
            }else{
                $DOC_BPJSNAKER = '';
            }
    
            /* Upload DOC_NPWP */
            if($this->upload->do_upload('DOC_NPWP')){
                $img = $this->upload->data();
                $DOC_NPWP = $img['file_name'];
            }else{
                $DOC_NPWP = '';
            }
    
            /* Upload DOC_SK */
            if($this->upload->do_upload('DOC_SK')){
                $img = $this->upload->data();
                $DOC_SK = $img['file_name'];
            }else{
                $DOC_SK = '';
            }
    
            /* Upload DOC_HONOR */
            if($this->upload->do_upload('DOC_HONOR')){
                $img = $this->upload->data();
                $DOC_HONOR = $img['file_name'];
            }else{
                $DOC_HONOR = '';
            }
    
            /* Upload DOC_IJASAH */
            if($this->upload->do_upload('DOC_IJASAH')){
                $img = $this->upload->data();
                $DOC_IJASAH = $img['file_name'];
            }else{
                $DOC_IJASAH = '';
            }
    
            /* Upload FOTO */
            if($this->upload->do_upload('FOTO')){
                $img = $this->upload->data();
                $FOTO = $img['file_name'];
            }else{
                $FOTO = '';
            }
    
    
            $this->db->insert('riwayat_data_utama', [
                'nip' => $this->input->post('nip', TRUE),
                'nama' => $this->input->post('nama', TRUE),
                'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
                'kd_lokasi_lahir' => $this->input->post('kd_lokasi_lahir', TRUE),
                'tgl_lahir1' => $this->input->post('tgl_lahir1', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
                'email' => $this->input->post('email', TRUE),
                'JENJANG' => $this->input->post('JENJANG', TRUE),
                'JURUSAN' => $this->input->post('JURUSAN', TRUE),
                'NOKTP' => $this->input->post('NOKTP', TRUE),
                'NOREK' => $this->input->post('NOREK', TRUE),
                'NOBPJS' => $this->input->post('NOBPJS', TRUE),
                'NOBPJSNAKER' => $this->input->post('NOBPJSNAKER', TRUE),
                'NPWP' => $this->input->post('NPWP', TRUE),
                'DOC_KTP' => $DOC_KTP,
                'DOC_REK' => $DOC_REK,
                'DOC_BPJS' => $DOC_BPJS,
                'DOC_BPJSNAKER' => $DOC_BPJSNAKER,
                'DOC_NPWP' => $DOC_NPWP,
                'DOC_SK' => $DOC_SK,
                'DOC_HONOR' => $DOC_HONOR,
                'DOC_IJASAH' => $DOC_IJASAH,
                'FOTO' => $FOTO,
            ]);
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('sukses', "Data Berhasil Di Tambahkan");
            }else{
                $this->session->set_flashdata('error', "Data Gagal Di Tambahkan");
            }
    
            redirect('admin/kepegawaian');
        }

    }

    function update($id){
        $pegawai = $this->db->get_where('riwayat_data_utama', ['id' => $id])->row();

        $this->load->library('upload', [
            'upload_path' => './assets/doc/',
            'allowed_types' => 'png|jpg|jpeg|pdf',
            'encrypt_name' => TRUE
        ]);

        /* Upload DOC_KTP */
        if($this->upload->do_upload('DOC_KTP')){
            if($pegawai->DOC_KTP){
                @unlink('./assets/doc/' . $pegawai->DOC_KTP);
            }
            $img = $this->upload->data();
            $DOC_KTP = $img['file_name'];
        }else{
            $DOC_KTP = $pegawai->DOC_KTP;
        }
        
        /* Upload DOC_REK */
        if($this->upload->do_upload('DOC_REK')){
            if($pegawai->DOC_REK){
                @unlink('./assets/doc/' . $pegawai->DOC_REK);
            }
            $img = $this->upload->data();
            $DOC_REK = $img['file_name'];
        }else{
            $DOC_REK = $pegawai->DOC_REK;
        }

        /* Upload DOC_BPJS */
        if($this->upload->do_upload('DOC_BPJS')){
            if($pegawai->DOC_BPJS){
                @unlink('./assets/doc/' . $pegawai->DOC_BPJS);
            }
            $img = $this->upload->data();
            $DOC_BPJS = $img['file_name'];
        }else{
            $DOC_BPJS = $pegawai->DOC_BPJS;
        }

        /* Upload DOC_BPJSNAKER */
        if($this->upload->do_upload('DOC_BPJSNAKER')){
            if($pegawai->DOC_BPJSNAKER){
                @unlink('./assets/doc/' . $pegawai->DOC_BPJSNAKER);
            }
            $img = $this->upload->data();
            $DOC_BPJSNAKER = $img['file_name'];
        }else{
            $DOC_BPJSNAKER = $pegawai->DOC_BPJSNAKER;
        }

        /* Upload DOC_NPWP */
        if($this->upload->do_upload('DOC_NPWP')){
            if($pegawai->DOC_NPWP){
                @unlink('./assets/doc/' . $pegawai->DOC_NPWP);
            }
            $img = $this->upload->data();
            $DOC_NPWP = $img['file_name'];
        }else{
            $DOC_NPWP = $pegawai->DOC_NPWP;
        }

        /* Upload DOC_SK */
        if($this->upload->do_upload('DOC_SK')){
            if($pegawai->DOC_SK){
                @unlink('./assets/doc/' . $pegawai->DOC_SK);
            }
            $img = $this->upload->data();
            $DOC_SK = $img['file_name'];
        }else{
            $DOC_SK = $pegawai->DOC_SK;
        }

        /* Upload DOC_HONOR */
        if($this->upload->do_upload('DOC_HONOR')){
            if($pegawai->DOC_HONOR){
                @unlink('./assets/doc/' . $pegawai->DOC_HONOR);
            }
            $img = $this->upload->data();
            $DOC_HONOR = $img['file_name'];
        }else{
            $DOC_HONOR = $pegawai->DOC_HONOR;
        }

        /* Upload DOC_IJASAH */
        if($this->upload->do_upload('DOC_IJASAH')){
            if($pegawai->DOC_IJASAH){
                @unlink('./assets/doc/' . $pegawai->DOC_IJASAH);
            }
            $img = $this->upload->data();
            $DOC_IJASAH = $img['file_name'];
        }else{
            $DOC_IJASAH = $pegawai->DOC_IJASAH;
        }

        /* Upload FOTO */
        if($this->upload->do_upload('FOTO')){
            if($pegawai->FOTO){
                @unlink('./assets/doc/' . $pegawai->FOTO);
            }
            $img = $this->upload->data();
            $FOTO = $img['file_name'];
        }else{
            $FOTO = $pegawai->FOTO;
        }


        $this->db->where('id', $id)->update('riwayat_data_utama', [
            'status' => $this->input->post('status', TRUE),
            'nip' => $this->input->post('nip', TRUE),
            'nama' => $this->input->post('nama', TRUE),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
            'kd_lokasi_lahir' => $this->input->post('kd_lokasi_lahir', TRUE),
            'tgl_lahir1' => $this->input->post('tgl_lahir1', TRUE),
            'alamat' => $this->input->post('alamat', TRUE),
            'email' => $this->input->post('email', TRUE),
            'JENJANG' => $this->input->post('JENJANG', TRUE),
            'JURUSAN' => $this->input->post('JURUSAN', TRUE),
            'NOKTP' => $this->input->post('NOKTP', TRUE),
            'NOREK' => $this->input->post('NOREK', TRUE),
            'NOBPJS' => $this->input->post('NOBPJS', TRUE),
            'NOBPJSNAKER' => $this->input->post('NOBPJSNAKER', TRUE),
            'NPWP' => $this->input->post('NPWP', TRUE),
            'DOC_KTP' => $DOC_KTP,
            'DOC_REK' => $DOC_REK,
            'DOC_BPJS' => $DOC_BPJS,
            'DOC_BPJSNAKER' => $DOC_BPJSNAKER,
            'DOC_NPWP' => $DOC_NPWP,
            'DOC_SK' => $DOC_SK,
            'DOC_HONOR' => $DOC_HONOR,
            'DOC_IJASAH' => $DOC_IJASAH,
            'FOTO' => $FOTO,
        ]);
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('sukses', "Data Berhasil Di Simpan");
        }else{
            $this->session->set_flashdata('error', "Data Gagal Di Simpan");
        }

        redirect('admin/kepegawaian');
    }

    function addRiwayatJabatan(){
        $this->load->library('upload', [
            'upload_path' => './assets/doc/',
            'allowed_types' => 'png|jpg|jpeg|pdf',
            'encrypt_name' => TRUE
        ]);
        /* Upload DOC_SK */
        if($this->upload->do_upload('DOC_SK')){
            $img = $this->upload->data();
            $DOC_SK = $img['file_name'];
        }else{
            $DOC_SK = '';
        }

        $this->db->insert('mutasi_jabatan', [
            'id_pegawai' => $this->input->post('id_pegawai', TRUE),
            'nip' => $this->input->post('nip', TRUE),
            'id_jabatan' => $this->input->post('id_jabatan', TRUE),
            'DOC_SK' => $DOC_SK,
            'HONOR' => str_replace('.', '', $this->input->post('HONOR', TRUE)),
            'tanggal' => $this->input->post('tanggal', TRUE)
        ]);
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('sukses', "Riwayat Jabatan Berhasil Di Tambahkan");
        }else{
            $this->session->set_flashdata('error', "Riwayat Jabatan Gagal Di Tambahkan");
        }

        redirect($_SERVER['HTTP_REFERER']);
    }

    function removeRiwayatJabatan($id){
        $mutasi = $this->db->get_where('mutasi_jabatan', ['id' => $id])->row();
        if($mutasi->DOC_HONOR){
            @unlink('./assets/doc/' . $mutasi->DOC_HONOR);
        }

        $this->db->where('id', $id)->delete('mutasi_jabatan');
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('sukses', "Riwayat Jabatan Berhasil Di Hapus");
        }else{
            $this->session->set_flashdata('error', "Riwayat Jabatan Gagal Di Hapus");
        }

        redirect($_SERVER['HTTP_REFERER']);
    }

    function addRiwayatPendidikan(){
        $this->load->library('upload', [
            'upload_path' => './assets/doc/',
            'allowed_types' => 'png|jpg|jpeg|pdf',
            'encrypt_name' => TRUE
        ]);
        /* Upload DOC_IJASAH */
        if($this->upload->do_upload('DOC_IJASAH')){
            $img = $this->upload->data();
            $DOC_IJASAH = $img['file_name'];
        }else{
            $DOC_IJASAH = '';
        }

        $this->db->insert('riwayat_pendidikan', [
            'id_pegawai' => $this->input->post('id_pegawai', TRUE),
            'nip' => $this->input->post('nip', TRUE),
            'DOC_IJASAH' => $DOC_IJASAH,
            'JENJANG' => $this->input->post('JENJANG', TRUE),
            'JURUSAN' => $this->input->post('JURUSAN', TRUE),
        ]);
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('sukses', "Riwayat Pendidikan Berhasil Di Tambahkan");
        }else{
            $this->session->set_flashdata('error', "Riwayat Pendidikan Gagal Di Tambahkan");
        }

        redirect($_SERVER['HTTP_REFERER']);
    }

    function removeRiwayatPendidikan($id){
        $data = $this->db->get_where('riwayat_pendidikan', ['id' => $id])->row();
        if($data->DOC_IJASAH){
            @unlink('./assets/doc/' . $data->DOC_IJASAH);
        }

        $this->db->where('id', $id)->delete('riwayat_pendidikan');
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('sukses', "Riwayat Pendidikan Berhasil Di Hapus");
        }else{
            $this->session->set_flashdata('error', "Riwayat Pendidikan Gagal Di Hapus");
        }

        redirect($_SERVER['HTTP_REFERER']);
    }

    function export(){
        $pegawai = $this->db->select('mp.*, j.jabatan, mjp.HONOR AS honor_pg, rp.jenjang, rp.jurusan')
                            ->from('riwayat_data_utama mp')
                            ->join('(SELECT id_pegawai, MAX(tanggal) AS max_tanggal, id FROM mutasi_jabatan GROUP BY id_pegawai) AS mutasi_terbaru', 'mp.id = mutasi_terbaru.id_pegawai', 'left')
                            ->join('(SELECT id_pegawai, MAX(id) AS max_id, id, jenjang, jurusan FROM riwayat_pendidikan GROUP BY id_pegawai) AS mutasi_terbaru2', 'mp.id = mutasi_terbaru2.id_pegawai', 'left')
                            ->join('mutasi_jabatan mjp', 'mp.id = mjp.id_pegawai AND mutasi_terbaru.max_tanggal = mjp.tanggal', 'left')
                            ->join('riwayat_pendidikan rp', 'mp.id = rp.id_pegawai AND mutasi_terbaru2.max_id = rp.id', 'left')
                            ->join('jabatan j', 'mjp.id_jabatan = j.id', 'left')->get();
        $data['pegawai'] = $pegawai;
        $htmlString = $this->load->view('exportPegawai', $data, TRUE);

        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Html();
        $spreadsheet = $reader->loadFromString($htmlString);
        $activeWorksheet = $spreadsheet->getActiveSheet();

        $activeWorksheet->getColumnDimension('B')->setWidth(20);
        $activeWorksheet->getColumnDimension('C')->setAutoSize(TRUE);
        $activeWorksheet->getColumnDimension('E')->setAutoSize(TRUE);
        $activeWorksheet->getColumnDimension('F')->setWidth(15);
        $activeWorksheet->getColumnDimension('G')->setWidth(15);
        $activeWorksheet->getColumnDimension('H')->setAutoSize(TRUE);
        $activeWorksheet->getColumnDimension('I')->setAutoSize(TRUE);
        $activeWorksheet->getColumnDimension('J')->setAutoSize(TRUE);
        $activeWorksheet->getColumnDimension('K')->setAutoSize(TRUE);
        $activeWorksheet->getColumnDimension('L')->setAutoSize(TRUE);
        $activeWorksheet->getColumnDimension('M')->setAutoSize(TRUE);
        $activeWorksheet->getColumnDimension('N')->setAutoSize(TRUE);
        $activeWorksheet->getColumnDimension('O')->setAutoSize(TRUE);
        $activeWorksheet->getColumnDimension('P')->setAutoSize(TRUE);
        
        $activeWorksheet->getStyle('A4:Q5')->applyFromArray([
            'font' => ['bold' => true, 'size' => 12, 'name' => 'Calibri'],
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
            'borders' => [
                'bottom' => [
                    'borderStyle' => 'hair', 
                    'color' => ['argb' => ' 0F0F0F']
                ],'top' => [
                    'borderStyle' => 'hair', 
                    'color' => ['argb' => ' 0F0F0F']
                ],'right' => [
                    'borderStyle' => 'hair', 
                    'color' => ['argb' => ' 0F0F0F']
                ],'left' => [
                    'borderStyle' => 'hair', 
                    'color' => ['argb' => ' 0F0F0F']
                ]
            ]
        ]);

        $activeWorksheet->freezePane('F6');
        $activeWorksheet->getStyle('B')->getNumberFormat()->setFormatCode('#');
        $activeWorksheet->getStyle('L')->getNumberFormat()->setFormatCode('#');
        $activeWorksheet->getStyle('M')->getNumberFormat()->setFormatCode('#');
        $activeWorksheet->getStyle('N')->getNumberFormat()->setFormatCode('#');
        $activeWorksheet->getStyle('O')->getNumberFormat()->setFormatCode('#');
        $activeWorksheet->getStyle('P')->getNumberFormat()->setFormatCode('#');

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="DAFTAR PEGAWAI DINAS LINGKUNGAN HIDUP KOTA TANGERANG SELATAN.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }
}