<?php
/**
 * Created by PhpStorm.
 * User: zamurdali zoomi.raja@gmail.com
 * Date: 2021-01-11
 * Time: 23:35
 * Git: https://github.com/zoomi-raja
 */

namespace boardingpass;

/** creational factory pattern to dynamically create instance of our boarding pass*/
class BoardingPassFactory
{
    public static function init($name,$data): BoardingPass{
        $class = 'boardingpass\passes\\'.ucfirst($name);
        $data  = $data;
        try {
            $pass = new $class();
            $pass->setInfo($data);
            return $pass;
        }catch(\Error $e){
            return false;
        }
    }
}