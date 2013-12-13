<?php
/**
 * For license information; see license.txt
 * @author frankhouweling
 * @date 13-12-13
 */
namespace PostalcodeCalculator;

require_once "DistanceCalculatable.php";

class Coordinate implements DistanceCalculatable{
    private $lat, $lang;

    /**
     * @param $lat
     * @param $lang
     * @return $this
     */
    public function set($lat, $lang){
        $this->setLat($lat);
        $this->setLang($lang);
        return $this;
    }

    /**
     * @param $lat
     * @return $this
     */
    public function setLat($lat){
        $this->lat = (float) $lat;
        return $this;
    }

    /**
     * @param $lang
     * @return $this
     */
    public function setLang($lang){
        $this->lang = (float) $lang;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLat(){
        return $this->lat;
    }

    /**
     * @return mixed
     */
    public function getLang(){
        return $this->lang;
    }

}