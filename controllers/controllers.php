<?php
/**
 * Handles data sent from user submitted pages and redirects them after confirming data is valid.
 *
 * @author Joseph Igama
 */
class Controller
{
    private $_f3;

    function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    /** Display home page */
    function home()
    {
        //Resets any stored session data
        session_destroy();

        //Renders view
        $view = new Template();
        echo $view->render('views/home.html');
    }

    /** Display personal-info page */
    function personal()
    {
        global $validator;

        //If user submits data
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //Assign post array to variables
            $fName = trim($_POST['fName']);
            $lName = trim($_POST['lName']);
            $age = trim($_POST['age']);
            $gender = $_POST['genders'];
            $number = trim($_POST['number']);
            $premium = $_POST['premium'];

            //Validation
            if (!$validator->validfName($fName)) {
                $this->_f3->set('errors["fName"]', "Invalid first name. Must contain only alphabetical characters and can't be empty.");
            }

            if (!$validator->validlName($lName)) {
                $this->_f3->set('errors["lName"]', "Invalid last name. Must contain only alphabetical characters and can't be empty.");
            }

            if (!$validator->validAge($age)) {
                $this->_f3->set('errors["age"]', "Invalid age. Must be between 18 - 118.");
            }

            if (!$validator->validPhone($number)) {
                $this->_f3->set('errors["number"]', "Invalid phone number. Must be 10-11 digits");
            }

            if (!isset($gender)) {
                $this->_f3->set('errors["genders"]', "Must choose a gender");
            }

            //If there are no errors,
            // instantiate appropriate member object and redirect user to profile.
            if (empty($this->_f3->get('errors'))) {

                //If user signs up for premium
                if($premium == "on") {
                    $member = new PremiumMember($fName, $lName, $age, $gender, $number);

                    $_SESSION['$member'] =
                        serialize($member);

                //If does not user signs up for premium
                } else {

                    $member = new Member($fName, $lName, $age, $gender, $number);

                    $_SESSION['$member'] =
                        serialize($member);
                }

                $this->_f3->reroute('/profileInfo');
            }
        }

        //Sticky data
        $this->_f3->set('fName', isset($fName) ? $fName : "");
        $this->_f3->set('lName', isset($lName) ? $lName  : "");
        $this->_f3->set('age', isset($age) ? $age : "");
        $this->_f3->set('gender', isset($gender) ? $gender : "");
        $this->_f3->set('number', isset($number) ? $number : "");
        $this->_f3->set('premium', isset($premium) ? $premium : "");

        //Render view
        $view = new Template();
        echo $view->render('views/personal-info.html');
    }

    /** Display profile info page */
    function profile()
    {
        //unserialize session and reassign to an instance variable
        $member = unserialize($_SESSION['$member']);

        //If user submits data
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            var_dump($_POST);
            $email = trim($_POST['email']);
            $state = $_POST['state'];
            $genderInterest = $_POST['genderInterest'];
            $biography = $_POST['biography'];

            //Validation
            if (!$validator->validEmail($email)) {
                $this->_f3->set('errors["email"]', "Invalid email. Please enter valid email.");
            }

            if (empty($this->_f3->get('errors'))) {

                //Call set methods to assign parameters
                $member->setEmail($email);
                $member->setState($state);
                $member->setSeeking($genderInterest);
                $member->setBio($biography);

                $_SESSION['$member'] = serialize($member);

//                if ($member->isMember()) {
//                    $this->_f3->reroute('/interests');
//                } else {
//                    $this->_f3->reroute('/summary');
//                }
            }
        }

        //Sticky data
        $this->_f3->set('email', isset($email) ? $email : "");
        $this->_f3->set('state', isset($state) ? $state : "");
        $this->_f3->set('genderInterest', isset($genderInterest) ? $genderInterest : "");
        $this->_f3->set('biography', isset($biography) ? $biography : "");

        //Display a view
        $view = new Template();
        echo $view->render('views/profile.html');
    }

    /** Display interests page */
    function interests()
    {
        global $validator;
        global $profile;

        //If user submits data
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //If there are selected indoor interests
            if (isset($_POST['indoorInterests'])) {
                $indoorInterests = $_POST['indoorInterests'];

                if ($validator->validIndoor($indoorInterests)) {
                    $indoorString = implode(", ", $indoorInterests);
                    $profile->setIndoorInterests($indoorInterests);
                    $_SESSION['indoorInterests'] = $indoorString;
                } else {
                    $this->_f3->set('errors["indoorInterests"]', "Spoof attempt prevented!");
                }
            }

            //If there are selected indoor interests
            if (isset($_POST['outdoorInterests'])) {
                $outdoorInterests = $_POST['outdoorInterests'];

                if ($validator->validOutdoor($outdoorInterests)) {
                    $outdoorString = implode(", ", $outdoorInterests);
                    $profile->setOutdoorInterests($outdoorInterests);
                    $_SESSION['outdoorInterests'] = $outdoorString;
                } else {
                    $this->_f3->set('errors["outdoorInterests"]', "Spoof attempt prevented!");
                }
            }

            //If there are no errors, redirect user to summary page
            if (empty($this->_f3->get('errors'))) {
                $this->_f3->reroute('/summary');
            }
        }

        //Display a view
        $view = new Template();
        echo $view->render('views/interests.html');
    }

    /** Display summary page */
    function summary()
    {
        $view = new Template();
        echo $view->render('views/summary.html');
    }
}