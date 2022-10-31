<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
	public function update($data, $id)
	{
		$this->db->where("id", $id);
		$this->db->update("admin", $data);

		return $this->db->affected_rows();
	}
	// Update Profil
	public function select($id = '')
	{
		if ($id != '') {
			$this->db->where('id', $id);
		}

		$data = $this->db->get('admin');

		return $data->row();
	}

	function hapus($params = '')
	{
		$sql = "DELETE  FROM admin WHERE id = ? ";
		return $this->db->query($sql, $params);
	}

	function get_data_admin()
	{
		return $this->db->get('admin')->result();
	}
}

/* End of file M_admin.php */
/* Location: ./application/models/M_admin.php */