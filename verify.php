<?php
$access_token = '77Bbsyeb/KCuCwrqUvooRboBCR33p7uw7CIEvysWA4fPsgTwb9zqPAXiFD08KrmyX1wiFL2pTFqsVVDx5cJWevN3nMksSHPuhE8kvpyanlcGXTD3HTiZ6mknvZNfHaCx0k+l/ahlMdswsnCedMKIKwdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';
//$url = 'https://linebotbyminnie.herokuapp.com/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;