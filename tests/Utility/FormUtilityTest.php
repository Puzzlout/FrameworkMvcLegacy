<?php

/**
 * 
 * @since Test Suite v1.1.0
 */

namespace Puzzlout\Framework\Tests\Utility;

use Puzzlout\Framework\Utility\FormUtility;

class FormUtilityTest extends \PHPUnit_Framework_TestCase {

    protected $app;

    /**
     * Initialize the app object.
     */
    protected function setUp() {
        $this->app = new \Puzzlout\Framework\Tests\TestApplication();
    }

    /**
     * This method is generated.
     */
    public function testInstanceIsCorrect() {
        $this->assertNotNull($this->app);
        $result = new FormUtility($this->app);
        $this->assertInstanceOf('Puzzlout\Framework\Utility\FormUtility', $result);
    }

    //Write the next tests below...
}
