<?php

/**
 * 
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/Puzzlout/EasyMvc
 * @since Version 1.0.0
 * @package DateTimeHelper
 */

namespace Puzzlout\Framework\Tests;

use Puzzlout\Framework\FrameworkConstants;

class TestApplication extends \Puzzlout\Framework\Core\Application {

    public function __construct() {
        $errorManager = new \Puzzlout\Framework\Core\ErrorManager();
        $this->name = "TestSuiteAppInstance";
        $this->UnitTestingEnabled = true;
        parent::__construct($errorManager);
    }

}
