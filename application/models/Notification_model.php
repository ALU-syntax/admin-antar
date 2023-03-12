<?php

class notification_model extends CI_model
{
  
  
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
        
       
  }
  
  
  
  public function notif_cancel_user($id_driver, $id_transaksi, $token_user)
  {

    $datanotif = array(
      'id_driver' => $id_driver,
      'id_transaksi' => $id_transaksi,
      'response' => '5',
      'type' => 1
    );
    $senderdata = array(
      'data' => $datanotif,
      'to' => $token_user
    );
    $headers = array(
      "Content-Type: application/json",
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

  public function notif_cancel_driver($id_transaksi, $token_driver)
  {

    $data = array(
      'id_transaksi' => $id_transaksi,
      'response' => '0',
      'type' => 1
    );
    $senderdata = array(
      'data' => $data,
      'to' => $token_driver
    );

    $headers = array(
      "Content-Type: application/json",
      'Authorization: key=' . keyfcm
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


  public function send_notif($title, $message, $topic)
  {

    $data = array(
      'title' => $title,
      'message' => $message,
      'type' => 4
    );
    
    $senderdata = array(
      'data' => $data,
      'to' => '/topics/'.$topic
    );

    $headers = array(
      'Content-Type : application/json',
      'Authorization: key=' . keyfcm
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

    $result = curl_exec($curl);
    
    $err = curl_error($curl);
    
    curl_close($curl);
    
     $message = array("res"=>$result, "err"=> $err);
        return $message;
    
     
  }
  
  
  public function sendNotification($title, $message, $topic){
    
    if(keyfcm != ""){
        ini_set("allow_url_fopen", "On");
        $data = 
        [
            "to" => '/topics/'.$topic,
            "data" => [
                "message" => $message,
                "title" => $title,
                'type' => 4
            ]
        ];

        $options = array(
            'http' => array(
                'method'  => 'POST',
                'content' => json_encode( $data ),
                'header'=>  "Content-Type: application/json\r\n" .
                            "Accept: application/json\r\n" . 
                            "Authorization:key=". keyfcm
            )
        );

        $context  = stream_context_create( $options );
        $result = file_get_contents( "https://fcm.googleapis.com/fcm/send", false, $context );
        return json_decode( $result );
    }
    
    return false;
}
  
  

  public function send_notif_topup($title, $id, $message, $method, $token)
  {

    $data = array(
      'title' => $title,
      'id' => $id,
      'message' => $message,
      'method' => $method,
      'type' => 3
    );
    $senderdata = array(
      'data' => $data,
      'to' => $token

    );

    $headers = array(
      'Content-Type : application/json',
      'Authorization: key=' . keyfcm
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
  }
  
  
  
  public function savenotif($title, $message, $topic, $id)
  {
      $insert = array(
        "tanggal" => date('Y-m-d H:i:s'),
        "judul" => $title,
        "tujuan" => $topic,
        "isi" => $message,
        "user" => $id
      );
      
      $this->db->insert('notif', $insert);
      
  }
  
  
  public function getnotiflist($type)
  {
     
      $this->db->where('tujuan', $type);
      $this->db->or_where('tujuan', 'ouride');
      
      $this->db->join('admin', 'admin.id = notif.user');
      $this->db->select('notif.*, admin.nama');
      $this->db->order_by('notif.id', 'desc');
      $query = $this->db->get('notif');
      
      return $query;
  }
  
  
  
}
