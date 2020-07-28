<?php
require 'simple_html_dom.php';
// This Function return the data of Daily New Cases of the country in parameter From url
if(!function_exists('getDailyNewCases')){

     function getDailyNewCases($country){
		$chartNember = 1;
		$url = 'https://www.worldometers.info/coronavirus/country/'.$country;
		// Daily new cases AND dDaily deaths Cases 
		$html = file_get_html($url);
		$TheData = '';
		$list = $html->find('div[class="row graph_row"]',$chartNember); // chart 1 et 4 only


		foreach($list->find('script') as $element){
		      
		        //echo $element->innertext;
		        $TheData .=$element->innertext;
		}
		$data_ar = explode(':', $TheData);

		$label = $data_ar[32];

		$label_ar = explode('[', $label);
		$date = $label_ar[1];

		$sepa1 = explode(']', $date);
		$sepa2 = $sepa1[0];
		$data = explode(',', $sepa2);
		$datajson = json_encode($data); 
		if ($datajson) {
			# code...
			return $datajson;
		}else{
			return 0;
		}
		
     }
  }

// This Function return the data of Daily New Deaths of the country in parameter From url

  if(!function_exists('getDailyNewDeaths')){

     function getDailyNewDeaths($country){
		$chartNember = 4;
		$url = 'https://www.worldometers.info/coronavirus/country/'.$country;
		// Daily new deaths
		$html = file_get_html($url);
		$TheData = '';
		$list = $html->find('div[class="row graph_row"]',$chartNember); // chart 1 et 4 only


		foreach($list->find('script') as $element){
		      
		        //echo $element->innertext;
		        $TheData .=$element->innertext;
		}
		$data_ar = explode(':', $TheData);

		$label = $data_ar[32];

		$label_ar = explode('[', $label);
		$date = $label_ar[1];

		$sepa1 = explode(']', $date);
		$sepa2 = $sepa1[0];
		$data = explode(',', $sepa2);
		$datajson = json_encode($data); 
		if ($datajson) {
			# code...
			return $datajson;
		}else{
			return 0;
		}
		
     }
  }

// This Function return the date of Daily New Cases of the country in parameter From url

if(!function_exists('getDailyDateCases')){

     function getDailyDateCases($country){
		$chartNember = 1;
		$url = 'https://www.worldometers.info/coronavirus/country/'.$country;
		$html = file_get_html($url);
		$TheData = '';
		$list = $html->find('div[class="row graph_row"]',$chartNember);


		foreach($list->find('script') as $element){
		      
		        $TheData .=$element->innertext;
		}
		$data_ar = explode(', ', $TheData);


		$label = $data_ar[1];
		$label_ar = explode(': ', $label);


		$date = $label_ar[8];
		$data = explode('"', $date);

		$count = count($data);
		for ($i=0; $i < $count-1 ; $i++) { 
			if (($data[$i] != '[') && ($data[$i] != ',') && ($data[$i] != ']')) {
				$dataclear[] = $data[$i];
			}
		}

		$datajson = json_encode($dataclear);
		if ($datajson) {
			return $datajson;
		}else{
			return 0;
		}
		
     }
  }

// This Function return the date of Daily New Deaths of the country in parameter From url

if(!function_exists('getDailyDateDeaths')){

     function getDailyDateDeaths($country){
		$chartNember = 4;
		$url = 'https://www.worldometers.info/coronavirus/country/'.$country;
		
		$html = file_get_html($url);
		$TheData = '';
		$list = $html->find('div[class="row graph_row"]',$chartNember); 


		foreach($list->find('script') as $element){

		        $TheData .=$element->innertext;

		}
		$data_ar = explode(', ', $TheData);


		$label = $data_ar[1];
		$label_ar = explode(': ', $label);


		$date = $label_ar[8];
		$data = explode('"', $date);

		$count = count($data);
		for ($i=0; $i < $count-1 ; $i++) { 

			if (($data[$i] != '[') && ($data[$i] != ',') && ($data[$i] != ']')) {

				$dataclear[] = $data[$i];

			}
		}

		$datajson = json_encode($dataclear);
		if ($datajson) {

			return $datajson;

		}else{
			return 0;
		}
		
     }
  }

// This Function return the data of Word Active cases
if(!function_exists('getWordActiveCases')){

     function getWordActiveCases(){
		$divtNember = 0;
		$url = 'https://www.worldometers.info/coronavirus';
		
		$html = file_get_html($url);
		$TheData = '';
		$list = $html->find('div[class="col-md-6"]',$divtNember);


		foreach($list->find('script') as $element){

		        $TheData .=$element->innertext;
		}

		$data_ar = explode('[', $TheData);

		$label = $data_ar[5];

		$label_ar = explode(']', $label);

		$data1 = $label_ar[0];
		$data = explode(',', $data1);
		$datajson = json_encode($data);

		if ($datajson) {

			return $datajson;

		}else{
			return 0;
		}
		
     }
  }

// This Function return the date of data Word Active cases

