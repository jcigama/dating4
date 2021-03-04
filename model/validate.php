<?php
/**
 * Validates different pieces of data through built-in PHP functions, as well as through logic.
 *
 * @author Joseph Igama
 */
class Validate
{
    /**
     * @var DataLayer
     */
    private $_dataLayer;

    /**
     * Validate constructor.
     */
    public function __construct()
    {
        $this->_dataLayer = new DataLayer();
    }

    /** validfName() returns true if first name contains only alphabetic characters
     * @param $fName
     * @return bool
     */
    function validfName($fName)
    {
        return ctype_alpha($fName) && isset($fName);
    }

    /** validlName() returns true if last name contains only alphabetic characters
     * @param $lName
     * @return bool
     */
    function validlName($lName)
    {
        return ctype_alpha($lName) && isset($lName);;
    }

    /** validAge() returns true if age is greater than 18, and less than 118
     * @param $age
     * @return bool
     */
    function validAge($age): bool
    {
        return $age > 18 && $age < 118;
    }

    /** validPhone() returns true if phone number is 10 or 11 digits long
     * @param $number
     * @return bool
     */
    function validPhone($number): bool
    {
        if ($number >= 1000000000 && $number <= 99999999999) {
            return true;
        } else {
            return false;
        }
    }

    function validEmail($email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    /** validOutdoor() returns true if all of the selected outdoor-activities are
     * in the list
     * @param $outdoorActivities
     * @return bool
     */
    function validOutdoor($outdoorActivities): bool
    {
        $validOutdoor = $this->_dataLayer->getOutdoor();

        foreach ($outdoorActivities as $activity) {
            if (!in_array($activity, $validOutdoor)) {
                return false;
            }
        }
        return true;
    }

    /** validOutdoor() returns true if all of the selected indoor-activities are
     * in the list
     * @param $indoorActivities
     * @return bool
     */
    function validIndoor($indoorActivities): bool
    {
        $validIndoor = $this->_dataLayer->getIndoor();

        foreach ($indoorActivities as $activity) {
            if (!in_array($activity, $validIndoor)) {
                return false;
            }
        }
        return true;
    }
}