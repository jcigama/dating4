<?php
/**
 * Stores and returns dating profile data submitted by user
 *
 * Data is stored via set methods. Data is returned via get methods.
 *
 * @author Joseph Igama
 */
class Profile
{
    private $_fName;
    private $_lName;
    private $_age;
    private $_gender;
    private $_phone;
    private $_email;
    private $_state;
    private $_genderInterest;
    private $_biography;
    private $_indoorInterests;
    private $_outdoorInterests;

    /**
     * @return mixed
     */
    public function getFName()
    {
        return $this->_fName;
    }

    /**
     * @param mixed $fName
     */
    public function setFName($fName): void
    {
        $this->_fName = $fName;
    }

    /**
     * @return mixed
     */
    public function getLName()
    {
        return $this->_lName;
    }

    /**
     * @param mixed $lName
     */
    public function setLName($lName): void
    {
        $this->_lName = $lName;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->_age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age): void
    {
        $this->_age = $age;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->_gender;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender): void
    {
        $this->_gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->_phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone): void
    {
        $this->_phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->_email = $email;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->_state;
    }

    /**
     * @param mixed $state
     */
    public function setState($state): void
    {
        $this->_state = $state;
    }

    /**
     * @return mixed
     */
    public function getGenderInterest()
    {
        return $this->_genderInterest;
    }

    /**
     * @param mixed $genderInterest
     */
    public function setGenderInterest($genderInterest): void
    {
        $this->_genderInterest = $genderInterest;
    }

    /**
     * @return mixed
     */
    public function getBiography()
    {
        return $this->_biography;
    }

    /**
     * @param mixed $biography
     */
    public function setBiography($biography): void
    {
        $this->_biography = $biography;
    }

    /**
     * @return mixed
     */
    public function getIndoorInterests()
    {
        return $this->_indoorInterests;
    }

    /**
     * @param mixed $indoorInterests
     */
    public function setIndoorInterests($indoorInterests): void
    {
        $this->_indoorInterests = $indoorInterests;
    }

    /**
     * @return mixed
     */
    public function getOutdoorInterests()
    {
        return $this->_outdoorInterests;
    }

    /**
     * @param mixed $outdoorInterests
     */
    public function setOutdoorInterests($outdoorInterests): void
    {
        $this->_outdoorInterests = $outdoorInterests;
    }
}