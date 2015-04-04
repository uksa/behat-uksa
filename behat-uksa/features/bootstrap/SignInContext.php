<?php
use Behat\Behat\Context\BehatContext;
use Dvsa\Mot\Behat\Support\pages\SignIn;


class SignInContext extends BehatContext
{

    /**
     * @When /^I attempt to Sign into the application$/
     */
    public function iAttemptToSignIntoTheApplication()
    {
        $driver = $this->getMainContext()->driver;
        $user = $this->getMainContext()->getSubcontext('UserContext')->user;

        $signIn = new SignIn($driver);
        $signIn->attemptSignIn($user);
    }

    /**
     * @When /^I Sign into the application$/
     */
    public function iSignIntoTheApplication()
    {
        $driver = $this->getMainContext()->driver;
        $user = $this->getMainContext()->getSubcontext('UserContext')->user;

        $signIn = new SignIn($driver);
        $signIn->attemptSignIn($user);
    }

}