
<?php
//  replace this key from  fixer.io after getting  a free API access key:

$API = '314259bbe6de76b961c84a5244ac0fc0';

function convertCurrency($API, $amount, $from = 'EUR', $to = 'USD'){
  $curl = file_get_contents("http://data.fixer.io/api/latest?access_key=$API&symbols=$from,$to");

  if($curl)
  {
    $arr = json_decode($curl,true);
    if($arr['success'])
    {
        $from = $arr['rates'][$from];
        $to = $arr['rates'][$to];

        $rate = $to / $from;
        $result = round($amount * $rate, 6);
        return $result;
    }else{
        echo $arr['error']['info'];
    }
  }else{
    echo "Error reaching api";
  }
}

echo convertCurrency($API, 1, 'USD', 'EGP');