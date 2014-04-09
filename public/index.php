<?php

require_once("../vendor/autoload.php");

use Usps\Api\ZipCodeLookup;
use Usps\Api\Models\Address;

$address = new Address(["FirmName" => "Company Name"]);
$address->Address1 = "Suite 1";
$address->Address2 = "123 Street Road";
$address->City = "Yuma";
$address->State = "AZ";

$zipcode = new ZipCodeLookup(["username" => "xxxxxx"]);
//$zipcode->testMode = true;
$zipcode->addAddress($address);

$zipcode->lookup();
echo $zipcode->response;
//print_r($zipcode->arrayResponse);

// Check if it was completed
if($zipcode->isSuccess()) {
  echo 'Done';
} else {
  //echo 'Error: ' . $zipcode->errorMessage;
}