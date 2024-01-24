<?php


$con = mysqli_connect("localhost", "u846125412_Siln","#Sil124823", "u846125412_Sil");
mysqli_set_charset($con,'utf8');//allows symbols like cuurency etc {https://stackoverflow.com/questions/4777900/how-to-display-utf-8-characters-in-phpmyadmin

// Check connection
if (mysqli_connect_error()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

require "function.php";
function Track()
{
  @$sha = substr(md5(ips()*time()/time().microtime().rand(time()*time()+time()*time(),100000)),10,8);
  return $sha;
}
//echo 2;
?>

