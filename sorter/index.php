<?php
/**
 * Created by PhpStorm.
 * User: zamurdali zoomi.raja@gmail.com
 * Date: 2021-01-11
 * Time: 23:20
 * Git: https://github.com/zoomi-raja
 */

/** @var sample $data */
$data = [
    [
         "type" => "train",
         "number" => "23A",
         "from" => "Beirut",
         "to" => "Turkey",
         "seat" =>  "15B",
         "gate" => null,
         "counter" => null
     ],
     [
         "type" => "airplane",
         "number" => "flight SK22",
         "from" => "Aleppo",
         "to" => "Montreal YUL",
         "seat" => "7B",
         "gate" =>  "22",
         "counter" => null
     ],
     [
         "type" => "bus",
         "number" => "airport",
         "from" => "Turkey",
         "to" => "Ibiza Airport",
         "seat" => null,
         "gate" => null,
         "counter" => null
     ],
     [
         "type" => "airplane",
         "number" => "flight SK455",
         "from" => "Ibiza Airport",
         "to" => "Aleppo",
         "seat" => "3A",
         "gate" => "15B",
         "counter" => "344"
    ]
];

$url = 'http://localhost/api/sorter.php';

$data_json = json_encode($data);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_json)));
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response  = curl_exec($ch);
curl_close($ch);

header('Content-Type: application/json');
echo  $response;
die;