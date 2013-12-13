<?php
/**
 * For license information; see license.txt
 * @author frankhouweling
 * @date 13-12-13
 */
namespace PostalcodeCalculator;

class Postalcode{
    private $coordinate, $postalcode, $name;

    /**
     * @param $postalcode
     * @param Coordinate $coordinate
     */
    function __construct( $postalcode, Coordinate $coordinate, $name = "" ){
        $this->coordinate = $coordinate;
        $this->postalcode = $postalcode;
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getCoordinate(){
        return $this->coordinate;
    }

    /**
     * @return mixed
     */
    public function getPostalcode(){
        return $this->postalcode;
    }

    /**
     * @return string
     */
    public function getName(){
        return $this->name;
    }

    /**
     * @param Postalcode $otherPostalcode
     * @return float Distance in kilometers
     */
    function getDistanceTo( Postalcode $otherPostalcode ){
        return self::calculateCoordinateDistance(
                    $this->getCoordinate(), $otherPostalcode->getCoordinate()
                );
    }

    /**
     * @param Coordinate $coordinate1
     * @param Coordinate $coordinate2
     * @return float Distance in kilometers
     */
    public static function calculateCoordinateDistance(
        DistanceCalculatable $coordinate1, DistanceCalculatable $coordinate2 ){

        $pi80 = M_PI / 180;
        $lat1 = $pi80 * $coordinate1->getLat();
        $lng1 = $pi80 * $coordinate1->getLang();
        $lat2 = $pi80 * $coordinate2->getLat();
        $lng2 = $pi80 * $coordinate2->getLang();

        // mean radius of Earth in km
        $r = 6372.797;

        // Difference
        $dlat = $lat2 - $lat1;
        $dlng = $lng2 - $lng1;

        // Some weird calculation I got from the internet, it works.
        $a = sin($dlat / 2) * sin($dlat / 2) + cos($lat1)
            * cos($lat2) * sin($dlng / 2) * sin($dlng / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $km = $r * $c;

        return $km;   // @todo this fixes it to a real value for me?
    }
}
?>