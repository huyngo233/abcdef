<?php
/**
 * Created by PhpStorm.
 * User: huyng
 * Date: 30/03/18
 * Time: 9:12 PM
 */

$jsonHash = [];
$jsonHash['status'] = '';

$fCurrencyType = $_POST['fCurrencyType'];

$url = "https://api.gemini.com/v1/pubticker/{$fCurrencyType}";
//  Initiate curl
$ch = curl_init();
// Disable SSL verification
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// Will return the response, if false it print the response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Set the url
curl_setopt($ch, CURLOPT_URL,$url);
// Execute
$result = curl_exec($ch);
// Closing
curl_close($ch);

$price = json_decode($result);
if ($price) {
  $jsonHash['status'] = 'success';
  $jsonHash['price'] = $price->ask;
}

print json_encode($jsonHash);

exit;