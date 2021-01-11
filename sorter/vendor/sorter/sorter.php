<?php
/**
 * Created by PhpStorm.
 * User: zamurdali zoomi.raja@gmail.com
 * Date: 2021-01-12
 * Time: 00:44
 * Git: https://github.com/zoomi-raja
 */

class sorter
{
    /** its private to force fetch only sorted passes*/
    private $passes;

    public function sort(\boardingpass\BoardingPassInterface ...$passes){
        $this->passes = $passes;
    }

    public function result(){
        if(count($this->passes)>0){
            return $this->passes;
        }
        return false;
    }

}