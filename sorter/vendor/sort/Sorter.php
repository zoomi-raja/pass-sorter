<?php
/**
 * Created by PhpStorm.
 * User: zamurdali zoomi.raja@gmail.com
 * Date: 2021-01-12
 * Time: 00:44
 * Git: https://github.com/zoomi-raja
 */

namespace sort;

use boardingpass\BoardingPass;

class Sorter
{
    /** its private to force fetch only sorted passes*/
    private $passes = [];
    /** map to keep track of trips */
    private $map;
    /** list of destination to help out figure out starting position */
    private $destinations;
    /** @var start of trip */
    private $start;

    /**
     *@var $passes BoardingPass[]
     */
    function __construct($passes) {
        $this->passes = $passes;
    }
    /** as per documentation suffle method */
    public function shuffle(){
        shuffle($this->passes);
    }

    /**
     *@var $passes BoardingPass[]
     *@Desc sort method for passes
     */
    public function sortPasses(){
        foreach ($this->passes as $pass){
            $this->map[$pass->from] = $pass;
            /** check if key exists remove it so we can figure out starting point */
            if($this->destinations[$pass->from]){
                unset($this->destinations[$pass->from]);
            }else{
                $this->destinations[$pass->from]  = 'from';
            }
            /** for keep time complexity minimum we can remove to so at the end we will have one starting and one ending point */
            if($this->destinations[$pass->to]){
                unset($this->destinations[$pass->to]);
            }else{
                $this->destinations[$pass->to]  = 'to';
            }
        }
        /** now we can tell if there is more then 2 elements then tour is not valid it suppose to be continues */
        $this->passes = [];
        if(count($this->destinations) <= 2){

            $this->start = array_search('from', $this->destinations );

            /** sort by starting from start point */
            $locationPoint = $this->map[$this->start];
            /** it will loop till the end because its continus trip so ending point will not be from destination */
            while ($locationPoint != null){
                $this->passes[] = $locationPoint;
                $locationPoint =  $this->map[$locationPoint->to];
            }
        }
    }

    public function result(){
        if(count($this->passes)>0){
            return $this->passes;
        }
        return ['message'=> 'invalid trip data'];
    }

}