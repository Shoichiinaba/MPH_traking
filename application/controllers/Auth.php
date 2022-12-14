<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    // var $template = 'template/index';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_auth');
    }

    public function index()
    {
        $session = $this->session->userdata('status');

        if ($session == '') {
            $this->load->view('admin/login');
        } else {
            redirect('Dashboard');
        }
    }

    public function login()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|max_length[15]');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == TRUE) {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            $data = $this->M_auth->login($username, $password);

            if ($data == false) {
                $this->session->set_flashdata('result_login', '<br> <div style="background: #99ffff; padding: 5px 5px;"> <font color="red"> Username atau Password yang anda masukkan salah.</font></div>');
                redirect('Auth');
            } else {
                $session = [
                    'userdata' => $data,
                    'status' => "Loged in"
                ];
                $this->session->set_userdata($session);
                redirect('Dashboard');
            }
        } else {
            $this->session->set_flashdata('result_login', '<br>Username Dan Password Harus Diisi.');
            redirect('Auth');
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('sukses', 'Anda Telah Keluar dari Aplikasi');
        redirect('Auth');
    }
}
/* End of file Login.php */
/* Location: ./application/controllers/Login.php */