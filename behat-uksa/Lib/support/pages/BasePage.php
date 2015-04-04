<?php

namespace Dvsa\Mot\Behat\Support\pages;

use WebDriver;
use FeatureContext;
use WebDriverBy;
use WebDriverSelect;

class BasePage
{
    /**
     * @var WebDriver
     */
    protected $driver;

    public function __construct($driver)
    {
        $this->driver = $driver;
    }

    public function visit($url='/')
    {
        $this->driver->get(FeatureContext::$url . $url);
    }

    public function selectOptionByValue(WebDriverBy $by, $optionValue)
    {
        $select = new WebDriverSelect($this->driver->findElement($by));
        $select->selectByVisibleText($optionValue);
    }

}