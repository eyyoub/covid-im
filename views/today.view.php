<?php
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
          <div class="col-lg-4">
            <div class="card">
              <div class="card-body">
               <!-- Début -->
                  <div class="row"> 
                    <div class="col">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title text-center" >
                            <img src="include/img/icon/world.png"  style="width: 33px; height: 33px; margin-top: -5px; border-radius:6px;">
                            World
                          </h5>
                          <div class="row">
                            <div class="col-lg-12 card-text">
                              <div class="font-weight-bold text-center  text-uppercase">Total Cases</div>
                              <div class="h5 text-center font-weight-bold text-primary"><?=getGlobal(0);?>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              <div class="font-weight-bold text-center  text-uppercase">Deaths</div>
                              <div class="h5 text-center font-weight-bold text-danger"><?=getGlobal(1);?>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              <div class="font-weight-bold text-center  text-uppercase">Recovred</div>
                              <div class="h5 text-center font-weight-bold text-success"><?=getGlobal(2);?>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col text-center" style="margin-top: 5px;">
                              <a  href="world.php" class="btn btn-warning">
                              More statistics
                            </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                 <!-- Fin -->
              </div>
            </div>
          </div>
        <?php
        if($data === false){
            var_dump(curl_error($curl));

        }else{
            if(curl_getinfo($curl, CURLINFO_HTTP_CODE) === 200){
                $data =  json_decode($data, true);
                $count = count($data);
                
        for($i = 0; $i<$count; $i++){?>
        <div class="col-lg-4">
            <div class="card">
              <div class="card-body">
               <!-- Début -->
                  <div class="row"> 
                    <div class="col">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title text-center" ><img src="<?=$data[$i]['countryInfo']['flag']?>"  style="width: 33px; height: 33px; margin-top: -5px; border-radius:6px; border:0.1px solid;"> <?=$data[$i]['country']?>
                          </h5>
                          <div class="row">
                            <div class="col-lg-12 card-text">
                              <div class="font-weight-bold text-center  text-uppercase">Total Cases</div>
                              <div class="h5 text-center font-weight-bold text-primary"><?=number_format($data[$i]['cases'])?></div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              <div class="font-weight-bold text-center  text-uppercase">Today Cases</div>
                              <div class="h5 text-center font-weight-bold text-warning"><?=number_format($data[$i]['todayCases'])?></div>
                            </div>
                            <div class="col">
                              <div class="font-weight-bold text-center  text-uppercase">Today Deaths</div>
                              <div class="h5 text-center font-weight-bold" style="color: red;"><?=number_format($data[$i]['todayDeaths'])?></div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              <div class="font-weight-bold text-center  text-uppercase">Deaths</div>
                              <div class="h5 text-center font-weight-bold text-danger"><?=number_format($data[$i]['deaths'])?></div>
                            </div>
                            <div class="col">
                              <div class="font-weight-bold text-center  text-uppercase">Recovred</div>
                              <div class="h5 text-center font-weight-bold text-success"><?=number_format($data[$i]['recovered'])?></div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col text-center" style="margin-top: 5px;">
                              <a  href="country.php?country=<?=$data[$i]['country']?>" class="btn btn-warning">
                              More statistics
                            </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                 <!-- Fin -->
              </div>
            </div>
        </div>
      <?php }}} ?>
</div>