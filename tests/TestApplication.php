<?php

/**
 * 
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/EasyMvc
 * @since Version 1.0.0
 * @package DateTimeHelper
 */

namespace WebDevJL\Framework\Tests;

use WebDevJL\Framework\FrameworkConstants;

class TestApplication extends \WebDevJL\Framework\Core\Application {

    public function __construct() {
        $errorManager = new \WebDevJL\Framework\Core\ErrorManager();
        $this->name = "TestSuiteAppInstance";
        $this->UnitTestingEnabled = true;
        parent::__construct($errorManager);
    }

}
