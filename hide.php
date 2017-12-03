<?php
if(!isset($_GET['url']))
    die("URL not set");

$target = $_GET['url'];   //filename?url=www.Hacking.com
$host = 'https://medow.github.io/fakerefer/';  //you'r url ,like google.com
$service_uri = '/refer.php'; //dont change
$vars ='?duckstolen=yea'; //to confuse the refferer logging 
          
$header = "Host: $host\r\n";
$header .= "User-Agent: PHP Script\r\n";
$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
$header .= "Referer: http://www.google.com/search?hl=en&q=jigh&btnG=Google+Search \r\n";
$header .= "Content-Length: ".strlen($vars)."\r\n";
$header .= "Connection: close\r\n\r\n";

$fp = fsockopen("".$host,80, $errno, $errstr);
if (!$fp) {
  echo "$errstr ($errno)<br/>\n";
  echo $fp;
} else {
header("location: ". $target);

while (!feof($fp)) {
echo fgets($fp, 128);
}
fclose($fp);
}
?>
