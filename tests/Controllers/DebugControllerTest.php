<?php

/**
 * @locked
 * @since Test Suite v1.0.0
 */

namespace Puzzlout\Framework\Tests\Controllers;

use Puzzlout\Framework\Controllers\DebugController;

class DebugControllerTest extends \PHPUnit_Framework_TestCase {

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
        $result = new DebugController($this->app, "Test", "Test");
        $this->assertInstanceOf('Puzzlout\Framework\Controllers\DebugController', $result);
    }

    //Write the next tests below...
}
