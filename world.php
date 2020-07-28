<?php $title="Coronavirus in the world";
require'init.php';
?>
<?php include('include/templates/header.php');?>
<?php include ('include/functions/functions.php');?>
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
<?php include('select.php');?>
<div class="row">
  <div class="col">
    <div class="card text-white bg-warning">
      <div class="card-body">
        <div class="row">
          <div class="col-lg-6 text-uppercase">
            <h5 class="card-title text-dark text-center text-lg-left">Coronavirus in Arab Countries</h5>
          </div>
          <div class="col-lg">
             <form action="" method="POST">
              <div class="input-group">
               
                <select name="country" class="custom-select" id="inputGroupSelect04">
                  <option selected>Choose...</option>
                  <?php for ($i=0; $i<$countC; $i++) { ?>
                    <option value="<?=$dataC[$i]['country']?>"><?=$dataC[$i]['country']?></option>
                  <?php }   ?>
                </select>
                <div class="input-group-append">
                  <input  name="submit" value="Show" class="btn btn-outline-secondary" type="submit"></input>
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
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg">
      <div class="card">
        <div class="card-header text-center">
               <h6>COVID-19 CORONAVIRUS PANDEMIC IN THE WORLD</h6>
        </div>
        <div class="card-body">
        
          <div class="row"> 
            <div class="col-lg bb">
             <div class="card bg-info text-white shadow">
              <div class="card-header text-center">
                  <h5>Coronavirus Cases:</h5>
              </div>
                    <div class="card-body text-center">
                      <h5> <?=getGlobal(0);?> </h5>
                    </div>
                  </div>
                </div>

            <div class="col-lg bb">
              <div class="card bg-danger text-white shadow">
                <div class="card-header text-center">
                  <h5>Deaths:</h5>
              </div>
                    <div class="card-body text-center">
                      <h5> <?=getGlobal(1);?> </h5>
                    </div>
                  </div>
            </div>

            <div class="col-lg bb">
              <div class="card bg-success text-white shadow">
                <div class="card-header text-center">
                  <h5>Recovered:</h5>
              </div>
                    <div class="card-body text-center">
                      <h5> <?=getGlobal(2);?> </h5>
                    </div>
                  </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-6">
      <div class="card">
        <div class="card-header text-center">
               <h6>TOTAL CASES IN THE WORLD</h6>
        </div>
        <div class="card-body">
          <h5 class="card-title text-center">Total Coronavirus Cases</h5>
               <canvas id="totalCases"> </canvas>
        </div>
      </div>
  </div>
  <div class="col-lg-6">
      <div class="card">
         <div class="card-header text-center">
               <h6>TOTAL DEATHS IN THE WORLD</h6>
        </div>
        <div class="card-body">
          <h5 class="card-title text-center">Total Coronavirus Deaths</h5>
               <canvas id="totalDeaths"> </canvas>
        </div>
      </div>
  </div>
</div>
<div class="row">
  <div class="col-lg">
      <div class="card">
        <div class="card-header text-center">
               <h6>ACTIVE CASES IN THE WORLD</h6>
        </div>
        <div class="card-body">
          <h5 class="card-title text-center">Coronavirus Active Cases</h5>
             <canvas id="WordActiveCases"> </canvas>
        </div>
      </div>
  </div>
</div>
<?php include('include/templates/footer.php');?>
<script>
    var ctx = document.getElementById('WordActiveCases').getContext('2d');
    var WordActiveCases = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?=getDateActiveCases();?>,
            datasets: [{
                label: 'Active Cases',
                data: <?=getWordActiveCases(); ?>,
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
</script>
<script>
    var ctx = document.getElementById('totalCases').getContext('2d');
    var totalCases = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?=getDateWordCases();?>,
            datasets: [{
                label: 'Total Cases',
                data: <?=getWordCases(); ?>,
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
            labels: <?=getDateTotalDeaths();?>,
            datasets: [{
                label: 'Total Deaths',
                data: <?=getTotalDeaths(); ?>,
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