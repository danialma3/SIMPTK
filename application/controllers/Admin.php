<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['title'] = 'Halaman Awal';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pns'] = $this->db->query("SELECT COUNT(status_kepegawaian) as a FROM tb_ptk WHERE status_kepegawaian = 'PNS';")->row_array();
        $data['cpns'] = $this->db->query("SELECT COUNT(status_kepegawaian) FROM tb_ptk WHERE status_kepegawaian = 'CPNS';")->row_array();
        $data['pppk'] = $this->db->query("SELECT COUNT(status_kepegawaian) FROM tb_ptk WHERE status_kepegawaian = 'PPPK';")->row_array();
        $data['honor_provinsi'] = $this->db->query("SELECT COUNT(status_kepegawaian) FROM tb_ptk WHERE status_kepegawaian = 'Honor Daerah TK.I Provinsi';")->row_array();
        $data['honor_sekolaha'] = $this->db->query("SELECT COUNT(status_kepegawaian) FROM tb_ptk WHERE status_kepegawaian = 'Tenaga Honor Sekolah';")->row_array();
        $data['honor_sekolahb'] = $this->db->query("SELECT COUNT(status_kepegawaian) FROM tb_ptk WHERE status_kepegawaian = 'Guru Honor Sekolah';")->row_array();
        $data['honor_sekolah'] =  $data['honor_sekolaha'] + $data['honor_sekolahb'];
        $data['honor_kabkot'] = $this->db->query("SELECT COUNT(status_kepegawaian) FROM tb_ptk WHERE status_kepegawaian = 'Honor Daerah TK.II Kab/Kota';")->row_array();
        $data['gtypty'] = $this->db->query("SELECT COUNT(status_kepegawaian) FROM tb_ptk WHERE status_kepegawaian = 'GTY/PTY';")->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
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
        $this->load->view('admin/dataPTK', $data);
        $this->load->view('templates/footer');

        
    }

    public function dataAkun()
    {
        $data['title'] = 'Pangkalan Data Akun';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['akun'] = $this->db->get('user')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/dataAkun', $data);
        $this->load->view('templates/footer');

        $data = [
            'email' => htmlspecialchars($this->input->post('email'))
        ];
        $this->db->where('email', $data['email']);
        $this->db->delete('user');
    }

    public function profile()
    {
        $data['title'] = 'Profile User';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['akun'] = $this->db->get('user')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/profile', $data);
        $this->load->view('templates/footer');
    }

    public function registration()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'password tidak sama',
            'min_length' => 'password pendek'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        if ($this->form_validation->run() == false) {
            $this->load->library('form_validation');
            $data['title'] = 'SIMPTK Pendaftaran';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['akun'] = $this->db->get('user')->result_array();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/registration', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email',  true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_create' => time()

            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Selamat!! Akun Berhasil Ditambahkan 
          </div>');
            redirect('admin/dataAkun');
        }
    }
}
