<?php

namespace Dvsa\Mot\Behat\Support\pages;

use WebDriverBy;

class SignIn extends BasePage
{

    public function __construct($driver){
        parent::__construct($driver);
        $this->visit('users/sign_in');

        $this->byUsername = WebDriverBy::cssSelector('#user_email');
        $this->byPassword = WebDriverBy::cssSelector('#user_password');
        $this->submit     = WebDriverBy::name('commit');
    }

    public function enterUsername($username){
        $this->driver->findElement($this->byUsername)->sendKeys($username);
    }

    public function enterPassword($password){
        $this->driver->findElement($this->byPassword)->sendKeys($password);
    }

    public function submitForm(){
        $this->driver->findElement($this->submit)->click();
    }

    public function user($user){
        $this->enterUsername($user->username) ;
        $this->enterPassword($user->password) ;
        $this->submitForm();
        return new MemberDetails($this->driver);
    }

    public function attemptSignIn($user){
        $this->enterUsername($user->username) ;
        $this->enterPassword($user->password) ;
        $this->submitForm();
        return $this;
    }
}