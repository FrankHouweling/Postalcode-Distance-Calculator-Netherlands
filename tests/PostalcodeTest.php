<?php
/**
 * For license information; see license.txt
 * @author frankhouweling
 * @date 13-12-13
 */
require_once 'PHPUnit/Autoload.php';
require_once "../Postalcode.php";
require_once "../Coordinate.php";

class PostalcodeTest extends PHPUnit_Framework_TestCase
{
    private $postalCode;

    function setUp(){
        $coordinate = new \PostalcodeCalculator\Coordinate();
        $coordinate->setLat(52.06666700)
            ->setLang(4.66666700);
        $this->postalCode = new \PostalcodeCalculator\Postalcode( "2771", $coordinate );
    }

    function testAddPostalcode(){
        $this->assertEquals( "2771", $this->postalCode->getPostalCode() );
    }

    function testGetCoordinate(){
        $this->assertInstanceOf('\PostalcodeCalculator\Coordinate',
            $this->postalCode->getCoordinate());
    }

    function testGetDistance(){
        $coordinate = new \PostalcodeCalculator\Coordinate();
        $coordinate->set(52.35000000, 4.91666700);
        $postalCode = new \PostalcodeCalculator\Postalcode( "1000", $coordinate );

        $this->assertEquals( $postalCode->getDistanceTo($this->postalCode), 35.825730074312);
    }

}
?>