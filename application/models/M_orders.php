<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_orders extends CI_Model
{
	public function get_booking()
	{		
			$this->db->where('status', 'belum');
			$query = $this->db->get("booking");

			return $query->result();
	}

	public function get_history()
	{		
			$this->db->where('status', 'selesai');
			$query = $this->db->get("booking");

			return $query->result();
	}

	public function get_booking_by_id($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get("booking");

		return $query->row();
	}

	public function delete_booking($id)
	{
		$this->db->where('id', $id);
		$delete = $this->db->delete('booking');

		return $delete;
	}

	public function update_status_slot($id)
	{
		$this->db->where('id', $id);
		$update = $this->db->update('slot', array('status' => 'tersedia'));

		return $update;
	}

	public function update_status_booking($id)
	{
		$this->db->where('id', $id);
		$update = $this->db->update('booking', array('status' => 'selesai'));

		return $update;

	}

	public function edit_booking($id, $data)
	{
		$this->db->where('id', $id);
		$update = $this->db->update('booking', $data);

		return $update;
	}

	public function get_last_book_id()
	{
		$this->db->select_max('id');
		$query = $this->db->get('booking');
		$row = $query->row();

		return $row->id;
	}
}
?>
