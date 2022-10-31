<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_traking extends CI_Model
{
	function input_pengepakan($post)
	{
		// $hasil = $this->db->query("INSERT INTO traking_order(id,no_pengepakan,picking_packing,kirim) VALUES ('$id','$no_pengepakan','$picking','$packing','$kirim')");
		// return $hasil;

		$params = [
			'no_pengepakan' => $post['no_pengepakan'],
			'picking' => $post['picking'],
			'packing' => $post['packing'],
			'kirim' => $post['kirim']
		];
		$this->db->insert('traking_order', $params);
	}

	// start datatables
	var $column_order = array('id', 'no_pengepakan', 'picking', 'packing', 'kirim'); //set column field database for datatable orderable
	var $column_search = array('id', 'no_pengepakan', 'picking', 'packing', 'kirim'); //set column field database for datatable searchable
	var $order = array('picking' => 'asc'); // default order

	private function _get_datatables_query()
	{
		$this->db->select('traking_order.*');
		$this->db->from('traking_order');
		$i = 0;
		foreach ($this->column_search as $trx) { // loop column
			if (@$_POST['search']['value']) { // if datatable send POST for search
				if ($i === 0) { // first loop
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($trx, $_POST['search']['value']);
				} else {
					$this->db->or_like($trx, $_POST['search']['value']);
				}
				if (count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}

		if (isset($_POST['order'])) { // here order processing
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else if (isset($this->order)) {
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}
	function get_datatables()
	{
		$this->_get_datatables_query();
		if (@$_POST['length'] != -1)
			$this->db->limit(@$_POST['length'], @$_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}
	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}
	function count_all()
	{
		$this->db->from('traking_order');
		return $this->db->count_all_results();
	}
	// end datatables

	// Dashboard

	function jml_pick()
	{
		$this->db->select('picking, COUNT(picking) as jum_picking');
		$this->db->group_by('picking');
		$this->db->order_by('jum_picking', 'desc');
		$hasil = $this->db->get('traking_order');
		return $hasil->num_rows();
	}

	function jml_pack()
	{
		$this->db->select('id, packing, COUNT(packing) as jum_pack');
		$this->db->group_by('packing');
		$this->db->order_by('jum_pack', 'asc');
		$hasil = $this->db->get('traking_order');
		return $hasil->num_rows();
	}

	public function jum_packi()
	{
		$this->db->select('packing, COUNT(packing) as jum_pck');
		$this->db->order_by('jum_pck', 'desc');
		$hasil = $this->db->get('traking_order');
		return $hasil->num_rows();
	}

	function jml_krm()
	{
		$this->db->select('id,picking,packing,kirim, COUNT(kirim) as jum_kir');
		$this->db->order_by('jum_kir', 'asc');
		// $this->db->where('kirim = IS NOT NULL');
		$hasil = $this->db->get('traking_order');
		return $hasil->num_rows();
	}

	function jml_data()
	{
		$this->db->select('traking_order.*');
		$query = $this->db->get('traking_order');
		return $query->num_rows();
	}
}
