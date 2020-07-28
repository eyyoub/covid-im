<?php
if ($country === 'Saudi-Arabia') {
  $curlDetails = curl_init('https://corona.lmao.ninja/v2/countries/sa?yesterday&sort');
}else{
  $curlDetails = curl_init('https://corona.lmao.ninja/v2/countries/'.$country.'?yesterday&sort');
}
curl_setopt_array($curlDetails,[
    CURLOPT_CAINFO => __DIR__ . DIRECTORY_SEPARATOR . 'views/SSL/cer.cer',
    CURLOPT_RETURNTRANSFER => true
]);
$details = curl_exec($curlDetails);
 if($details === false){
            header('location:inde.php');
        }else{
            if(curl_getinfo($curlDetails, CURLINFO_HTTP_CODE) === 200){
                $details =  json_decode($details, true);
              }
                }
?>