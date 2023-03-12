
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kebijakan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('Appsettings_model', 'app');
	}
	
	public function kebijakan_privasi()
    {
        $data['data'] = $this->app->kebijakan();
        $this->load->view('kebijakan', $data);
    }

}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */


