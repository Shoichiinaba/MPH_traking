<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    var $template = 'templates/index';

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_traking');
    }


    function index()
    {
        $data['content']        = 'admin/dashboard';
        $data['jum_pick']       = $this->M_traking->jml_pick();
        $data['jml_data']       = $this->M_traking->jml_data();
        $data['jml_packing']    = $this->M_traking->jum_packi();
        $data['jml_kirim']      = $this->M_traking->jml_krm();
        $this->load->view($this->template, $data);
    }
}
