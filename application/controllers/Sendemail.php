<?php
defined('BASEPATH') or exit('No direct script access allowed');

class sendemail extends CI_Controller
{

    public function  __construct()
    {

        parent::__construct();
     
        if ($this->session->userdata('user_name') == NULL && $this->session->userdata('password') == NULL) {
            redirect(base_url() . "login");
        }
        $this->load->library('form_validation');
        $this->load->model('driver_model', 'driver');
        $this->load->model('users_model', 'user');
        $this->load->model('mitra_model', 'mitra');
        $this->load->model('appsettings_model', 'app');
        $this->load->model('email_model', 'email_model');
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
        $getview['view'] = 'sendemail';
        $this->CekSuper();
        $data['driver'] = $this->driver->getalldriver();
        $data['user'] = $this->user->getallusers();
        $data['mitra'] = $this->mitra->getallmitra();

        $this->load->view('includes/header');
        $this->load->view('sendemail/index', $data);
        $this->load->view('includes/footer', $getview);
    }

    public function send()
    {
        if (demo == TRUE) {
            $this->session->set_flashdata('demo', 'TIDAK DI IZINKAN');
            redirect('sendemail/index');
        } else {
            $data['app'] = $this->app->getappbyid();

            $emailpelanggan = $this->input->post('emailpelanggan');
            $emaildriver = $this->input->post('emaildriver');
            $emailmitra = $this->input->post('emailmitra');
            $emailothers = $this->input->post('emailothers');
            $sendto = $this->input->post('sendto');

            if ($sendto == 'users') {
                $emailuser = $emailpelanggan;
            } elseif ($sendto == 'drivers') {
                $emailuser = $emaildriver;
            } elseif ($sendto == 'merchant') {
                $emailuser = $emailmitra;
            } else {
                $emailuser = $emailothers;
            }





            $subject = $this->input->post('subject');
            $emailmessage = $this->input->post('content');
            $host = $data['app']['smtp_host'];
            $port = $data['app']['smtp_port'];
            $username = $data['app']['smtp_username'];
            $password = $data['app']['smtp_password'];
            $from = $data['app']['smtp_from'];
            $appname = $data['app']['app_name'];
            $secure = $data['app']['smtp_secure'];
            $address = $data['app']['app_address'];
            $linkgoogle = $data['app']['app_linkgoogle'];
            $web = $data['app']['app_website'];

            $content = $this->email_model->template2($subject, $emailmessage, $address, $appname, $linkgoogle, $web);
            $this->email_model->emailsend($subject, $emailuser, $content, $host, $port, $username, $password, $from, $appname, $secure);
            $this->session->set_flashdata('send', 'Email berhasil dikirim');


            redirect('sendemail');
        }
    }
}
