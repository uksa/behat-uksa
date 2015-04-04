<?php

namespace Dvsa\Mot\Behat\Support;

use FeatureContext;
use Symfony\Component\Yaml\Parser;

class Users
{
    /*
     * Users username
     */
    public $username;

    /*
     * Users password
     */
    public $password;


    public function getUserByType($userType)
    {
        $userDetails = $this->getUserDetails($userType);
        $this->serializeUserDetails($userDetails);
    }


    /**
     * Search for User
     *
     * @param $username
     * @return mixed
     */
    public function getUserDetails($username)
    {
        return $this->getUsersData()['users'][strtolower($username)];
    }

    /**
     * Serialise User Data-store
     *
     * @return array
     */
    private function getUsersData()
    {
        $yaml = new Parser();
        return $yaml->parse(file_get_contents(FeatureContext::$dataPath . "users.yml"));
    }

    /**
     * Serialize the Data into the User object
     *
     * @param $userDetails
     * @param $user
     * @return mixed
     */
    public function serializeUserDetails($userDetails)
    {
        $this->username = $userDetails['username'];
        $this->password = $userDetails['password'];
    }

}