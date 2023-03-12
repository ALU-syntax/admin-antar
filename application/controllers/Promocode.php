<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Promocode extends CI_Controller
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
        $this->load->model('Promocode_model', 'promocode');
        $this->load->model('Service_model', 'fitur');
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
        $getview['view'] = 'sliderdata';
        $this->CekSuper();
        $data['promocode'] = $this->promocode->getallpromocode();

        $this->load->view('includes/header');
        $this->load->view('promocode/index',$data);
        $this->load->view('includes/footer', $getview);
    }
    
    public function customer_promo_index()
    {
        $getview['view'] = 'sliderdata';
        $this->CekSuper();
        
        $s_date = $this->uri->segment('3');
        $e_date = $this->uri->segment('4');
        
        $start_date = $s_date." 00:00:00";
        $end_date = $e_date." 23:59:59";
        
    
        $data['customer'] = $this->promocode->getCustomerList($start_date, $end_date);
        $data['awal'] = date('d-M-Y', strtotime($start_date));
        $data['akhir'] = date('d-M-Y', strtotime($end_date));
        $data['s_date'] = $start_date;
        $data['e_date'] = $end_date;
        
        $this->load->view('includes/header');
        $this->load->view('promocode/customer_promo',$data);
        $this->load->view('includes/footer', $getview);
    }
    
    public function jumat_index()
    {
        $getview['view'] = 'sliderdata';
        $this->CekSuper();
        
        $s_date = $this->uri->segment('3');
        
        $data['driver'] = $this->promocode->getPromoJumatList($s_date);
        $data['awal'] = date('d-M-Y', strtotime($s_date));
        $data['s_date'] = $s_date;
        $this->load->view('includes/header');
        $this->load->view('promocode/promojumat',$data);
        $this->load->view('includes/footer', $getview);
    }
    
    
    public function reguler_index()
    {
        $getview['view'] = 'sliderdata';
        $this->CekSuper();
        
        $s_date = $this->uri->segment('3');
        
        $data['driver'] = $this->promocode->getPromoRegulerList($s_date);
        $data['awal'] = date('d-M-Y', strtotime($s_date));
        $data['s_date'] = $s_date;
        $this->load->view('includes/header');
        $this->load->view('promocode/promoreguler',$data);
        $this->load->view('includes/footer', $getview);
    }
    
    
    public function topup_referal_index() 
    {
        $getview['view'] = 'sliderdata';
        $this->CekSuper();
        
        $data['nilai_topup'] = $this->promocode->getReferalValue();
        $this->load->view('includes/header');
        $this->load->view('promocode/referal', $data);
        $this->load->view('includes/footer', $getview);
    }
    
    public function customer_promo_list()
    {
        $start_date = $this->input->post('sdate');
        $end_date = $this->input->post('edate');
        $nilai = $this->input->post('nilai');
        $data = $this->promocode->getCustomerList($start_date, $end_date);
        if($data) 
        {
            $response = $this->promocode->update_free_saldo($data, $nilai);
        }
        echo json_encode($response);
    }
    
    
    public function jumat_promo_list()
    {
        $start_date = $this->input->post('sdate');
        $data = $this->promocode->getPromoJumatList($start_date);
        if($data) 
        {
            $response = $this->promocode->update_jumat_saldo($data);
            $this->session->set_flashdata('tambah', 'Promo Jumat Has Been Processed Successfully');
        }
        echo json_encode($response);
    }
    
    
    public function reguler_promo_list()
    {
        $start_date = $this->input->post('sdate');
        $data = $this->promocode->getPromoRegulerList($start_date);
        if($data) 
        {
            $response = $this->promocode->update_reguler_saldo($data);
            $this->session->set_flashdata('tambah', 'Promo Reguler Has Been Processed Successfully');
        }
        echo json_encode($response);
    }
    
    
    
    public function promojumat_isexist()
    {
        $tanggal = $this->input->post('sdate');
        $response = $this->promocode->promojumat_isexist($tanggal);
        echo json_encode($response);
    }
    
    public function promoreguler_isexist()
    {
        $tanggal = $this->input->post('sdate');
        $response = $this->promocode->promoreguler_isexist($tanggal);
        echo json_encode($response);
    }
    

    public function addpromocode()

    {
        
        $getview['view'] = 'addpromotioncode';
        $this->form_validation->set_rules('nama_promo', 'nama_promo', 'trim|prep_for_form');
        $this->form_validation->set_rules('kode_promo', 'kode_promo', 'trim|prep_for_form');
        $this->form_validation->set_rules('nominal_promo', 'nominal_promo', 'trim|prep_for_form');
        $this->form_validation->set_rules('type_promo', 'type_promo', 'trim|prep_for_form');
        $this->form_validation->set_rules('fitur', 'fitur', 'trim|prep_for_form');
        $this->form_validation->set_rules('status', 'status', 'trim|prep_for_form');

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']     = './images/promo/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']         = '10000';
            $config['file_name']     = 'name';
            $config['encrypt_name']     = true;
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image_promo')) {
                $gambar = html_escape($this->upload->data('file_name'));
            } else {
                $gambar = 'noimage.jpg';
            }

            if ($this->input->post('type_promo') == 'persen'){
                $nominal = html_escape($this->input->post('nominal_promo_persen', TRUE));
            } else {
                $nominal = str_replace(".","",html_escape($this->input->post('nominal_promo', TRUE)));
            }

            $data             = [
            'image_promo'                       => $gambar,
                'nama_promo'              => html_escape($this->input->post('nama_promo', TRUE)),
                'kode_promo'              => html_escape($this->input->post('kode_promo', TRUE)),
                'nominal_promo'              => $nominal,
                'type_promo'              => html_escape($this->input->post('type_promo', TRUE)),
                'expired'              => html_escape($this->input->post('expired', TRUE)),
                'fitur'                  => html_escape($this->input->post('fitur', TRUE)),
                'status'                       => html_escape($this->input->post('status', TRUE)),
            ];
            if (demo == TRUE) {
                $this->session->set_flashdata('demo', 'NOT ALLOWED FOR DEMO');
                redirect('promocode/addpromocode');
            } else {
                $cekpromo = $this->promocode->cekpromo($this->input->post('kode_promo'));
                if ($cekpromo->num_rows() > 0){

                    $this->session->set_flashdata('demo', 'Promotion code already exist');
                    redirect('promocode/addpromocode');
                }else{
                $this->promocode->addpromocode($data);
                $this->session->set_flashdata('tambah', 'Promotion Slider Has Been Added');
                redirect('promocode');
            }
            }
        } else {
            $data['fitur'] = $this->fitur->getallservice();
            $this->load->view('includes/header');
            $this->load->view('promocode/addpromocode', $data);
            $this->load->view('includes/footer', $getview);
        }
    }

    public function editpromocode($id)

    {
        $getview['view'] = 'addpromotioncode';
        $this->form_validation->set_rules('nama_promo', 'nama_promo', 'trim|prep_for_form');
        $this->form_validation->set_rules('kode_promo', 'kode_promo', 'trim|prep_for_form');
        $this->form_validation->set_rules('nominal_promo', 'nominal_promo', 'trim|prep_for_form');
        $this->form_validation->set_rules('type_promo', 'type_promo', 'trim|prep_for_form');
        $this->form_validation->set_rules('fitur', 'fitur', 'trim|prep_for_form');
        $this->form_validation->set_rules('status', 'status', 'trim|prep_for_form');
        $data['promo'] = $this->promocode->getpromobyid($id)->row_array();
        $data['fitur'] = $this->fitur->getallservice();
        
        if ($this->form_validation->run() == TRUE) {
            if ($this->input->post('type_promo') == 'persen'){
                $nominal = html_escape($this->input->post('nominal_promo_persen', TRUE));
            } else {
                $nominal = str_replace(".","",html_escape($this->input->post('nominal_promo', TRUE)));
            }

            $config['upload_path']     = './images/promo/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']         = '10000';
            $config['file_name']     = time();
            $config['encrypt_name']     = true;
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image_promo')) {
                unlink('images/promo/' . $this->promocode->getpromobyid($id)->row('image_promo'));
                $gambar = html_escape($this->upload->data('file_name'));
                $datainsert             = [
                    'id_promo'                  => html_escape($this->input->post('id_promo', TRUE)),
                    'image_promo'                       => $gambar,
                    'nama_promo'              => html_escape($this->input->post('nama_promo', TRUE)),
                    'kode_promo'              => html_escape($this->input->post('kode_promo', TRUE)),
                    'nominal_promo'              => $nominal,
                    'type_promo'              => html_escape($this->input->post('type_promo', TRUE)),
                    'expired'              => html_escape($this->input->post('expired', TRUE)),
                    'fitur'                  => html_escape($this->input->post('fitur', TRUE)),
                    'status'                       => html_escape($this->input->post('status', TRUE)),
                ];
            } else {
                $datainsert             = [
                    'id_promo'                  => html_escape($this->input->post('id_promo', TRUE)),
                    'nama_promo'              => html_escape($this->input->post('nama_promo', TRUE)),
                    'kode_promo'              => html_escape($this->input->post('kode_promo', TRUE)),
                    'nominal_promo'              => $nominal,
                    'type_promo'              => html_escape($this->input->post('type_promo', TRUE)),
                    'expired'              => html_escape($this->input->post('expired', TRUE)),
                    'fitur'                  => html_escape($this->input->post('fitur', TRUE)),
                    'status'                       => html_escape($this->input->post('status', TRUE)),
                ];
            }

            

            
            if (demo == TRUE) {
                $this->session->set_flashdata('demo', 'NOT ALLOWED FOR DEMO');
                $this->load->view('includes/header');
                $this->load->view('promocode/editpromocode', $data);
                $this->load->view('includes/footer',$getview);
            } else {
                $cekpromo = $this->promocode->cekpromo($this->input->post('kode_promo'));
                if ($cekpromo->num_rows() > 0 && $cekpromo->row_array()['id_promo'] != $this->input->post('id_promo')){
                    $this->session->set_flashdata('demo', 'Promotion code already exist');
                    $this->load->view('includes/header');
                    $this->load->view('promocode/editpromocode', $data);
                    $this->load->view('includes/footer',$getview);
                }else{
                $this->promocode->editpromocode($datainsert);
                $this->session->set_flashdata('tambah', 'Promotion code Has Been Changed');
                redirect('promocode');
            }
            }
        } else {
            
            $this->load->view('includes/header');
            $this->load->view('promocode/editpromocode', $data);
            $this->load->view('includes/footer', $getview);
        }
    }

    public function hapus($id)
    {
        $this->CekSuper();

        if (demo == TRUE) {
            $this->session->set_flashdata('demo', 'NOT ALLOWED FOR DEMO');
            redirect('promocode/index');
        } else {
            $data = $this->promocode->getpromocodeById($id);

            if ($data['image_promo'] != 'noimage.jpg') {
                $gambar = $data['image_promo'];
                unlink('images/promo/' . $gambar);
            }

            $this->promocode->hapuspromocodeById($id);
            $this->session->set_flashdata('hapus', 'Promo Code Has Been deleted');
            redirect('promocode');
        }
    }
    
    public function updateRefCharge()
    {
        $jumlah = $this->input->post('jumlah');
        $response = $this->promocode->updaterefcharge($jumlah);
        if($response) 
        {
             $this->session->set_flashdata('ubah', 'Sucess Update Data...!');
                    redirect('promocode/topup_referal_index');
        }
    }
    
    
    public function customer()
    {
        $getview['view'] = 'insentif';
        $this->CekSuper();
        $data['fitur'] = $this->promocode->fitur_insentif();

        $this->load->view('includes/header');
        $this->load->view('promocode/insentif', $data);
        $this->load->view('includes/footer', $getview);    
    }
    
    
    public function update_insentif_customer()
    {
        $id = $this->input->post('id');
        $harga = $this->input->post('harga');
        
        $response = $this->promocode->update_insentif_customer($id, $harga);
        echo json_encode($response);
        
    }
    
    
    
}