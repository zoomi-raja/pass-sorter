<?php
/**
 * Created by PhpStorm.
 * User: zamurdali zoomi.raja@gmail.com
 * Date: 2021-01-11
 * Time: 23:20
 * Git: https://github.com/zoomi-raja
 */

include_once 'vendor/autoload.php';

$passes = [];
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
foreach ( $data as $pass){
    $boringPass = \boardingpass\BoardingPassFactory::init($pass['type'],$pass);
    if($boringPass) {
        $passes[] = $boringPass;
    }
}
/** @desc used spread operator to force Boardingpass type for this  $sorter */
$sorter = new \sort\Sorter(...$passes);
// shuffle data
$sorter->shuffle();
// sort passes
$sorter->sortPasses();

//get and return result
header('Content-Type: application/json');
echo json_encode($sorter->result());