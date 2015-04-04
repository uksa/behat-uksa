<?php
use Behat\Behat\Context\BehatContext;
use Dvsa\Mot\Behat\Support\Users;

class UserContext extends BehatContext
{

    /**
     * @var Users
     */
    public $user;

    /**
     * @Given /^I'm a (Unknown|Standard|Admin|Suspend) User$/
     * @param $userType
     */
    public function iMAUserType($userType)
    {
        $this->user = new Users();
        $this->user->getUserByType($userType);
    }


}