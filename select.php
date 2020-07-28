<?php
          ob_start();
          $curl = curl_init('https://corona.lmao.ninja/v2/countries/ma,dz,uae,eg,tn,ps,jo,om,sdn,mr,dj,so,com,bh,sa,iraq,lebanon,libya,yemen,syria,iran,qatar,kuwait?yesterday&sort');


          curl_setopt_array($curl,[
              CURLOPT_CAINFO => __DIR__ . DIRECTORY_SEPARATOR . 'views/SSL/cer.cer',
              CURLOPT_RETURNTRANSFER => true
          ]);
          $dataC = curl_exec($curl);
          if(curl_getinfo($curl, CURLINFO_HTTP_CODE) === 200){
                    $dataC =  json_decode($dataC, true);
          $countC = count($dataC); }

?>