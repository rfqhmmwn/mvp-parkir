<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('m_orders', 'orders');
		$this->load->database();
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->library('session');
		if($this->session->userdata('logged_in') != true)
		{
			redirect('index/login');
		}
	}

	public function index()
	{
		$get_booking = $this->orders->get_booking();

		$data = array(
			'list_booking' => $get_booking
		);
		$this->load->view('inc/header.php');
		$this->load->view('v_orders', $data);
		$this->load->view('inc/footer.php');
	}

	public function selesai($id)
	{
		$get_booking = $this->orders->get_booking_by_id($id);

		$slot_id = $get_booking->slot_id;

		$this->orders->update_status_slot($slot_id);
		$this->orders->update_status_booking($id);

		$jam_masuk  = strtotime($get_booking->jam_masuk);
		$jam_keluar = time(); 

		// $durasi = ($jam_keluar - $jam_masuk) / 60;
		$durasi = floor(($jam_keluar - $jam_masuk) / 3600);


		$data = array(
			'jam_keluar' => date('Y-m-d H:i:s', $jam_keluar),
			'durasi'     => $durasi
		);

		$this->orders->edit_booking($id, $data);

		$this->session->set_flashdata('alert', 'Pembayaran Berhasil dikonfirmasi.');
		redirect('orders');
	}

	public function print($id)
	{
		$get_booking = $this->orders->get_booking_by_id($id);

		$data = array(
			'list_booking' => $get_booking
		);
		$this->load->view('v_print', $data);
	}
}
?>
