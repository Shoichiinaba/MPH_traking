<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Traking extends CI_Controller
{
	var $template = 'templates/index';

	function __construct()
	{
		parent::__construct();
		$this->API = "https://sisolusi.id/MPH_traking/api/traking";
		$this->load->model('M_traking');
		$this->load->helper('url');
	}

	function index()
	{
		$this->form_validation->set_rules('no_pengepakan', 'No_pengepakan', 'required|trim');

		if ($this->form_validation->run() == false) {
			$data['content']  = 'admin/add';
			$this->load->view($this->template, $data);
		} else {
			$data = [

				'no_pengepakan' => $this->input->post('no_pengepakan'),
				'picking' => $this->input->post('picking'),
				'packing' => $this->input->post('packing'),
				'kirim' => $this->input->post('kirim'),
			];
			$this->db->insert('traking_order', $data);
			$this->session->set_flashdata('berhasil', "Data Pengepakan Berhasil Diproses");
			redirect('traking');
		}
	}

	function get_ajax()
	{
		$list = $this->M_traking->get_datatables();
		$data = array();
		$no = @$_POST['start'];
		foreach ($list as $a) {

			$row = array();
			$no++;
			$row[] = $no;
			$row[] = $a->no_pengepakan;
			$row[] = $a->picking;
			$row[] = $a->packing;
			$row[] = $a->kirim;
			$row[] = '<a href="' . site_url('') . '" class="btn btn-danger btn-xs"><i class="fa fa-forward"></i> Proses lagi</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => @$_POST['draw'],
			"recordsTotal" => $this->M_traking->count_all(),
			"recordsFiltered" => $this->M_traking->count_filtered(),
			"data" => $data,
		);
		// output to json format
		echo json_encode($output);
	}
}
