<?php
/**
 * For license information; see license.txt
 * @author frankhouweling
 * @date 13-12-13
 */
namespace PostalcodeCalculator;

/**
 * Class DistanceCalculatable
 * @package PostalcodeCalculator
 * Can be used by Postalcode::calculateCoordinateDistance to calculate distance.
 * @see Postalcode::calculateCoordinateDistance
 */
interface DistanceCalculatable{
    public function getLat();
    public function getLang();
}