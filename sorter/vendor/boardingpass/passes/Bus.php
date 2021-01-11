<?php
/**
 * Created by PhpStorm.
 * User: zamurdali zoomi.raja@gmail.com
 * Date: 2021-01-11
 * Time: 23:41
 * Git: https://github.com/zoomi-raja
 */

namespace boardingpass\passes;

class Bus extends \boardingpass\BoardingPass
{

    /**
     * @param array $data
     * @description parse data
     */
    function setInfo(array $data)
    {
        $this->to       = $data['to'];
        $this->from     = $data['from'];
        $this->seat     = ($data['seat'])?:'';
        $this->number   = $data['number'];
    }

    /**
     * @return mixed|string
     */
    public function jsonSerialize()
    {
        return "Take the {$this->number} bus from {$this->from} to {$this->to}.{$this->setSeatInfo($this->seat)}";
    }
}