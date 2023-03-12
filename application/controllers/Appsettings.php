<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Appsettings extends CI_Controller
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
        $this->load->library('form_validation');
        $this->load->model('appsettings_model', 'app');
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
        $getview['view'] = 'appsettings';
        $this->CekSuper();
        $data['appsettings'] = $this->app->getappbyid();
        $data['transfer'] = $this->app->gettransfer();

        $this->load->view('includes/header');
        $this->load->view('appsettings/index', $data);
        $this->load->view('includes/footer', $getview);
    }

    public function emailsetting()
    {
        $getview['view'] = 'appsettings';
        $this->CekSuper();
        $data['appsettings'] = $this->app->getappbyid();
        $data['transfer'] = $this->app->gettransfer();

        $this->load->view('includes/header');
        $this->load->view('appsettings/settingemail', $data);
        $this->load->view('includes/footer', $getview);
    }

    public function smtpsetting()
    {
        $getview['view'] = 'appsettings';
        $this->CekSuper();
        $data['appsettings'] = $this->app->getappbyid();
        $data['transfer'] = $this->app->gettransfer();

        $this->load->view('includes/header');
        $this->load->view('appsettings/settingsmtp', $data);
        $this->load->view('includes/footer', $getview);
    }   

    public function mobilepulsasetting()
    {
        $getview['view'] = 'appsettings';
        $this->CekSuper();
        $data['appsettings'] = $this->app->getappbyid();
        $data['transfer'] = $this->app->gettransfer();

        $this->load->view('includes/header');
        $this->load->view('appsettings/settingmobile', $data);
        $this->load->view('includes/footer', $getview);
    } 

    public function banktransfersetting()
    {
        $getview['view'] = 'appsettings';
        $this->CekSuper();
        $data['appsettings'] = $this->app->getappbyid();
        $data['transfer'] = $this->app->gettransfer();

        $this->load->view('includes/header');
        $this->load->view('appsettings/settingbanktrf', $data);
        $this->load->view('includes/footer', $getview);
    }

    public function ubahbank($id)
    {
        $this->form_validation->set_rules('nama_bank', 'nama_bank', 'trim|prep_for_form');
        $this->form_validation->set_rules('rekening_bank', 'rekening_bank', 'trim|prep_for_form');
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']     = './images/bank/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']         = '20000';
            $config['file_name']     = time();
            $config['encrypt_name']     = true;
            $this->load->library('upload', $config);
            $dataget = $this->app->getbankid($id);

            if ($this->upload->do_upload('image_bank')) {
                if ($dataget['image_bank'] != 'noimage.jpg') {
                    $gambar = $dataget['image_bank'];
                    unlink('./images/bank/' . $gambar);
                }
                $gambar = $dataget['image_bank'];
                unlink('./images/bank/' . $gambar);
                $app_logo = html_escape($this->upload->data('file_name'));
            } else {
                $app_logo = $dataget['image_bank'];
            }

            $data = [
                'nama_bank' => html_escape($this->input->post('nama_bank', TRUE)),
                'rekening_bank' => html_escape($this->input->post('rekening_bank', TRUE)),
                'status_bank' => html_escape($this->input->post('status_bank', TRUE)),
                'image_bank' => $app_logo
            ];

            if (demo == TRUE) {
                $this->session->set_flashdata('demo', 'TIDAK DI IZINKAN!!');
                redirect('appsettings/index');
            } else {

                $this->app->ubahdatarekening($data, $id);
                $this->session->set_flashdata('ubah', 'Infomrasi aplikasi berhasil di ubah');
                redirect('appsettings');
            }
        }
    }

    public function hapusbank($id)
    {
        if (demo == TRUE) {
            $this->session->set_flashdata('demo', 'TIDAK DI IZINKAN!!');
            redirect('appsettings/index');
        } else {
            $dataget = $this->app->getbankid($id);
            $gambar = $dataget['image_bank'];
            unlink('./images/bank/' . $gambar);
            $this->app->hapusrekening($id);
            $this->session->set_flashdata('ubah', 'Informasi aplikasi berhasil di ubah');
            redirect('appsettings');
        }
    }

    public function adddatabank()
    {
        $this->form_validation->set_rules('nama_bank', 'nama_bank', 'trim|prep_for_form');
        $this->form_validation->set_rules('nama_pemilik', 'nama_pemilik', 'trim|prep_for_form');
        $this->form_validation->set_rules('rekening_bank', 'rekening_bank', 'trim|prep_for_form');
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']     = './images/bank/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']         = '10000';
            $config['file_name']     = time();
            $config['encrypt_name']     = true;
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image_bank')) {
                $app_logo = html_escape($this->upload->data('file_name'));
            }

            $data = [
                'nama_bank' => html_escape($this->input->post('nama_bank', TRUE)),
                'nama_pemilik' => html_escape($this->input->post('nama_pemilik', TRUE)),
                'rekening_bank' => html_escape($this->input->post('rekening_bank', TRUE)),
                'status_bank' => html_escape($this->input->post('status_bank', TRUE)),
                'image_bank' => $app_logo
            ];

            if (demo == TRUE) {
                $this->session->set_flashdata('demo', 'ANDA TIDAK DI IZINKAN MERUBAH');
                redirect('appsettings/index');
            } else {

                $this->app->adddatarekening($data);
                $this->session->set_flashdata('ubah', 'Informasi aplikasi berhasil diubah');
                redirect('appsettings');
            }
        }
    }

    public function ubahapp()
    {


        $this->form_validation->set_rules('app_email', 'app_email', 'trim|prep_for_form');
        $this->form_validation->set_rules('app_website', 'app_website', 'trim|prep_for_form');
        $this->form_validation->set_rules('app_linkgoogle', 'app_linkgoogle', 'trim|prep_for_form');
        $this->form_validation->set_rules('app_currency', 'app_currency', 'trim|prep_for_form');

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']     = './asset/images/icon/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']         = '10000';
            $config['file_name']     = 'name';
            $config['encrypt_name']     = true;
            $this->load->library('upload', $config);
            $data = $this->app->getappbyid();


            if ($this->upload->do_upload('app_logo')) {
                if ($data['app_logo'] != 'noimage.jpg') {
                    $gambar = $data['app_logo'];
                    unlink('asset/images/icon/' . $gambar);
                }

                $app_logo = html_escape($this->upload->data('file_name'));
            } else {
                $app_logo = $data['app_logo'];
            }

            $data             = [
                'app_logo'                    => $app_logo,
                'app_email'                    => html_escape($this->input->post('app_email', TRUE)),
                'app_website'                => html_escape($this->input->post('app_website', TRUE)),
                'app_privacy_policy'        => $this->input->post('app_privacy_policy', TRUE),
                'app_aboutus'                => $this->input->post('app_aboutus', TRUE),
                'app_address'                => $this->input->post('app_address'),
                'app_linkgoogle'            => html_escape($this->input->post('app_linkgoogle', TRUE)),
                'app_name'                  => html_escape($this->input->post('app_name', TRUE)),
                'app_contact'                  => html_escape($this->input->post('app_contact', TRUE)),
                'app_currency'                => html_escape($this->input->post('app_currency', TRUE))
            ];

            if (demo == TRUE) {
                $this->session->set_flashdata('demo', 'TIDAK DI IZINKAN!!');
                redirect('appsettings/index');
            } else {

                $this->app->ubahdataappsettings($data);
                $this->session->set_flashdata('ubah', 'Informasi aplikasi berhasil diubah');
                redirect('appsettings');
            }
        } else {

            $data['appsettings'] = $this->app->getappbyid();
            $getview['view'] = 'appsettings';
            $this->load->view('includes/header');
            $this->load->view('appsettings/index', $data);
            $this->load->view('includes/footer',$getview);
        }
    }

    public function ubahemail()
    {

        $this->form_validation->set_rules('email_subject', 'email_subject', 'trim|prep_for_form');
        $this->form_validation->set_rules('email_subject_confirm', 'email_subject', 'trim|prep_for_form');

        if ($this->form_validation->run() == TRUE) {
            $data             = [
                'email_subject'                    => html_escape($this->input->post('email_subject', TRUE)),
                'email_subject_confirm'                    => html_escape($this->input->post('email_subject_confirm', TRUE)),
                'email_text1'                    => $this->input->post('email_text1'),
                'email_text2'                    => $this->input->post('email_text2'),
                'email_text3'                    => $this->input->post('email_text3'),
                'email_text4'                    => $this->input->post('email_text4')
            ];


            if (demo == TRUE) {
                $this->session->set_flashdata('demo', 'TIDAK DI IZINKAN!!');
                redirect('appsettings/emailsetting');
            } else {

                $this->app->ubahdataemail($data);
                $this->session->set_flashdata('ubah', 'Email berhasil di ubah');
                redirect('appsettings/emailsetting');
            }
        } else {

            $data['appsettings'] = $this->app->getappbyid();
            $getview['view'] = 'appsettings';
            $this->load->view('includes/header');
            $this->load->view('appsettings/settingemail', $data);
            $this->load->view('includes/footer',$getview);
        }
    }

    public function ubahsmtp()
    {

        $this->form_validation->set_rules('smtp_host', 'smtp_host', 'trim|prep_for_form');
        $this->form_validation->set_rules('smtp_port', 'smtp_port', 'trim|prep_for_form');
        $this->form_validation->set_rules('smtp_username', 'smtp_username', 'trim|prep_for_form');
        $this->form_validation->set_rules('smtp_password', 'smtp_password', 'trim|prep_for_form');
        $this->form_validation->set_rules('smtp_form', 'smtp_form', 'trim|prep_for_form');
        $this->form_validation->set_rules('smtp_secure', 'smtp_secure', 'trim|prep_for_form');

        if ($this->form_validation->run() == TRUE) {
            $data             = [
                'smtp_host'                        => html_escape($this->input->post('smtp_host', TRUE)),
                'smtp_port'                        => html_escape($this->input->post('smtp_port', TRUE)),
                'smtp_username'                    => html_escape($this->input->post('smtp_username', TRUE)),
                'smtp_password'                    => html_escape($this->input->post('smtp_password', TRUE)),
                'smtp_from'                        => html_escape($this->input->post('smtp_from', TRUE)),
                'smtp_secure'                    => html_escape($this->input->post('smtp_secure', TRUE))
            ];


            if (demo == TRUE) {
                $this->session->set_flashdata('demo', 'ANDA TIDAK DI IZINKAN MERUBAH');
                redirect('appsettings/smtpsetting');
            } else {
                $this->app->ubahdatasmtp($data);
                $this->session->set_flashdata('ubah', 'SMTP Berhasil di ubah');
                redirect('appsettings/smtpsetting');
            }
        } else {

            $data['appsettings'] = $this->app->getappbyid();
            $getview['view'] = 'appsettings';
            $this->load->view('includes/header');
            $this->load->view('appsettings/settingsmtp', $data);
            $this->load->view('includes/footer', $getview);
        }
    }

    public function ubahmobilepulsa()
    {

        $this->form_validation->set_rules('api_password', 'api_password', 'trim|prep_for_form');
        $this->form_validation->set_rules('harga_pulsa', 'harga_pulsa', 'trim|prep_for_form');
        $this->form_validation->set_rules('api_token', 'api_token', 'trim|prep_for_form');
        $this->form_validation->set_rules('mp_status', 'mp_status', 'trim|prep_for_form');
        $this->form_validation->set_rules('mp_active', 'mp_active', 'trim|prep_for_form');

        if ($this->form_validation->run() == TRUE) {
            $data             = [
                'api_password'                    => html_escape($this->input->post('api_password', TRUE)),
                'harga_pulsa'                    => html_escape($this->input->post('harga_pulsa', TRUE)),
                'api_token'                    => html_escape($this->input->post('api_token', TRUE)),
                'mp_status'                        => html_escape($this->input->post('mp_status', TRUE)),
                'mp_active'                        => html_escape($this->input->post('mp_active', TRUE))
            ];
            if (demo == TRUE) {
                $this->session->set_flashdata('demo', 'ANDA TIDAK DI IZINKAN MERUBAH');
                redirect('appsettings/mobilepulsasetting');
            } else {


                $this->app->ubahdatamobilepulsa($data);
                $this->session->set_flashdata('ubah', 'Ayo pulsa berhasil di ubah');
                redirect('appsettings/mobilepulsasetting');
            }
        } else {

            $data['appsettings'] = $this->app->getappbyid();
            $getview['view'] = 'appsettings';
            $this->load->view('includes/header');
            $this->load->view('appsettings/index', $data);
            $this->load->view('includes/footer', $getview);
        }
    }

    // public function ubahayopesan()
    // {

    //     $this->form_validation->set_rules('api_password', 'api_password', 'trim|prep_for_form');
    //     $this->form_validation->set_rules('harga_pulsa', 'harga_pulsa', 'trim|prep_for_form');
    //     $this->form_validation->set_rules('api_token', 'api_token', 'trim|prep_for_form');

    //     if ($this->form_validation->run() == TRUE) {
    //         $data             = [
    //             'api_password'                    => html_escape($this->input->post('api_password', TRUE)),
    //             'harga_pulsa'                    => html_escape($this->input->post('harga_pulsa', TRUE)),
    //             'api_token'                => html_escape($this->input->post('api_token', TRUE))
    //         ];
    //         if (demo == TRUE) {
    //             $this->session->set_flashdata('demo', 'TIDAK DI IZINKAN!!');
    //             redirect('appsettings/index');
    //         } else {


    //             $this->app->ubahdataayopesan($data);
    //             $this->session->set_flashdata('ubah', 'api berhasil di ubah');
    //             redirect('appsettings');
    //         }
    //     } else {

    //         $data['appsettings'] = $this->app->getappbyid();

    //         $this->load->view('includes/header');
    //         $this->load->view('appsettings/index', $data);
    //         $this->load->view('includes/footer');
    //     }
    // }

    public function addbank()

    {
        $getview['view'] = 'appsettings';
        $this->load->view('includes/header');
        $this->load->view('appsettings/addbank');
        $this->load->view('includes/footer', $getview);
    }

    public function editbank($id)

    {
        $getview['view'] = 'appsettings';
        $data['transfer'] = $this->app->getbankid($id);
        $this->load->view('includes/header');
        $this->load->view('appsettings/editbank', $data);
        $this->load->view('includes/footer',$getview);
    } 
    
    public function ubahxendit()
    {
        
            $data             = [
                'api_keyxendit'                    => html_escape($this->input->post('api_keyxendit', TRUE)),
                'apikey_server'                    => html_escape($this->input->post('apikey_server', TRUE))
            ];


            if (demo == TRUE) { 
                $this->session->set_flashdata('demo', 'ANDA TIDAK DI IZINKAN MERUBAH');
                redirect('appsettings/index');
            } else {

                $this->app->ubahxendit($data);
                $this->session->set_flashdata('ubah', 'Data  Berhasil di ubah');
                redirect('appsettings');
            }
    }
    
}
