<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Info Cepat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pns'] = $this->db->query("SELECT COUNT(status_kepegawaian) FROM tb_ptk WHERE status_kepegawaian = 'PNS';")->row_array();
        $data['cpns'] = $this->db->query("SELECT COUNT(status_kepegawaian) FROM tb_ptk WHERE status_kepegawaian = 'CPNS';")->row_array();
        $data['honor_provinsi'] = $this->db->query("SELECT COUNT(status_kepegawaian) FROM tb_ptk WHERE status_kepegawaian = 'Honor Daerah TK.I Provinsi';")->row_array();
        $data['honor_sekolaha'] = $this->db->query("SELECT COUNT(status_kepegawaian) FROM tb_ptk WHERE status_kepegawaian = 'Tenaga Honor Sekolah';")->row_array();
        $data['honor_sekolahb'] = $this->db->query("SELECT COUNT(status_kepegawaian) FROM tb_ptk WHERE status_kepegawaian = 'Guru Honor Sekolah';")->row_array();
        $data['honor_sekolah'] =  $data['honor_sekolaha'] + $data['honor_sekolahb'];
        $data['honor_kabkot'] = $this->db->query("SELECT COUNT(status_kepegawaian) FROM tb_ptk WHERE status_kepegawaian = 'Honor Daerah TK.II Kab/Kota';")->row_array();
        $data['gtypty'] = $this->db->query("SELECT COUNT(status_kepegawaian) FROM tb_ptk WHERE status_kepegawaian = 'GTY/PTY';")->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('User/index', $data);
        $this->load->view('templates/footer');
    }
    public function dataPTK()
    {
        $data['title'] = 'Pangkalan Data PTK';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['ptk'] = $this->db->get('tb_ptk')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/dataPTK', $data);
        $this->load->view('templates/footer');
    }
}
