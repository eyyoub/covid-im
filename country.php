<?php 
if (!empty($_GET['country'])) {
$title = $_GET['country'];
require'init.php'; }
?>
<?php include('include/templates/header.php');?>
<?php
include('include/functions/functions.php');
include('select.php');
    if (empty($_GET['country'])) {
        redirect('countries.php');
    }
    if (!empty($_GET['country'])) {
        # code...
        $country = $_GET['country'];
        // some tips

        if ($country === 'Saudi Arabia') {
            # code...
            $country = 'Saudi-Arabia';
        }elseif ($country === 'Syrian Arab Republic') {
            # code...
            $country = 'syria';
        }elseif ($country === 'Libyan Arab Jamahiriya') {
            # code...
            $country = 'libya';
            
        }
        include('details.php');
        if ($country === 'UAE') {
            # code...
            $country = 'united-arab-emirates';
        }

        // END
        
        $curl = curl_init('https://api.covid19api.com/total/dayone/country/'.$country);


        curl_setopt_array($curl,[
            CURLOPT_CAINFO => __DIR__ . DIRECTORY_SEPARATOR . 'views/SSL/cerCovid19Api.cer',
            CURLOPT_RETURNTRANSFER => true
        ]);
        $data = curl_exec($curl);
        //var_dump($data);
        if(curl_getinfo($curl, CURLINFO_HTTP_CODE) === 404){
            redirect('index.php');
            //header('location:index.php');
        }else{
            if(curl_getinfo($curl, CURLINFO_HTTP_CODE) === 200){
        $data =  json_decode($data, true);
        $count = count($data);
            //=================
            for($i = 0; $i<$count; $i++){
                $phpConfirmed[] =$data[$i]['Confirmed'];
                }

            $jsonConfirmed = json_encode($phpConfirmed);

            for($j = 0; $j<$count; $j++){
                $phpDate[] =date('Y-m-d',strtotime($data[$j]['Date']));
                }

            $jsonDate = json_encode($phpDate);

            for($k = 0; $k<$count; $k++){
                $phpDeaths[] =$data[$k]['Deaths'];
                }

            $jsonDeaths = json_encode($phpDeaths);

            for($l = 0; $l<$count; $l++){
                $phpRecovered[] =$data[$l]['Recovered'];
                }
            
            $jsonRecovered = json_encode($phpRecovered);

            } 

        }

    }
?>
<div class="row">
    <div class="col-lg"></div>
    <div class="col-lg"></div>
    <div class="col-lg">
       <form action="" method="POST">
        <div class="input-group">
         
          <select name="country" class="custom-select" id="inputGroupSelect04">
            <?php for ($i=0; $i<$countC; $i++) { ?>
                <?php if ($dataC[$i]['country'] == $_GET['country']) { ?>
                    <option selected value="<?=$dataC[$i]['country']?>"><?=$dataC[$i]['country']?></option>
              <?php  }else{ ?>
              <option value="<?=$dataC[$i]['country']?>"><?=$dataC[$i]['country']?></option>
            <?php }}   ?>
            
          </select>
          <div class="input-group-append">
            <input  name="submit" value="Go" class="btn btn-outline-secondary" type="submit"></input>
            <?php 
              if(isset($_POST['submit'])){
                header('location:country.php?country='.$_POST['country']);
              }
            ?>
          </div>

        </div>   
      </form> 
    </div>
