<?php
//$curl = curl_init('https://corona.lmao.ninja/v2/countries?yesterday&sort');
//$curl = curl_init('https://corona.lmao.ninja/v2/countries?yesterday=true');
//https://corona.lmao.ninja/v2/countries/ma,dz,uae,egypt,tn,sa?yesterday&sort
//https://api.covid19api.com/summary
//SSL/cerCovid19Api.cer
$curl = curl_init('https://corona.lmao.ninja/v2/countries/ma,dz,uae,eg,tn,ps,jo,om,sdn,mr,dj,so,com,bh,sa,iraq,lebanon,libya,yemen,syria,iran,qatar,kuwait?yesterday&sort');


curl_setopt_array($curl,[
    CURLOPT_CAINFO => __DIR__ . DIRECTORY_SEPARATOR . 'SSL/cer.cer',
    CURLOPT_RETURNTRANSFER => true
]);
$data = curl_exec($curl);

?>

<div class="row">
	<div class="col-lg">
		<div class="card shadow mb-4">
            <div class="card-header py-3">
              <a href="countries.php" class="btn btn-primary">Today</a>
              <a href="countries.php?yesterday=True" class="btn btn-light">Yesterday</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                      <th>Flag</th>
                      <th>Country</th>
                      <th>Cases</th>
                      <th>New Cases</th>
                      <th>Deaths</th>
                      <th>New Deaths</th>
                      <th>Recovered</th>
                      <th>Active</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                      <th>Flag</th>
                      <th>Country</th>
                      <th>Cases</th>
                      <th>New Cases</th>
                      <th>Deaths</th>
                      <th>New Deaths</th>
                      <th>Recovered</th>
                      <th>Active</th>
                    </tr>
                </tfoot>
                <tbody style="font-weight: bold;">
                    <?php
            if($data === false){
                var_dump(curl_error($curl));

            }else{
                if(curl_getinfo($curl, CURLINFO_HTTP_CODE) === 200){
                    $data =  json_decode($data, true);

                    $count = count($data);
                    
            for($i = 0; $i<$count; $i++){ ?>
                    <tr>
                        <td><img src="<?=$data[$i]['countryInfo']['flag']?>"  style="width: 33px; height: 33px; margin-top: -5px; margin-left: 15px; border-radius:6px; border:0.1px solid;"></td>
                    <th scope="col"> <a href="country.php?country=<?=$data[$i]['country']?>"><?=$data[$i]['country']?></a></th>
                    <td> <?=number_format($data[$i]['cases'])?></td>
                    <td> <?=number_format($data[$i]['todayCases'])?></td>
                    <td> <?=number_format($data[$i]['deaths'])?></td>
                    <td> <?=number_format($data[$i]['todayDeaths'])?></td>
                    <td> <?=number_format($data[$i]['recovered'])?></td>
                    <td> <?=number_format($data[$i]['active'])?></td>
                    </tr>
               <?php } 
              
                    
                }
                
            }
?>
                  </tbody>
                </table>
              </div>
            </div>
        </div>
    </div>
</div>