<?php $title="Coronavirus in Arab countries";
require'init.php';
?>
<?php include('include/templates/header.php');?>
<?php include ('include/functions/functions.php');?>
<?php 
if (!empty($_GET['yesterday']) && ($_GET['yesterday'] === 'True')) {
            include('views/yesterday.view.php');
          }else{
            include('views/today.view.php');
          }
?>
<?php include('include/templates/footer.php');?>
coronavirus in Arab countries