<?php
//'tes' => number_format(200 / 100, 2, ",", "."),
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class Testing extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        
        $this->load->helper("url");
        $this->load->database();
        $this->load->model('Driver_model');
        $this->load->model('Pelanggan_model');
        $this->load->model('Notification_model', 'notif');
        date_default_timezone_set('Asia/Jakarta');
    }

    function index_get()
    {
        $this->response("Api for delip!", 200);
    }
    
    function fcmkey_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }
        
        $raw = file_get_contents("php://input");
        $data = json_decode($raw);
        
        $response = $this->Pelanggan_model->getfcmkey();
        if($response)
        {
            $message = array("resultcode"=> "00", "data"=>$response);
        }
        else
        {
            $message = array("resultcode"=> "01", "data"=>[]);
        }
        
        $this->response($message, 200);
    }
    
    public function testfitur_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        $idcabang = $dec_data->id_cabang;
        
        $fitur = $this->Pelanggan_model->fiturhome($idcabang);
        
        $this->response($fitur, 200);
    }
    
    
    public function idpelanggan_post()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            return false;
        }

        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);
        
        $idtrans = $dec_data->id_transaksi;
        
        $response = $this->Driver_model->idpelanggan($idtrans);
        $title= "Order Diterima Driver";
        $pesan = "OK OTW sesuai Titik";
        
        
        $curl = $this->sendnotiftodriver($response, $title, $pesan);
        $message = array(
            "token" =>$response,
            "curl" =>$curl
        );
        
        $this->response($message, 200);
    }
    
    
    public function sendnotiftodriver($token, $title, $message)
  {    
        $data = array(
          'title' => $title,
          'message' => $message,
          'type' => 4
        );
        
        $senderdata = array(
          'data' => $data,
          'to' => $token
        );
    
        $headers = array(
          "Content-Type : application/json",
          "Authorization: key=" . keyfcm
        );
        
        $curl = curl_init();
    
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => json_encode($senderdata),
          CURLOPT_HTTPHEADER => $headers,
        ));
    
        $response = curl_exec($curl);
        $err = curl_error($curl);
    
        curl_close($curl);
        return $response;
  }
  
  public function test_post()
    {
        // persiapkan curl
        $ch = curl_init(); 
    
        // set url 
        curl_setopt($ch, CURLOPT_URL, "https://www.google.co.id/");
    
        // return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    
        // $output contains the output string 
        $output = curl_exec($ch); 
    
        // tutup curl 
        curl_close($ch);      
    
        // menampilkan hasil curl
        echo $output;
    }
    
    
    public function kirim_post()
    {
        
        $topic = "pelanggan";
        $title = "testing";
        $message = "Percobaan Pengiriman Pesan Melalui Firebase";
        $output = $this->notif->problem($title, $message, $topic);
        echo json_encode($output);
    }
  
  
    
    
}