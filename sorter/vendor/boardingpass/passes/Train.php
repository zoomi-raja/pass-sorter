<?php
/**
 * Created by PhpStorm.
 * User: zamurdali zoomi.raja@gmail.com
 * Date: 2021-01-11
 * Time: 23:37
 * Git: https://github.com/zoomi-raja
 */

namespace boardingpass\passes;

class Train extends \boardingpass\BoardingPass
{
    /** parse data it seems like we dont have gate  and couter for train*/
    public $number, $from, $to, $seat;
    function setInfo(array $data)
    {
        $this->to       = $data['to'];
        $this->from     = $data['from'];
        $this->seat     = ($data['seat'])?:'';
        $this->number   = $data['number'];
    }

    public function __toString()
    {
        return "Take train {$this->seat} from {$this->from} to {$this->to}.{$this->setSeatInfo($this->seat)}";
    }
}