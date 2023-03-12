    <?php

        $json = file_get_contents('php://input');
        $result = json_decode($json);
        
        $merchantCode = "D8875";
        $merchantKey = "b1816012772e5bf6b194ee669f88e332";
        
        $reference = $result->{'reference'}; 
        $signature = md5($merchantCode . $reference . $merchantKey);
    
        $itemsParam = array(
            'merchantCode' => $merchantCode,
            'signature' => $signature
        );
        
        class emp{}
        
        $params = array_merge((array)$result,$itemsParam);
        $params_string = json_encode($params);
        
       
        $url = 'https://passport.duitku.com/webapi/api/merchant/transactionStatus';
       
        
        $ch = curl_init();
    
        curl_setopt($ch, CURLOPT_URL, $url); 
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params_string);                                                                  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen($params_string))                                                                       
        );   
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    
        //execute post
        $request = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
        if($httpCode == 200)
        {
    	      echo $request;
        }
        else
            echo $httpCode;
    
?>