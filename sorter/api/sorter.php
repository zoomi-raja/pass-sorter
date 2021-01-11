<?php
/**
 * Created by PhpStorm.
 * User: zamurdali zoomi.raja@gmail.com
 * Date: 2021-01-12
 * Time: 02:18
 * Git: https://github.com/zoomi-raja
 */


include_once '../vendor/autoload.php';

if($_SERVER["REQUEST_METHOD"] == "PUT"){
    $rawData = file_get_contents('php://input');
    $data = json_decode($rawData,true);

    // create the instance of boarding passes
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
    die;
}

die('only put call available for proper tour boarding pass data');