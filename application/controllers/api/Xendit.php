<?php

class Xendit extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('appsettings_model', 'app');
    }
    
    public function data_post()
    {
        
        $model = $this->app->getappbyid();
        
    
        $data = json_decode(file_get_contents('php://input'), true);
        $key = $model['api_keyxendit']; //jika ganti xendit akun cukup ubah ini aja 
        $pass = "";
        if($data['ServerKey'] == $model['apikey_server']){ //dan ini untuk sisi authorization dari android request ke server kita "UkFKQU1BU1RFUlNFUlZFUg=="
    
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.xendit.co/ewallets",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => false,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => json_encode($data),
          CURLOPT_HTTPHEADER => array(
            "Authorization: Basic ".base64_encode("$key:$pass")."",
            "Content-Type: application/json",
            //"Cookie: nlbi_2182539=BeDEGL4nnQIMRSl/jjCKbQAAAACdtzIPLHKtA/1t0rshQlnG; visid_incap_2182539=T63r/YikR3SNAzVcIiMVuBJtRl8AAAAAQUIPAAAAAAAO48RqXhljt8XIX4HsIaBQ; incap_ses_1114_2182539=ilBwI4mA+ynuqcDyQrl1DxJtRl8AAAAApLvYahTdJBFGMhOzY0AX0A=="
          ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        echo $response;
        }else{
            echo json_encode(array(['msg'=> "Failed Key", 'code'=> 500]));   

        }
    }
}