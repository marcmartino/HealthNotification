<?php
require __DIR__ . '/../vendor/autoload.php';

use Parse\ParseClient;
use Parse\ParseObject;


$post = file_get_contents('php://input');

$data = json_decode($post, 1);

ParseClient::initialize('h68BABG5HmxYHT3c56crkxA6UbxcxF5CeAMEoMiP', 'XUtyHttHi3HoemWDQpSs91WDqWzZhrAzcRUtHWZP', 'ifeQKCN2EdEOPEl5mOxuiDCVV3l5EfMHPsUldVXF');

$testObject = ParseObject::create("Diagnosis");
$testObject->set("patientId", (string) $data['patientId']);
$testObject->set("icd9", (string) $data['ICD9']);
$testObject->save();