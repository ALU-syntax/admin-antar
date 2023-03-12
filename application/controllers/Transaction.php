<?php
defined('BASEPATH') or exit('No direct script access allowed');

class transaction extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('user_name') == NULL && $this->session->userdata('password') == NULL) {
			redirect(base_url() . "login");
		}
		$this->load->model('Appsettings_model', 'app');
		$this->load->model('Dashboard_model', 'dashboard');
		// $this->load->library('form_validation');
		$params = array('server_key' => 'your_server_key', 'production' => false);
		$this->load->library('veritrans');
		$this->veritrans->config($params);
		$this->load->helper('url');
	}
	public function CekSuper()
	{
		$id = $_SESSION['id'];
		$sql = "SELECT * FROM admin where id = $id ";
		$query = $this->db->query($sql)->result();
		$SuperAdmin = $query[0]->admin_role;
		// var_dump($SuperAdmin==0);die;
		if ($SuperAdmin == 0) {

			echo "<script>
                    alert('Anda Tidak Punya Akses!');
                    window.location.href='dashboard';
                    </script>";
			// redirect('dashboard');
			// exit();
		}
	}
	public function index()
	{
		$getview['view'] = 'transaction';
		$data['currency'] = $this->app->getappbyid();
		$data['transaksi'] = $this->dashboard->getAlltransaksi();
		$data['fitur'] = $this->dashboard->getAllfitur();
		$data['saldo'] = $this->dashboard->getallsaldo();

		$this->load->view('includes/header');
		$this->load->view('transaction/index', $data);
		$this->load->view('includes/footer', $getview);
	}

	public function process()
	{
		$data['currency'] = $this->app->getappbyid();
		$data['transaksi'] = $this->dashboard->getAlltransaksi();
		$data['fitur'] = $this->dashboard->getAllfitur();
		$data['saldo'] = $this->dashboard->getallsaldo();

		$this->load->view('includes/header');
		$this->load->view('transaction/index', $data);
		$this->load->view('includes/footer');

		$order_id = $this->input->post('order_id');
		$action = $this->input->post('action');
		switch ($action) {
			case 'status':
				$this->status($order_id);
				break;
			case 'approve':
				$this->approve($order_id);
				break;
			case 'expire':
				$this->expire($order_id);
				break;
			case 'cancel':
				$this->cancel($order_id);
				break;
		}
	}

	public function status($order_id)
	{
		echo 'test get status </br>';
		print_r($this->veritrans->status($order_id));
	}

	public function cancel($order_id)
	{
		echo 'test cancel trx </br>';
		echo $this->veritrans->cancel($order_id);
	}

	public function approve($order_id)
	{
		echo 'test get approve </br>';
		print_r($this->veritrans->approve($order_id));
	}

	public function expire($order_id)
	{
		echo 'test get expire </br>';
		print_r($this->veritrans->expire($order_id));
	}
}
