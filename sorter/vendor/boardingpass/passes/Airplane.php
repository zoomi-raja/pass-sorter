<?php
/**
 * Created by PhpStorm.
 * User: zamurdali zoomi.raja@gmail.com
 * Date: 2021-01-11
 * Time: 23:39
 * Git: https://github.com/zoomi-raja
 */

namespace boardingpass\passes;

class Airplane extends \boardingpass\BoardingPass
{
    /** parse data*/
    function setInfo(array $data)
    {
        $this->to       = $data['to'];
        $this->from     = $data['from'];
        $this->seat     = ($data['seat'])?:'';
        $this->gate     = $data['gate'];
        $this->number   = $data['number'];
        $this->counter  = $data['counter'];
    }

    public function jsonSerialize()
    {
        $result = "From {$this->from}, take {$this->number} to {$this->to}. Gate {$this->gate}, seat {$this->seat}.";
        $result .= (!$this->counter)?' Baggage will we automatically transferred from your last leg.':" Baggage drop at ticket counter {$this->counter}.";
        return $result;
    }
}