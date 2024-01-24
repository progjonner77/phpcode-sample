<?php
include '../../config/initiate.php';


$error = "";
$output = [];

$missing = array();
 foreach ($_POST as $key => $value) { if ($value == "") { array_push($missing, $key);}}
 if (count($missing) > 0) {
 $output["bool"] =  false;
  } else {

//  replace this key from  fixer.io after getting  a free API access key:

      $API = '314259bbe6de76b961c84a5244ac0fc0';



      $from = symbolToName($_POST["From"]);
      $to = symbolToName($_POST["To"]);
      $amount =  stripslashes(strtoupper($_POST['Amount'])); 

      function convertCurrency($API, $amount, $from = 'EUR', $to = 'USD')
      {
          @$curl = file_get_contents("http://data.fixer.io/api/latest?access_key=$API&symbols=$from,$to");

          if (!is_object($curl)) {
              $arr = json_decode($curl, true);
              if ($arr['success']) {
                  $from = $arr['rates'][$from];
                  $to = $arr['rates'][$to];
                  $rate = $to / $from;
                  $result = [];
                  $result["result"] = round($amount * $rate, 6);
                  $result["bool"] = true;
                  return $result;
              }
            }else{
                return $result["bool"] = false;;  
            }
      }

      $output =  convertCurrency($API, $amount, $from, $to);
      
      $Parcent = round($output * (5 / 100),2);

      $details = [
        'output1'             =>  $output["result"],
        'error'               =>  $output["bool"],
        'Parcent'             => $Parcent
        
    ];
    
    echo json_encode($details);
  }
