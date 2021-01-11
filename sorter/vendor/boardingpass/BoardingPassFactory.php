<?php
/**
 * Created by PhpStorm.
 * User: zamurdali zoomi.raja@gmail.com
 * Date: 2021-01-11
 * Time: 23:35
 * Git: https://github.com/zoomi-raja
 */

namespace boardingpass;


class BoardingPassFactory
{
    public static function init($name,$data){
        $class = 'boardingpass\passes\\'.ucfirst($name);
        $data  = $data;
//        try {
            return new $class();
//        }catch(\Error $e){
//            return false;
//        }
    }
}