<?php

namespace Dvsa\Mot\Behat\Support\pages;

use WebDriverBy;

class MemberDetails extends BasePage
{

    public function __construct($driver)
    {
        parent::__construct($driver);

        $this->userHeaderName = WebDriverBy::cssSelector('.global-header_name');
        $this->startMotTestButton = WebDriverBy::cssSelector('#action-start-mot-test');
        $this->locationSelect = WebDriverBy::cssSelector('#change-vts-list');
        $this->selectTestSite = WebDriverBy::name('submit');
    }
}
