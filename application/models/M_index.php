<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_index extends CI_Model
{
	public function get_slot()
	{
		$this->db->where('status', 'tersedia');
		$query = $this->db->get("slot");

		return $query->result();
	}

	public function get_slot_by_id($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get("slot");

		return $query->row();
	}

	public function update_status($id)
	{
		$this->db->where('id', $id);
		$update = $this->db->update('slot', array('status' => 'tidak'));

		return $update;
	}

	public function beli($data)
	{
		$insert = $this->db->insert('booking', $data);

		return $insert;
	}
}
?>
