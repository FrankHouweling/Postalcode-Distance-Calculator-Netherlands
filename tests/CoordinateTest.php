<?php
/**
 * For license information; see license.txt
 * @author frankhouweling
 * @date 13-12-13
 */
require_once 'PHPUnit/Autoload.php';
require_once "../Coordinate.php";

class CoordinateTest extends PHPUnit_Framework_TestCase
{

    function testCreateCoordinate(){
        $coordinate = new PostalcodeCalculator\Coordinate();
        $coordinate->setLang(0.01)->setLat(0.002);
        $this->assertEquals( $coordinate->getLang(), 0.01 );
        $this->assertEquals( $coordinate->getLat(), 0.002 );
    }

}
?>z