</div>
<div class="row">
  <div class="col">
    <div class="card border-secondary mb-2">
      <div class="card-body">
        <h5 class="card-title text-center text-uppercase">
          
          <img src="<?=$details['countryInfo']['flag']?>"  style="width: 33px; height: 33px; margin-top: -5px; margin-left: 15px; border-radius:6px; border:0.1px solid;">
          <?=$details['country']?> - covid19 coronavirus pandemic
        </h5>
          <div class="row">
            <div class="col-lg-3 col-sm-6">
              <div class="card border-warning mb-2">
                  <div class="card-body text-center text-warning">
                    <div class="row">
                        <div class="col">
                          <div class="h5">Today Cases</div>
                          <div class="h4"><?=number_format($details['todayCases'])?>
                          </div>
                        </div>
                    </div>
                  </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="card border-danger mb-2">
                <div class="card-body text-center" style="color: red;">
                  <div class="row">
                    <div class="col">
                      <div class="h5">Today Deaths</div>
                      <div class="h4"><?=number_format($details['todayDeaths'])?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="card border-success mb-2">
                <div class="card-body text-center text-success">
                  <div class="row">
                    <div class="col">
                      <div class="h5">Recovered</div>
                      <div class="h4"><?=number_format($details['recovered'])?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="card border-primary mb-2">
                <div class="card-body text-center text-primary">
                  <div class="row">
                    <div class="col">
                      <div class="h5">Total cases</div>
                      <div class="h4"><?=number_format($details['cases'])?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="card border-danger mb-2">
                <div class="card-body text-center text-danger ">
                  <div class="row">
                    <div class="col">
                      <div class="h5">Total deaths</div>
                      <div class="h4"><?=number_format($details['deaths'])?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="card border-info mb-2">
                <div class="card-body text-info text-center">
                  <div class="row">
                    <div class="col">
                      <div class="h5">Active cases</div>
                      <div class="h4"><?=number_format($details['active'])?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="card border-secondary mb-2">
                <div class="card-body text-secondary text-center">
                  <div class="row">
                    <div class="col">
                      <div class="h5">Total tests</div>
                      <div class="h5"><?=number_format($details['tests'])?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="card border-dark mb-2">
                <div class="card-body text-dark text-center ">
                  <div class="row">
                    <div class="col">
                      <div class="h5">Population</div>
                      <div class="h4"><?=number_format($details['population'])?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
    <div class="col-lg">
        <div class="card">
          <div class="card-header text-uppercase text-center">
            Coronavirus in <?=$_GET['country']?>
          </div>
          <div class="card-body">
            <h5 class="card-title text-center"></h5>
                 <canvas id="charCountry"> </canvas>
          </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg">
        <div class="card">
          <div class="card-header text-uppercase text-center">
            Total Coronavirus Cases in <?=$_GET['country']?>
          </div>
          <div class="card-body">
            <h5 class="card-title text-center">Total Cases</h5>
                 <canvas id="totalCases"> </canvas>
          </div>
        </div>
    </div>
    <div class="col-lg">
        <div class="card">
          <div class="card-header text-uppercase text-center">
            Daily New Cases in <?=$_GET['country']?>
          </div>
          <div class="card-body">
            <h5 class="card-title text-center">Daily New Cases</h5>
                 <canvas id="casesPerDay"> </canvas>
          </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg">
        <div class="card">
          <div class="card-header text-uppercase text-center">
            Total Coronavirus Deaths in <?=$_GET['country']?>
          </div>
          <div class="card-body">
            <h5 class="card-title text-center">Total Deaths </h5>
                 <canvas id="totalDeaths"> </canvas>
          </div>
        </div>
    </div>
     <div class="col-lg">
        <div class="card">
          <div class="card-header text-uppercase text-center">
            Daily New Deaths in <?=$_GET['country']?>
          </div>
          <div class="card-body">
            <h5 class="card-title text-center">Daily New Deaths</h5>
                 <canvas id="deathsPerDay"> </canvas>
          </div>
        </div>
    </div>
</div>
    <!--<div style="width: 900px; height: 500px;"> </div> -->

   
    
<?php include('include/templates/footer.php');?>
<script>
    var ctx = document.getElementById('charCountry').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?=$jsonDate; ?>,
            datasets: [{
                label: 'Deaths',
                data: <?=$jsonDeaths; ?>,
                backgroundColor: '#e74a3b',
                borderColor: '#e74a3b',
                borderWidth: 1,
                responsive: true,
                fill: false
            },
            {
                label: 'Confirmed',
                data: <?=$jsonConfirmed; ?>,
                backgroundColor: '#36b9cc',
                borderColor: '#36b9cc',
                borderWidth: 1,
                responsive: true,
                fill: false
            },
            {
                label: 'Recovered',
                data: <?=$jsonRecovered; ?>,
                backgroundColor: '#1cc88a',
                borderColor: '#1cc88a',
                borderWidth: 1,
                responsive: true,
                fill: false
            }
            ]
        },
        options: {
        }
    });
</script>
<script>
    var ctx = document.getElementById('casesPerDay').getContext('2d');
    var casesPerDay = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?=$country=='Palestine'?getDailyDateCases('state-of-palestine'):getDailyDateCases($country);?>,
            datasets: [{
                label: 'Cases per Day',
                data: <?=$country=='Palestine'?getDailyNewCases('state-of-palestine'):getDailyNewCases($country);?>,
                backgroundColor: '#00FFFF',
                borderColor: '#00FFFF',
                borderWidth: 1,
                responsive: true,
                fill: false
            }
            ]
        },
        options: {
        }
    });
</script>
<script>
    var ctx = document.getElementById('totalCases').getContext('2d');
    var totalCases = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?=$jsonDate; ?>,
            datasets: [{
                label: 'Total Cases',
                data: <?=$jsonConfirmed; ?>,
                backgroundColor: '#36b9cc',
                borderColor: '#36b9cc',
                borderWidth: 1,
                responsive: true,
                fill: false
            }
            ]
        },
        options: {
        }
    });
</script>
<script>
    var ctx = document.getElementById('totalDeaths').getContext('2d');
    var totalDeaths = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?=$jsonDate; ?>,
            datasets: [{
                label: 'Total Deaths',
                data: <?=$jsonDeaths; ?>,
                backgroundColor: '#e74a3b',
                borderColor: '#e74a3b',
                borderWidth: 1,
                responsive: true,
                fill: false
            }
            ]
        },
        options: {
        }
    });
</script>
<script>
    var ctx = document.getElementById('deathsPerDay').getContext('2d');
    var deathsPerDay = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?=$country=='Palestine'?getDailyDateDeaths('state-of-palestine'):getDailyDateDeaths($country);?>,
            datasets: [{
                label: 'Deaths per Day',
                data: <?=$country=='Palestine'?getDailyNewDeaths('state-of-palestine'):getDailyNewDeaths($country);?>,
                backgroundColor: '#f6c23e',
                borderColor: '#f6c23e',
                borderWidth: 1,
                responsive: true,
                fill: false
            }
            ]
        },
        options: {
        }
    });
    //#FF8C00
</script>
