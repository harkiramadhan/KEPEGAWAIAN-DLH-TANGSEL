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
        $nip = $this->session->userdata('nip');
        $var = [
            'title' => 'Kepegawaian - KEPEGAWAIAN DLH TANGSEL',
            'pages' => 'Data Pegawai',
            'pegawai' => $this->db->get_where('riwayat_data_utama', ['nip' => $nip])->row()
        ];

        $this->load->view('layout/header', $var);
        $this->load->view('kepegawaian', $var);
        $this->load->view('layout/footer', $var);
    }

    function update(){
        $pegawai = $this->db->get_where('riwayat_data_utama', ['nip' => $this->session->userdata('nip')])->row();

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


        $this->db->where('nip', $this->session->userdata('nip'))->update('riwayat_data_utama', [
            'nama' => $this->input->post('nama', TRUE),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
            'email' => $this->input->post('email', TRUE),
            'NOKTP' => $this->input->post('NOKTP', TRUE),
            'NOREK' => $this->input->post('NOREK', TRUE),
            'NOBPJS' => $this->input->post('NOBPJS', TRUE),
            'NPWP' => $this->input->post('NPWP', TRUE),
            'DOC_KTP' => $DOC_KTP,
            'DOC_REK' => $DOC_REK,
            'DOC_BPJS' => $DOC_BPJS,
            'DOC_NPWP' => $DOC_NPWP,
            'DOC_SK' => $DOC_SK,
            'DOC_HONOR' => $DOC_HONOR,
            'DOC_IJASAH' => $DOC_IJASAH,
            'FOTO' => $FOTO
        ]);
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('sukses', "Data Berhasil Di Simpan");
        }else{
            $this->session->set_flashdata('error', "Data Gagal Di Simpan");
        }

        redirect($_SERVER['HTTP_REFERER']);
    }
}