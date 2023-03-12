<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cabang extends CI_Controller
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
        $this->load->model('cabang_model', 'cabang');
        $this->load->model('appsettings_model', 'app');
        $this->load->library('form_validation');
        $this->load->library('upload');
    }

    public function index()
    {
        $getview['view'] = 'cabang';
        $this->load->view('includes/header');
        $this->load->view('cabang/index');
        $this->load->view('includes/footer', $getview);
    }
    
    
    public function deletedata()
    {
        $id = $this->input->post('id');
        $response = $this->cabang->deletedata($id);
        echo json_encode($response);
    }
    
    public function savedata()
    {
        $id = $this->input->post('id');
        $cabang = $this->input->post('cabang');
        
        $response = $this->cabang->savedata($id, $cabang);
        echo json_encode($response);
    }
    
    
    public function updatedata()
    {
        $id = $this->input->post('id');
        $cabang = $this->input->post('cabang');
        $response = $this->cabang->updatedata($id, $cabang);
        echo json_encode($response);
    }
    
    public function editdata()
    {
        $id = $this->input->post('id');
        $response = $this->cabang->editdata($id);
        echo json_encode($response);
    }
    
    
    function fetchdatatable()
    {

        $fetch_data = $this->cabang->make_datatables();
        $data = array();
        $nomor = 0;
        foreach ($fetch_data as $aRow) 
        {
            $nomor++;
            $row = array();
            $row[] = $nomor;
            $row[] = $aRow->nama_cabang;
            $row[] = '<center><button style="width:80px;" onclick="editdata('.$aRow->id.')"  class="btn btn-sm btn-outline-warning">Edit</button><br><button style="width:80px;margin-top:5px;" onclick="deletedata('.$aRow->id.')" class="btn btn-sm btn-outline-danger">Delete</button></center>';
            $data[] = $row;
            
        }

        $output = array(
            "draw"              => intval($_POST["draw"]),
            "recordsTotal"      => $this->cabang->get_all_data(),
            "recordsFiltered"   => $this->cabang->get_filtered_data(),
            "data"              => $data

        );

        echo json_encode($output);  
    }
    
}