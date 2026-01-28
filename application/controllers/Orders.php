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

	public function get_book()
	{
		print_r($_POST);
		$search = $_GET['search']['value'] ?? '';
		$limit  = $_GET['length'] ?? 10;
		$offset = $_GET['start'] ?? 0;

		// Mapping kolom tabel (URUT SESUAI <th>)
		$columns = ['id', 'slot_id', 'plat', 'jenis'];

		// Ambil order index dengan aman
		$orderIndex = $_GET['order'][0]['column'] ?? 0;
		$orderType  = $_GET['order'][0]['dir'] ?? 'asc';

		// Tentukan nama kolom dari mapping
		$nameOrder = $columns[$orderIndex];

		$records = $this->orders->getData($limit, $search, $offset, $nameOrder, $orderType);

		$data = [];
		foreach ($records['data'] as $row) {
			$data[] = [
				$row['id'],
				$row['slot_id'],
				$row['plat'],
				$row['jenis'],
				'
				<a href="'.site_url('orders/selesai/'.$row['id']).'" 
				class="btn btn-warning btn-sm"
				onclick="return confirm(\'Konfirmasi Pembayaran?\')">Selesai</a>
				<a href="'.site_url('orders/print/'.$row['id']).'" 
				class="btn btn-info btn-sm">Print</a>'
			];
		}

		echo json_encode([
			"draw" => intval($this->input->get('draw') ?? 1),
			"recordsTotal" => $records['recordsTotal'],
			"recordsFiltered" => $records['recordsFiltered'],
			"data" => $data
		]);
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