if(!function_exists('getDateActiveCases')){

     function getDateActiveCases(){
		$divtNember = 0;
		$url = 'https://www.worldometers.info/coronavirus';
		
		$html = file_get_html($url);
		$TheData = '';
		$list = $html->find('div[class="col-md-6"]',$divtNember);


		foreach($list->find('script') as $element){

		        $TheData .=$element->innertext;
		}

		$data_ar = explode('[', $TheData);

		$label = $data_ar[2];

		$label_ar = explode(']', $label);

		$data1 = $label_ar[0];
		$data = explode('"', $data1);
		$count = count($data);

		for ($i=0; $i < $count ; $i++) { 

				if (($data[$i] != ',') && $data[$i] != '') {

				$dataclear[] = $data[$i];

				}
		}
		
		$datajson = json_encode($dataclear);

		if ($datajson) {

			return $datajson;

		}else{
			return 0;
		}
		
     }
  }

 // This Function return the date of data Word  cases

if(!function_exists('getDateWordCases')){

     function getDateWordCases(){
		$divtNember =2;
		$url = 'https://www.worldometers.info/coronavirus';
		
		$html = file_get_html($url);
		$TheData = '';
		$list = $html->find('div[class="col-md-6"]',$divtNember);


		foreach($list->find('script') as $element){

		        $TheData .=$element->innertext;
		}

		$data_ar = explode('[', $TheData);

		$label = $data_ar[1];
		
		$label_ar = explode(']', $label);
		
		$data1 = $label_ar[0];
		$data = explode('"', $data1);
		$count = count($data);
	
		for ($i=0; $i < $count ; $i++) { 

				if (($data[$i] != ',') && $data[$i] != '') {

				$dataclear[] = $data[$i];

				}
		}
		
		$datajson = json_encode($dataclear);

		if ($datajson) {

			return $datajson;

		}else{
			return 0;
		}
		
     }
  }
// This Function return the data of Word cases
if(!function_exists('getWordCases')){

     function getWordCases(){
		$divtNember = 2;
		$url = 'https://www.worldometers.info/coronavirus';
		
		$html = file_get_html($url);
		$TheData = '';
		$list = $html->find('div[class="col-md-6"]',$divtNember);


		foreach($list->find('script') as $element){

		        $TheData .=$element->innertext;
		}

		$data_ar = explode('[', $TheData);

		$label = $data_ar[3];
			
		$label_ar = explode(']', $label);

		$data1 = $label_ar[0];
		$data = explode(',', $data1);
		$datajson = json_encode($data);

		if ($datajson) {

			return $datajson;

		}else{
			return 0;
		}
		
     }
  }
  // This Function return Total Coronavirus Deaths
if(!function_exists('getTotalDeaths')){

     function getTotalDeaths(){
		$divtNember = 3;
		$url = 'https://www.worldometers.info/coronavirus';
		
		$html = file_get_html($url);
		$TheData = '';
		$list = $html->find('div[class="col-md-6"]',$divtNember);


		foreach($list->find('script') as $element){

		        $TheData .=$element->innertext;
		}

		$data_ar = explode('[', $TheData);

		$label = $data_ar[3];
			
		$label_ar = explode(']', $label);

		$data1 = $label_ar[0];
		$data = explode(',', $data1);
		$datajson = json_encode($data);

		if ($datajson) {

			return $datajson;

		}else{
			return 0;
		}
		
     }
  }

 // This Function return the date of data Word  cases

if(!function_exists('getDateTotalDeaths')){

     function getDateTotalDeaths(){
		$divtNember =3;
		$url = 'https://www.worldometers.info/coronavirus';
		
		$html = file_get_html($url);
		$TheData = '';
		$list = $html->find('div[class="col-md-6"]',$divtNember);


		foreach($list->find('script') as $element){

		        $TheData .=$element->innertext;
		}

		$data_ar = explode('[', $TheData);

		$label = $data_ar[1];
		
		$label_ar = explode(']', $label);
		
		$data1 = $label_ar[0];
		$data = explode('"', $data1);
		$count = count($data);
	
		for ($i=0; $i < $count ; $i++) { 

				if (($data[$i] != ',') && $data[$i] != '') {

				$dataclear[] = $data[$i];

				}
		}
		
		$datajson = json_encode($dataclear);

		if ($datajson) {

			return $datajson;

		}else{
			return 0;
		}
		
     }
  }
// 

if(!function_exists('getGlobal')){

     function getGlobal($numb){
		$url = 'https://www.worldometers.info/coronavirus';

		$html = file_get_html($url);
		$list = $html->find('div[class="maincounter-number"]',$numb);

		return $list->plaintext;	
     }
  }

// Redirect to the page in parameter 
if(!function_exists('redirect')){
       function redirect($page){
         header('Location:'.$page);
         ob_end_flush();
         exit();
       }
}

//
if(!function_exists('getGlobalCountry')){

     function getGlobalCountry($country,$numb){
		$url = 'https://www.worldometers.info/coronavirus/country/'.$country;

		$html = file_get_html($url);
		$list = $html->find('div[class="maincounter-number"]',$numb);

		return $list->plaintext;	
     }
  }
