<?php
/**
 * For license information; see license.txt
 * @author frankhouweling
 * @date 13-12-13
 */
namespace PostalcodeCalculator;

require_once "Coordinate.php";
require_once "Postalcode.php";

class PostalcodeList implements \Iterator{
    private $postalcodes, $position;

    function __construct( $datalist ){
        $this->postalcodes = $datalist;
        $this->position = 0;
    }

    /**
     * CSV file should have the following format:
     * 4PP,Woonplaats,Alternatieve schrijfwijzen,Gemeente,Provincie,Netnummer,Latitude,Longitude,Soort
     * @param $filePath
     * @param bool $skipFirst
     * @return PostalcodeList
     * @throws Exception
     */
    public static function buildFromCSV( $filePath, $skipLines = 1 ){
        $postcodeReturnList = array();

        if( !file_exists( $filePath ) ){
            throw new Exception( "File does not exist" );
        }

        if (($handle = fopen($filePath , "r")) !== FALSE) {
            $line = 0;
            while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
                $line++;

                // Skip first lines (titlerow) when $skipLines is set
                if( $line <= $skipLines ){
                    continue;
                }

                $coordinate = new Coordinate();
                $coordinate->setLat($data[7])
                           ->setLang($data[8]);
                $postcode = new Postalcode($data[0], $coordinate, $data[1]);
                $postcodeReturnList[] = $postcode;
            }
            fclose($handle);
        }
        else {
            throw new Exception( "Could not open CSV file" );
        }


        return new PostalcodeList( $postcodeReturnList );
    }

    /*
     * For iterator...
     */

    function rewind() {
        $this->position = 0;
    }

    /**
     * @param int $position
     * @return \PostalcodeCalculator\Postalcode
     */
    function current() {
        return $this->postalcodes[$this->position];
    }

    /**
     * @param int $position
     * @return \PostalcodeCalculator\Postalcode
     */
    function item($position=0){
        return $this->postalcodes[$position];
    }

    function key() {
        return $this->position;
    }

    function next() {
        ++$this->position;
    }

    function valid() {
        return isset($this->postalcodes[$this->position]);
    }
}

?>