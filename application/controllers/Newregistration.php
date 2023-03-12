<?php
defined('BASEPATH') or exit('No direct script access allowed');

class newregistration extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
       

        if ($this->session->userdata('user_name') == NULL && $this->session->userdata('password') == NULL) {
            redirect(base_url() . "login");
        }
        
        if($this->session->userdata('role') != 1)
        {
            redirect(base_url() . "dashboard");
        }
        
        $this->load->model('driver_model', 'driver');
        $this->load->model('Pelanggan_model');
        $this->load->model('email_model');
        $this->load->model('appsettings_model', 'app');
    }

    public function index()
    {
        $data['driver'] = $this->driver->getalldriver();

        $getview['view'] = 'newregistration';
        $this->load->view('includes/header');
        $this->load->view('newregistration/index', $data);
        $this->load->view('includes/footer', $getview);
    }

    public function confirm($id)
    {
        $this->driver->ubahstatusnewreg($id);

        $item = $this->app->getappbyid();

        $token = sha1(rand(0, 999999) . time());

        $dataforgot = array(
            'userid' => $id,
            'token' => $token,
            'idKey' => '2'
        );
        $this->Pelanggan_model->dataforgot($dataforgot);

        $linkbtn = base_url() . 'resetpass/rest/' . $token . '/2';
        $judul_email = $item['email_subject_confirm'] . '[ticket-' . rand(0, 999999) . ']';
        $template = $this->Pelanggan_model->template1($item['email_subject_confirm'], $item['email_text3'], $item['email_text4'], $item['app_website'], $item['app_name'], $linkbtn, $item['app_linkgoogle'], $item['app_address']);
        $email = $this->driver->getdriverbyid($id);
        $emailuser = $email['email'];
        $host = $item['smtp_host'];
        $port = $item['smtp_port'];
        $username = $item['smtp_username'];
        $password = $item['smtp_password'];
        $from = $item['smtp_from'];
        $appname = $item['app_name'];
        $secure = $item['smtp_secure'];

        $this->email_model->emailsend($judul_email, $emailuser, $template, $host, $port, $username, $password, $from, $appname, $secure);
        $this->session->set_flashdata('ubah', 'Driver berhasil bergabung');
        redirect('driver');
    }
    
    
    
    // DATATABLE
	function fetch_table()
    {
        $type = $this->input->post('type');
        $fetch_data = $this->driver->make_datatables($type);
        $data = array();
        $nomor = 0;
        foreach ($fetch_data as $a) 
        {
            
            $nomor++;
            $row = array();
            $row[] = $nomor;
            $row[] = $a->id;
            $row[] = '<img class="round" style="width: 40px; height: 40px;" src="'.base_url('images/fotodriver/') . $a->foto.'">';
            $row[] = $a->nama_driver;
            $row[] = $a->no_telepon;
            $row[] = number_format($a->rating, 1);
            $row[] = $a->driver_job;
            if($a->status == 3) 
            {
                $row[] = '<label class="badge badge-dark">Banned</label>';
            }
            else if($a->status == 0) 
            {
                $row[] = '<label class="badge badge-secondary text-dark">Baru Daftar</label>';
            }
            else
            {
                if($a->status_job == 1)
                {
                    $row[] = '<label class="badge badge-primary">Aktif</label>'; 
                }
                if($a->status_job == 2)
                {
                    $row[] = '<label class="badge badge-info">Pickup</label>';
                }
                if($a->status_job == 3)
                {
                    $row[] = '<label class="badge badge-success">work</label>';
                }
                if($a->status_job == 4 )
                {
                    $row[] = '<label class="badge badge-danger">Non Aktif</label>';
                }
                
            }
            
             $ac = '';
             $ac .= '<span class="mr-1"><a href="'.base_url().'driver/detail/'.$a->id.'">';
             $ac .= '<i class="feather icon-eye text-success"></i></a></span>';
             $ac .= '<span class="mr-1"><a href="'.base_url().'newregistration/confirm/'.$a->id.'">';
             $ac .= '<i class="feather icon-trash text-danger"></i></a></span>';
             
             $row[] = $ac;
             
             $data[] = $row;            
        }

        $output = array(
            "draw"              => intval($_POST["draw"]),
            "recordsTotal"      => $this->driver->get_all_data($type),
            "recordsFiltered"   => $this->driver->get_filtered_data($type),
            "data"              => $data

        );

        echo json_encode($output);  
    }
}
