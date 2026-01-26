<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('m_index', 'index');
		$this->load->model('m_orders', 'orders');
		$this->load->database();
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->library('session');
	}

	public function index()
	{
		$get_slot = $this->index->get_slot();

		$data = array(
			'list_slot' => $get_slot
		);
		$this->load->view('inc/header.php');
		$this->load->view('v_index', $data);
		$this->load->view('inc/footer.php');
	}

	public function beli($id)
	{
		$get_slot = $this->index->get_slot_by_id($id);

		$data = array(
			'list_slot' => $get_slot
		);
		$this->load->view('inc/header.php');
		$this->load->view('v_beli', $data);
		$this->load->view('inc/footer.php');
	}

	public function do_beli()
	{
		$id = $this->input->post('slot_id');
		$this->form_validation->set_rules('plat', 'Plat', 'required');
		$this->form_validation->set_rules('jenis', 'Kendaraan', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$get_slot = $this->index->get_slot_by_id($id);

			$data = array(
				'list_slot' => $get_slot
			);
			$this->load->view('inc/header.php');
			$this->load->view('v_beli', $data);
			$this->load->view('inc/footer.php');
		}
		else
		{
			$data = array(
				'plat' => $this->input->post('plat'),
				'jenis' => $this->input->post('jenis'),
				'slot_id' => $this->input->post('slot_id'),
				'jam_masuk' => date('Y-m-d H:i:s')
			);

			$this->index->update_status($id);
			$insert = $this->index->beli($data);

			if($insert == true)
			{
				$book_id = $this->orders->get_last_book_id();
				$this->session->set_flashdata('alert', 'Pembelian berhasil');

				redirect('orders/print/'.$book_id);
			}
			else
			{
				$this->session->set_flashdata('alert_gagal', 'Pembelian gagal');

				redirect('index/beli/'.$this->input->post('barang_id'));
			}
		}
	}

	public function login()
	{
		if($this->session->userdata('logged_in') == true)
		{
			redirect('index/index');
		}
		else
		{
			$this->load->view('v_login');
		}
	}

	public function do_login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		if($email == "admin@admin.com" && $password == "admin")
		{
			$sess_data = array(
				'logged_in' => true
			);
			$this->session->set_userdata($sess_data);
			redirect('index/index');
		}
		else
		{
			$this->session->set_flashdata('alert', 'Login Gagal: Cek username dan password anda!');
			redirect('index/login');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		redirect('index/login');
	}
}
?>
