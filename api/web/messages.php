<?php
require __DIR__ . '/../vendor/autoload.php';

use Parse\ParseClient;
use Parse\ParseQuery;

$post = file_get_contents('php://input');

$data = json_decode($post, 1);

ParseClient::initialize('h68BABG5HmxYHT3c56crkxA6UbxcxF5CeAMEoMiP', 'XUtyHttHi3HoemWDQpSs91WDqWzZhrAzcRUtHWZP', 'ifeQKCN2EdEOPEl5mOxuiDCVV3l5EfMHPsUldVXF');

$query = new ParseQuery("Diagnosis");
$query->equalTo("patientId", '1');
$results = $query->find();

$diagnosis = [];

for ($i = 0; $i < count($results); $i++) {
    /** @var Parse\ParseObject $object */
    $object = $results[$i];

    $query = new ParseQuery("ICD9");
    $query->equalTo("code", $object->get('icd9'));
    $results = $query->find();

    $name = '';

    if (count($results) > 0) {
        /** @var Parse\ParseObject $IC9 */
        $IC9 = $results[0];
        $name = $IC9->get('name');
    }

    $diagnosis[] = [
        'id' => $object->getObjectId(),
        'creation' => $object->getCreatedAt()->format('c'),
        'diagnosis' => $name
    ];

    echo json_encode($diagnosis);
}