<?php $title = "Arab Countries";
require'init.php';
?>
<?php include('include/templates/header.php');?>
<?php 
if (!empty($_GET['yesterday']) && ($_GET['yesterday'] === 'True')) {
            include('views/yesterdayCountry.view.php');
          }else{
            include('views/todayCountry.view.php');
          }
?>
<?php include('include/templates/footer.php');?>