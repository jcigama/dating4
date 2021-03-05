<?php
/**
 * Child class of member, if user opts-in for premium features
 *
 * @author Joseph Igama
 */
class PremiumMember extends Member
{
    private $_inDoorInterests;
    private $_outDoorInterests;

    /**
     * PremiumMember constructor.
     * @param $_fName
     * @param $_lName
     * @param $_age
     * @param $_gender
     * @param $_phone
     * @param bool $_member
     * @param string $_inDoorInterests
     * @param string $_outDoorInterests
     */
    public function __construct($_fName, $_lName, $_age, $_gender, $_phone, $_member = true, $_inDoorInterests="", $_outDoorInterests="")
    {
        parent::__construct($_fName, $_lName, $_age, $_gender, $_phone, $_member);
        $this->_inDoorInterests = $_inDoorInterests;
        $this->_outDoorInterests = $_outDoorInterests;
    }

    /**
     * @return mixed
     */
    public function getInDoorInterests()
    {
        return $this->_inDoorInterests;
    }

    /**
     * @param mixed $inDoorInterests
     */
    public function setInDoorInterests($inDoorInterests)
    {
        $this->_inDoorInterests = $inDoorInterests;
    }

    /**
     * @return mixed
     */
    public function getOutDoorInterests()
    {
        return $this->_outDoorInterests;
    }

    /**
     * @param mixed $outDoorInterests
     */
    public function setOutDoorInterests($outDoorInterests)
    {
        $this->_outDoorInterests = $outDoorInterests;
    }
}