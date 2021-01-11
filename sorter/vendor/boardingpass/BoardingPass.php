<?php
/**
 * Created by PhpStorm.
 * User: zamurdali zoomi.raja@gmail.com
 * Date: 2021-01-11
 * Time: 23:36
 * Git: https://github.com/zoomi-raja
 */

namespace boardingpass;


abstract class BoardingPass implements BoardingPassInterface
{
    abstract public function setInfo(array $data );
    //** instead of writing in each drived class better add here */
    public function setSeatInfo(string $seat){
        return ($seat == '')?' No seat assignment.':" Sit in seat {$seat}.";
    }
}
