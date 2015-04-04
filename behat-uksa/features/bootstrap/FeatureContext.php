<?php

use Behat\Behat\Context\BehatContext;

/**
 * Features context.
 */
class FeatureContext extends BehatContext
{
    /**
     * @var RemoteWebDriver
     */
    public $driver;

    public static $url;
    public static $dataPath;


    /**
     * Initializes context.
     * Every scenario gets its own context object.
     *
     * @param array $parameters context parameters (set them up through behat.yml)
     */
    public function __construct(array $parameters)
    {
        $this->useContext('UserContext', new UserContext());
        $this->useContext('SignInContext', new SignInContext());

        self::$url = $parameters['baseUrl'];
        self::$dataPath = $parameters['dataPath'];

    }

    /**
     * @BeforeScenario
     *
     */
    public function scenarioBefore()
    {
        $host = 'http://localhost:4444/wd/hub';
        $this->driver = RemoteWebDriver::create($host, DesiredCapabilities::chrome());
    }


    /**
     * @AfterScenario
     *
     */
    public function scenarioAfter()
    {
        $this->driver->close();
    }

}
