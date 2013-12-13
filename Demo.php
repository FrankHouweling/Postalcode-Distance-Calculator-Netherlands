<?php
/**
 * For license information; see license.txt
 * @author frankhouweling
 * @date 13-12-13
 */
namespace PostalcodeCalculator;

require_once "PostalcodeList.php";

// First construct a list of all postal codes known..
$postalCodeList = PostalcodeList::buildFromCSV("postcodedata.csv");

// Now we get two postal codes for our experiment
$postalCode1 = $postalCodeList->item(5);
$postalCode2 = $postalCodeList->item(200);

// And now we get the distance between the two in km.
$distance = $postalCode1->getDistanceTo($postalCode2);

echo $distance;

?>