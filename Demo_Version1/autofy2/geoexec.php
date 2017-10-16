
<?php



function send($sms, $to) {
    
        $sms = urlencode($sms);
      
            $url = 'http://sms.safechaser.com/httpapi/httpapi?token=a917e2ac067a1a6c6d4c40bdd9c47c6d&sender=EYAUTO&number='.$to.'&route=2&type=1&sms='.$sms;
        
            echo $url;
            
            $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 50);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 50);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $datares = curl_exec($ch);
        curl_close($ch);
        return $datares;
    }

    
    
    
    
  function getaddress($lat,$lng)
  {
     $url = 'https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyAHyEyA84oRlSRJKLngGik6XSn42dCQLJQ&latlng='.trim($lat).','.trim($lng).'&sensor=false';
     echo $url;
     $json = @file_get_contents($url);
     $data=json_decode($json);
     $status = $data->status;
     if($status=="OK")
     {
       return $data->results[0]->formatted_address;
     }
     else
     {
       return false;
     }
  }

  $lat= $_POST['lat1']; //latitude
  $lng= $_POST['long2']; //longitude
  
  
  
  $address= getaddress($lat,$lng);
  if($address)
  {
    echo $address;
    
    
    
    
$mob=$_POST['phone'];
$msg="Hai may location is https://maps.google.com/maps?q=".$lat.",".$lng."+(My+Point)&z=14&ll=".$lat.",".$lng ;
//send($msg,$mob);
    
  }
  else
  {
    echo "Not found";
  }
?>