<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History extends CI_Controller
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
		$get_booking = $this->orders->get_history();

		$data = array(
			'list_booking' => $get_booking
		);
		$this->load->view('inc/header.php');
		$this->load->view('v_history', $data);
		$this->load->view('inc/footer.php');
	}

	public function edit($id)
	{
		$get_booking = $this->orders->get_booking_by_id($id);

		$data = array(
			'list_booking' => $get_booking
		);
		$this->load->view('inc/header.php');
		$this->load->view('v_history_edit', $data);
		$this->load->view('inc/footer.php');
	}

	public function do_edit()
	{
		$id = $this->input->post('id');
		$this->form_validation->set_rules('plat', 'Plat', 'required');
		$this->form_validation->set_rules('jenis', 'Jenis', 'required');
		$this->form_validation->set_rules('jam_masuk', 'Jam Masuk', 'required');
		$this->form_validation->set_rules('jam_keluar', 'Jam Keluar', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$get_booking = $this->orders->get_booking_by_id($id);

			$data = array(
				'list_booking' => $get_booking
			);
			$this->load->view('inc/header.php');
			$this->load->view('v_history_edit', $data);
			$this->load->view('inc/footer.php');
		}
		else
		{
			$durasi = floor((strtotime($this->input->post('jam_keluar')) - strtotime($this->input->post('jam_masuk'))) / 3600);
			$data = array(
				'plat'       => $this->input->post('plat'),
				'jenis'      => $this->input->post('jenis'),
				'jam_masuk'  => $this->input->post('jam_masuk'),
				'jam_keluar' => $this->input->post('jam_keluar'),
				'durasi'     => $durasi
			);

			$this->orders->edit_booking($id, $data);

			$this->session->set_flashdata('alert', 'Data Berhasil diupdate.');
			redirect('history');
		}
	}
}
?>
