<?php 
include 'admin_temps/config/initiate.php';


extract($_POST);

require_once 'php-qr-code/vendor/phpqrcode/qrlib.php';
$target = "php-qr-code/uploads/qr-code-phone/";



$data = array(
    'crypto_name' => $crypto_name,
  );

$result = qFields($con, "crypto", "*", $data);
$i = 0;

if (!$result) {
} else {
  while ($row_pro = mysqli_fetch_assoc($result)) {
    ++$i;
    extract($row_pro);
  }
}      

$qrContent = "$crypto_name:" . $address."?"."amount=".$amount;
// generating
QRcode::png($qrContent, $target . 'crypto.png', QR_ECLEVEL_L, 4);

$details = [
    'output1'             =>  true,
    'src'                 => $target."crypto.png",
    'address'             => $address
];

echo json_encode($details);