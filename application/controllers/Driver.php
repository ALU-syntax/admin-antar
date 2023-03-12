<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Driver extends CI_Controller
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
        $this->load->model('appsettings_model', 'app');
        $this->load->model('Pelanggan_model');
        $this->load->library('form_validation');
        $this->load->library('upload');
    }


    public function index()
    {
        $this->load->library('pagination');
        $con['base_url'] = base_url().'driver/index';
        $con['total_rows'] = $this->driver->totaldata();
        $con['per_page'] = 10;
        $con['full_tag_open'] = "<ul class='pagination'>";
        $con['full_tag_close'] = '</ul>';
        $con['num_tag_open'] = '<li>';
        $con['num_tag_close'] = '</li>';
        $con['cur_tag_open'] = '<li class="active"><a href="#">';
        $con['cur_tag_close'] = '</a></li>';
        $con['prev_tag_open'] = '<li>';
        $con['prev_tag_close'] = '</li>';
        $con['first_tag_open'] = '<li>';
        $con['first_tag_close'] = '</li>';
        $con['last_tag_open'] = '<li>';
        $con['last_tag_close'] = '</li>';

        $con['next_link'] = 'Next Page';
        $con['next_tag_open'] = '<li><i class="fa fa-long-arrow-right"></i>';
        $con['next_tag_close'] = '</li>';

        $con['prev_link'] = 'Previous Page';
        $con['prev_tag_open'] = '<li><i class="fa fa-long-arrow-left"></i>';
        $con['prev_tag_close'] = '</li>';
        
        $from = $this->uri->segment(3);
        
        
		$this->pagination->initialize($con);
		
		
        $getview['view'] = 'driver';
        $data['driver'] = $this->driver->getAlldriver();
        
        $this->load->view('includes/header');
        $this->load->view('drivers/index', $data);
        $this->load->view('includes/footer', $getview);
    }
    

    public function tracking_driver()
    {
        $getview['view'] = 'drivermap';
        $this->load->view('includes/header');
        $this->load->view('drivers/tracking_driver', $getview);
    }
    
    public function tracking_customer()
    {
        $getview['view'] = 'drivermap';
        $this->load->view('includes/header');
        $this->load->view('customer/tracking_customer', $getview);
    }

    public function detail($id)
    {
        $getview['view'] = 'detaildriver';
        $data['driver'] = $this->driver->getdriverbyid($id);
        $data['currency'] = $this->app->getappbyid();
        $data['countorder'] = $this->driver->countorder($id);
        $data['transaksi'] = $this->driver->transaksi($id);
        $data['wallet'] = $this->driver->wallet($id);
        $data['driverjob'] = $this->driver->driverjob();

        $this->load->view('includes/header');
        $this->load->view('drivers/detail', $data);
        $this->load->view('includes/footer', $getview);
    }

    public function ubahid()
    {

        $this->form_validation->set_rules('nama_driver', 'nama_driver', 'trim|prep_for_form');

        $this->form_validation->set_rules('email', 'email', 'trim|prep_for_form');
        $this->form_validation->set_rules('tempat_lahir', 'tempat_lahir', 'trim|prep_for_form');
        $this->form_validation->set_rules('tgl_lahir', 'tgl_lahir', 'trim|prep_for_form');
        $this->form_validation->set_rules('gender', 'gender', 'trim|prep_for_form');
        $this->form_validation->set_rules('alamat_driver', 'alamat_driver', 'trim|prep_for_form');


        if ($this->form_validation->run() == TRUE) {

            $phone = html_escape($this->input->post('phone', TRUE));
            $countrycode = html_escape($this->input->post('countrycode', TRUE));

            $data             = [
                'id'                    => html_escape($this->input->post('id', TRUE)),
                'nama_driver'           => html_escape($this->input->post('nama_driver', TRUE)),
                'email'                 => html_escape($this->input->post('email', TRUE)),
                'countrycode'           => html_escape($this->input->post('countrycode', TRUE)),
                'phone'                 => html_escape($this->input->post('phone', TRUE)),
                'no_telepon'            => str_replace("+", "", $countrycode) . $phone,
                'tempat_lahir'          => html_escape($this->input->post('tempat_lahir', TRUE)),
                'tgl_lahir'             => html_escape($this->input->post('tgl_lahir', TRUE)),
                'gender'                => html_escape($this->input->post('gender', TRUE)),
                'alamat_driver'         => html_escape($this->input->post('alamat_driver', TRUE))
            ];


            if (demo == TRUE) {
                $this->session->set_flashdata('demo', 'NOT ALLOWED FOR DEMO');
                redirect('driver/detail/' . $this->input->post('id', TRUE));
            } else {
                $id = html_escape($this->input->post('id', TRUE));
                $this->driver->ubahdataid($data);
                $this->session->set_flashdata('ubah', 'Driver ID Has Been Changed');
                redirect('driver/detail/' . $id);
            }
        } else {

            $data['driver'] = $this->driver->getdriverbyid($id);
            $data['currency'] = $this->app->getappbyid();
            $data['countorder'] = $this->driver->countorder($id);

            $this->load->view('includes/header');
            $this->load->view('drivers/detail', $data);
            $this->load->view('includes/footer');
        }
    }

    public function ubahkendaraan()
    {

        $this->form_validation->set_rules('jenis', 'jenis', 'trim|prep_for_form');
        $this->form_validation->set_rules('merek', 'merek', 'trim|prep_for_form');
        $this->form_validation->set_rules('tipe', 'tipe', 'trim|prep_for_form');
        $this->form_validation->set_rules('nomor_kendaraan', 'nomor_kendaraan', 'trim|prep_for_form');
        $this->form_validation->set_rules('warna', 'warna', 'trim|prep_for_form');


        if ($this->form_validation->run() == TRUE) {
            $data             = [

                'id_k'                      => html_escape($this->input->post('id_k', TRUE)),
                'jenis'                     => html_escape($this->input->post('jenis', TRUE)),
                'merek'                     => html_escape($this->input->post('merek', TRUE)),
                'tipe'                      => html_escape($this->input->post('tipe', TRUE)),
                'nomor_kendaraan'           => html_escape($this->input->post('nomor_kendaraan', TRUE)),
                'warna'                     => html_escape($this->input->post('warna', TRUE))
            ];

            $data2             = [

                'id'                        => html_escape($this->input->post('id', TRUE)),
                'job'                       => html_escape($this->input->post('jenis', TRUE)),

            ];


            if (demo == TRUE) {
                $this->session->set_flashdata('demo', 'NOT ALLOWED FOR DEMO');
                redirect('driver/detail/' . $this->input->post('id', TRUE));
            } else {
                $id = html_escape($this->input->post('id', TRUE));
                $this->driver->ubahdatakendaraan($data, $data2);
                $this->session->set_flashdata('ubah', 'Driver Vechile Has Been Changed');
                redirect('driver/detail/' . $id);
            }
        } else {

            $data['driver'] = $this->driver->getdriverbyid($id);
            $data['currency'] = $this->app->getappbyid();
            $data['countorder'] = $this->driver->countorder($id);

            $this->load->view('includes/header');
            $this->load->view('drivers/detail', $data);
            $this->load->view('includes/footer');
        }
    }

    public function ubahfoto()
    {

        @$_FILES['foto']['name'];

        if ($_FILES != NULL) {

            $config['upload_path']     = './images/fotodriver/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']         = '100000';
            $config['file_name']     = 'name';
            $config['encrypt_name']     = true;
            $this->upload->initialize($config);
            $this->upload->do_upload('foto');

            $id = $id = html_escape($this->input->post('id', TRUE));
            $data = $this->driver->getdriverbyid($id);


            if ($this->upload->do_upload('foto')) {
                if ($data['foto'] != 'noimage.jpg') {
                    $gambar = $data['foto'];
                    unlink('images/fotodriver/' . $gambar);
                }

                $foto = html_escape($this->upload->data('file_name'));
            } else {
                $foto = $data['foto'];
            }

            $data = [
                'foto'           => $foto,
                'id'               => html_escape($this->input->post('id', TRUE))
            ];

            if (demo == TRUE) {
                $this->session->set_flashdata('demo', 'NOT ALLOWED FOR DEMO');
                redirect('driver/detail/' . $id);
            } else {
                $this->driver->ubahdatafoto($data);
                $this->session->set_flashdata('ubah', 'Driver Picture Has Been Changed');
                redirect('driver/detail/' . $id);
            }
        } else {

            $data['driver'] = $this->driver->getdriverbyid($id);
            $data['currency'] = $this->app->getappbyid();
            $data['countorder'] = $this->driver->countorder($id);

            $this->load->view('includes/header');
            $this->load->view('drivers/detail', $data);
            $this->load->view('includes/footer');
        }
    }

    public function ubahpassword()
    {


        $this->form_validation->set_rules('password', 'password', 'trim|prep_for_form');

        if ($this->form_validation->run() == TRUE) {
            $id = $this->input->post('id');
            $data = $this->input->post('password');
            $dataencrypt = sha1($data);

            $data             = [
                'id'            => html_escape($this->input->post('id', TRUE)),
                'password'      => $dataencrypt
            ];

            if (demo == TRUE) {
                $this->session->set_flashdata('demo', 'NOT ALLOWED FOR DEMO');
                redirect('driver/detail/' . $id);
            } else {

                $this->driver->ubahdatapassword($data);
                $this->session->set_flashdata('ubah', 'Driver Password Has Been Changed');
                redirect('driver/detail/' . $id);
            }
        } else {
            $data['driver'] = $this->driver->getdriverbyid($id);
            $data['currency'] = $this->app->getappbyid();
            $data['countorder'] = $this->driver->countorder($id);

            $this->load->view('includes/header');
            $this->load->view('drivers/detail', $data);
            $this->load->view('includes/footer');
        }
    }

    public function block($id)
    {
        $this->driver->blockdriverbyid($id);
        redirect('driver');
    }

    public function unblock($id)
    {
        $this->driver->unblockdriverbyid($id);
        redirect('driver');
    }

    public function ubahcard()
    {

        $this->form_validation->set_rules('no_ktp', 'no_ktp', 'trim|prep_for_form');
        $this->form_validation->set_rules('id_sim', 'id_sim', 'trim|prep_for_form');
        $this->form_validation->set_rules('id_sip', 'id_sip', 'trim|prep_for_form');

        $id = html_escape($this->input->post('id', TRUE));
        $data = $this->driver->getdriverbyid($id);

        if ($this->form_validation->run() == TRUE) {

            if (@$_FILES['foto_ktp']['name']) {

                $config['upload_path']     = './images/fotoberkas/ktp';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']         = '100000';
                $config['file_name']     = 'name';
                $config['encrypt_name']     = true;
                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto_ktp')) {
                    if ($data['foto_ktp'] != 'noimage.jpg') {
                        $gambar = $data['foto_ktp'];
                        if(file_exists('images/fotoberkas/ktp/'.$gambar))
                        {
                            unlink('images/fotoberkas/ktp/' . $gambar);    
                        }
                    }

                    $foto_ktp = html_escape($this->upload->data('file_name'));
                } else {
                    $foto_ktp = $data['foto_ktp'];
                }
            }
            
            
            if (@$_FILES['foto_sim']['name']) {

                $config['upload_path']     = './images/fotoberkas/sim';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']         = '100000';
                $config['file_name']     = 'name';
                $config['encrypt_name']     = true;
                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto_sim')) {
                    if ($data['foto_sim'] != 'noimage.jpg') {
                        $gambar = $data['foto_sim'];
                        if(file_exists('images/fotoberkas/sim/'.$gambar))
                        {
                            unlink('images/fotoberkas/sim/' . $gambar);    
                        }
                    }

                    $foto_sim = html_escape($this->upload->data('file_name'));
                } else {
                    $foto_sim = $data['foto_sim'];
                }
            }
            
            
            
            if (@$_FILES['foto_stnk']['name']) {

                $config['upload_path']     = './images/fotoberkas/stnk';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']         = '100000';
                $config['file_name']     = 'name';
                $config['encrypt_name']     = true;
                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto_stnk')) {
                    if ($data['foto_stnk'] != 'noimage.jpg') {
                        $gambar = $data['foto_stnk'];
                        if(file_exists('images/fotoberkas/stnk/'.$gambar))
                        {
                            unlink('images/fotoberkas/stnk/' . $gambar);    
                        }
                        
                    }

                    $foto_stnk = html_escape($this->upload->data('file_name'));
                } else {
                    $foto_stnk = $data['foto_stnk'];
                }
            }
            
            
            if (@$_FILES['foto_kendaraan']['name']) {

                $config['upload_path']     = './images/fotoberkas/kendaraan';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']         = '100000';
                $config['file_name']     = 'name';
                $config['encrypt_name']     = true;
                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto_kendaraan')) {
                    if ($data['foto_kendaraan'] != 'noimage.jpg') {
                        $gambar = $data['foto_kendaraan'];
                        if(file_exists('images/fotoberkas/kendaraan/'.$gambar))
                        {
                            unlink('images/fotoberkas/kendaraan/' . $gambar);    
                        }
                    }

                    $foto_kendaraan = html_escape($this->upload->data('file_name'));
                } else {
                    $foto_kendaraan = $data['foto_kendaraan'];
                }
            }
            
            

            $data = [
                'foto_ktp'           => $foto_ktp,
                'foto_sim'           => $foto_sim,
                'id_sim'           => html_escape($this->input->post('id_sim', TRUE)),
                'id'               => html_escape($this->input->post('id', TRUE))
            ];
            
            $data3 = [
                
                'foto_stnk'         => $foto_stnk,
                'foto_kendaraan' => $foto_kendaraan,
                'id'               => html_escape($this->input->post('id', TRUE))
            ];

            $data2 = [
                'no_ktp'           => html_escape($this->input->post('no_ktp', TRUE)),
                'id'               => html_escape($this->input->post('id', TRUE))
            ];
            

            if (demo == TRUE) {
                $this->session->set_flashdata('demo', 'NOT ALLOWED FOR DEMO');
                redirect('driver/detail/' . $id);
            } else {
                $this->driver->ubahdatacard($data, $data2, $data3);
                $this->session->set_flashdata('ubah', 'Driver Licence Has Been Changed');
                redirect('driver/detail/' . $id);
            }
        } else {
            $data['driver'] = $this->driver->getdriverbyid($id);
            $data['currency'] = $this->app->getappbyid();
            $data['countorder'] = $this->driver->countorder($id);

            $this->load->view('includes/header');
            $this->load->view('drivers/detail', $data);
            $this->load->view('includes/footer');
        }
    }
    
    

    public function hapus($id)
    {
        if (demo == TRUE) {
            $this->session->set_flashdata('demo', 'NOT ALLOWED FOR DEMO');
            redirect('driver/index');
        } else {
            $data = $this->driver->getdriverbyid($id);
            $gambar = $data['foto'];
            $gambarsim = $data['foto_sim'];
            $gambarktp = $data['foto_ktp'];
            unlink('images/fotodriver/' . $gambar);
            unlink('images/fotoberkas/ktp/' . $gambarktp);
            unlink('images/fotoberkas/sim/' . $gambarsim);
            $this->session->set_flashdata('hapus', 'Driver Has Been Deleted');
            $this->driver->hapusdriverbyid($id);

            redirect('driver');
        }
    }

    public function tambah()
    {

        $phone = html_escape($this->input->post('phone', TRUE));
        $email = html_escape($this->input->post('email', TRUE));
        $this->form_validation->set_rules('nama_driver', 'nama_driver', 'trim|prep_for_form');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|prep_for_form|is_unique[driver.phone]');
        $this->form_validation->set_rules('email', 'Email', 'trim|prep_for_form|is_unique[driver.email]');
        $this->form_validation->set_rules('password', 'password', 'trim|prep_for_form');

        if ($this->form_validation->run() == TRUE) {

            if (@$_FILES['foto']['name']) {

                $config['upload_path']     = './images/fotodriver/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']         = '100000';
                $config['file_name']     = 'name';
                $config['encrypt_name']     = true;
                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto')) {

                    $foto = html_escape($this->upload->data('file_name'));
                } else {
                    $foto = 'noimage.jpg';
                }
            }

            if ($this->form_validation->run() == TRUE) {
                if (@$_FILES['foto_sim']['name']) {

                    $config['upload_path']     = './images/fotoberkas/sim';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size']         = '100000';
                    $config['file_name']     = 'name';
                    $config['encrypt_name']     = true;
                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('foto_sim')) {

                        $fotosim = html_escape($this->upload->data('file_name'));
                    } else {
                        $fotosim = 'noimage.jpg';
                    }
                }
            }
            
              if ($this->form_validation->run() == TRUE) {
                if (@$_FILES['foto_sip']['name']) {

                    $config['upload_path']     = './images/fotoberkas/sip';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size']         = '100000';
                    $config['file_name']     = 'name';
                    $config['encrypt_name']     = true;
                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('foto_sip')) {

                        $fotosip = html_escape($this->upload->data('file_name'));
                    } else {
                        $fotosip = 'noimage.jpg';
                    }
                }
            }

            if ($this->form_validation->run() == TRUE) {
                if (@$_FILES['foto_ktp']['name']) {

                    $config['upload_path']     = './images/fotoberkas/ktp';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size']         = '100000';
                    $config['file_name']     = 'name';
                    $config['encrypt_name']     = true;
                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('foto_ktp')) {

                        $fotoktp = html_escape($this->upload->data('file_name'));
                    } else {
                        $fotoktp = 'noimage.jpg';
                    }
                }
            }


            $countrycode = html_escape($this->input->post('countrycode', TRUE));
            $id = 'D' . time();


            $datasignup             = [

                'id'                        => $id,
                'phone'                     => html_escape($this->input->post('phone', TRUE)),
                'countrycode'               => html_escape($this->input->post('countrycode', TRUE)),
                'tgl_lahir'                 => html_escape($this->input->post('tgl_lahir', TRUE)),
                'reg_id'                    => 'R' . time(),
                'foto'                      => $foto,
                'password'                   => sha1(time()),
                'nama_driver'               => html_escape($this->input->post('nama_driver', TRUE)),
                'no_telepon'                => str_replace("+", "", $countrycode) . $phone,
                'email'                     => html_escape($this->input->post('email', TRUE)),
                'gender'                    => html_escape($this->input->post('gender', TRUE)),
                'alamat_driver'             => html_escape($this->input->post('alamat_driver', TRUE)),
                'job'                       => html_escape($this->input->post('job', TRUE)),
                'no_ktp'                    => html_escape($this->input->post('no_ktp', TRUE))

            ];



            $datakendaraan             = [

                'merek'                     => html_escape($this->input->post('merek', TRUE)),
                'tipe'                      => html_escape($this->input->post('tipe', TRUE)),
                'warna'                     => html_escape($this->input->post('warna', TRUE)),
                'nomor_kendaraan'           => html_escape($this->input->post('nomor_kendaraan', TRUE))

            ];

            $databerkas             = [

                'id_driver'                 => $id,
                'foto_sim'                  => $fotosim,
                'foto_sip'                  => $fotosip,
                'foto_ktp'                  => $fotoktp,
                'id_sip'                    => html_escape($this->input->post('id_sip', TRUE)),
                'id_sim'                    => html_escape($this->input->post('id_sim', TRUE))

            ];
            if (demo == TRUE) {
                $this->session->set_flashdata('demo', 'NOT ALLOWED FOR DEMO');
                redirect('driver/tambah');
            } else {

                $this->driver->signup($datasignup, $datakendaraan, $databerkas);
                $this->session->set_flashdata('tambah', 'Driver Has Been Added');
                redirect('newregistration/index');
            }
        } else {
            $data['driverjob'] = $this->driver->driverjob();
            $this->load->view('includes/header');
            $this->load->view('drivers/tambahdriver', $data);
            $this->load->view('includes/footer');
        }
        // }

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
            $this->db->where('id', $a->wilayah);
            $qrc = $this->db->get('list_cabang');
            $qc = $qrc->row();
            if($qrc->num_rows() > 0){
                $ccbg = $qc->nama_cabang;    
            } else{
                $ccbg = '';
            }   
            
            $nomor++;
            $row = array();
            $row[] = $nomor;
            $row[] = $a->id;
            $row[] = '<img class="round" style="width: 40px; height: 40px;" src="'.base_url('images/fotodriver/') . $a->foto.'">';
            $row[] = $a->nama_driver;
            $row[] = $ccbg;
            $row[] = $a->no_telepon;
            $row[] = number_format($a->rating, 1);
            $row[] = $a->driver_job;
            if($a->status == 3) 
            {
                $row[] = '<label class="badge badge-dark">Banned</label>';
            }
            else if($a->status == 0) 
            {
                $row[] = '<label class="badge badge-secondary text-dark">Pendaftar baru</label>';
            }
            else
            {
                if($a->status_job == 1)
                {
                    $row[] = '<label class="badge badge-info">Aktif</label>'; 
                }
                if($a->status_job == 2)
                {
                    $row[] = '<label class="badge badge-primary">Pickup</label>';
                }
                if($a->status_job == 3)
                {
                    $row[] = '<label class="badge badge-success">work</label>';
                }
                if($a->status_job == 4 )
                {
                    $row[] = '<label class="badge badge-warning">Non Aktif</label>';
                }
                if($a->status_job == 5 )
                {
                    $row[] = '<label class="badge badge-danger">Keluar</label>';
                }
                
                if($a->status_job == ''){
                    $row[] = '<label class="badge badge-danger">Dumped</label>';
                }
                
            }
            
             $ac = '';
             $ac .= '<span class="mr-1"><a href="'.base_url().'driver/detail/'.$a->id.'">';
             $ac .= '<i class="feather icon-eye text-success"></i></a></span>';
            
             if ($a->status != 0) 
             {
                if ($a->status != 3) 
                { 
                    $ac .= '<span class="action-edit mr-1">';
                    $ac .= '<a href="'.base_url().'driver/block/'.$a->id.'">';
                    $ac .= '<i class="feather icon-unlock text-info"></i></a></span>';
                }
                else 
                { 
                    $ac .='<span class="action-edit mr-1">';
                    $ac .= '<a href="'.base_url().'driver/unblock/'.$a->id.'">';
                    $ac .= '<i class="feather icon-lock text-info"></i></a></span>';
                }
            }
            
            $ac .= '<span class="action-edit mr-1"><a onclick="return confirm ("Are You Sure?")" href="'.base_url().'driver/hapus/'.$a->id.'">';
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
