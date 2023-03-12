<?php
defined('BASEPATH') or exit('No direct script access allowed');

class appnotification extends CI_Controller
{

    public function  __construct()
    {
        parent::__construct();



        if ($this->session->userdata('user_name') == NULL && $this->session->userdata('password') == NULL) {
            redirect(base_url() . "login");
        }
        if($this->session->userdata('role') != 1)
        {
            redirect(base_url() . "dashboard");
        }
        $this->load->model('notification_model', 'notif');
        $this->load->library('form_validation');
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
        $this->load->view('includes/header');
        $this->load->view('appnotification/index');
        $this->load->view('includes/footer', $getview);
    }

    public function send()
    {
        $id = $_SESSION['id'];
        $topic = $this->input->post('topic');
        $title = $this->input->post('title');
        $message = $this->input->post('message');
        $this->notif->sendNotification($title, $message, $topic);
        $this->session->set_flashdata('send', 'Notifikasi berhasil dikirim');
        $this->notif->savenotif($title, $message, $topic, $id);
        redirect('appnotification/index');
    }
    
    
    
}
