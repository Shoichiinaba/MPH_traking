<?php

require_once APPPATH . 'libraries/REST_Controller.php';

use MPH_traking\Libraries\REST_Controller;

class Api extends REST_Controller
{
	function __construct($config = 'rest')
	{
		parent::__construct($config);
	}
	function traking_get()
	{
		$id = $this->get('id');
		if ($id) {
			$customer = $this->db->get_where('traking_order', array('id' => $id))->result();
		} else {
			$customer = $this->db->get('traking_order')->result();
		}
		if ($customer) {
			$this->response($customer, 200);
		} else {
			$this->response(array('status' => 'not found'), 404);
		}
	}
	function traking_post()
	{
		$params = array(
			'no_pengepakan' => $this->post('no'),
			'picking' => $this->post('picking'),
			'packing'  => $this->post('packing'),
			'kirim'  => $this->post('kirim')
		);
		$process = $this->db->insert('traking_order', $params);
		if ($process) {
			$this->response(array('status' => 'succes'), 201);
		} else {
			return $this->response(array('status' => 'fail'), 502);
		}
	}
	function traking_put()
	{
		$params = array(
			'no_pengepakan' => $this->put('no'),
			'picking' => $this->put('picking'),
			'packing'  => $this->put('packing'),
			'kirim'  => $this->put('kirim')
		);
		$this->db->where('id', $this->put('id'));
		$execute = $this->db->update('traking_order', $params);
		if ($execute) {
			$this->response(array('status' => 'succes'), 201);
		} else {
			return $this->response(array('status' => 'fail'), 502);
		}
	}
	function traking_delete()
	{
		$this->db->where('id', $this->delete('id'));
		$execute = $this->db->delete('traking_order');
		if ($execute) {
			$this->response(array('status' => 'succes'), 201);
		} else {
			return $this->response(array('status' => 'fail'), 502);
		}
	}
}
